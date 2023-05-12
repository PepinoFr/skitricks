<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use App\Form\TrickType;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Swift_Mailer;
use Swift_Message;
use Swift_SendmailTransport;
use Swift_SmtpTransport;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use function Symfony\Component\DependencyInjection\Loader\Configurator\param;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, EntityManagerInterface $manager,UserPasswordEncoderInterface $encoder) {
        $user = new User();
        $form = $this->createForm(RegistrationType::class,$user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user,$user->getPassword());
            $repo = $this->getDoctrine()->getRepository(User::class);
            do {
                $token = openssl_random_pseudo_bytes(16);
                $token = bin2hex($token);
                $usetmpt = $repo->findBy(array('token'=> $token));
            } while(!empty($usetmpt[0]) );
            $user->setPassword($hash);
            $user->setIsValidate(false);
            $user->setToken($token);
            $manager->persist($user);
            $manager->flush();

            $transport = (new Swift_SmtpTransport('smtp.gmail.com',465,'ssl'))
                ->setUsername('mathieulagnel@gmail.com')
                ->setPassword('pzbwrwqdkoturhyh')
            ;
            $mailer = new Swift_Mailer($transport);
            $message = (new Swift_Message('Wonderful Subject'))
                ->setFrom(['mathieulagnel@gmail.com' => 'mathieu lagnel'])
                ->setTo([$user->getEmail(), 'mathieulagnel@gmail.com' => 'toto '])
                ->setBody('lien pour la confimation du compte ' . $this->generateUrl('security_validate',array('token' =>$token),UrlGeneratorInterface::ABSOLUTE_URL)  )
            ;

// Send the message
            $result = $mailer->send($message);

            return $this->redirectToRoute('security_login',['login'=>true]);
        }

        return $this->render('security/registration.html.twig',[
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/{id}/edit", name="security_edit")
     */
    public function form(User $user = null,Request $request, EntityManagerInterface $manager){


        if(!$user){
            $user = new User();
        }

        $form = $this->createForm(UserType::class,$user);

        $form->handleRequest($request);
        if($form->isSubmitted()) {

            $someNewFilename = "toto.jpg";
            $chemin = "images/user/".$user->getId();
           // $chemin = "E:/etude/skitricks/public/images/user/" . $user->getId() . "/" . $compteur . ".jpg";
            //$move = move_uploaded_file($_FILES['avatar']['tmp_name']['imageFile'], $chemin);
            $file = $form['brochure']->getData();
            if (!empty($file)) {
                $file->move($chemin, $someNewFilename);
            }

            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute('tricks',['user'=>true]);
        }
        return $this->render('security/edit.html.twig', [
            'formUser' => $form->createView(),
        ]);

    }

    /**
     * @Route("/connexion", name="security_login")
     */
    public function login() {
        return $this->render('security/login.html.twig');
    }

    /**
     * @route("/deconnexion",name="security_logout")
     */
    public function logout(){}

    /**
     * @route("/valide/{token}",name="security_validate")
     */
    public function validate($token, EntityManagerInterface $manager){

        $repo = $this->getDoctrine()->getRepository(User::class);
        $user = $repo->findBy(array('token'=> $token));

        if(!empty($user[0])) {
            $user[0]->setIsValidate(1);
            $user[0]->setToken("");
            $manager->persist($user[0]);
            $manager->flush();
        } else {
            throw $this->createNotFoundException(
                'pas de user avec ce token'
            );
        }


        return $this->redirectToRoute('security_login');
    }
}
