<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentType;
use App\Form\TrickType;
use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Trick;
use App\Repository\TrickRepository;

class TricksController extends AbstractController
{
    /**
     * @Route("/tricks", name="tricks")
     */
    public function index(TrickRepository $repo): Response
    {
        $tricks = $repo->findAll();
        return $this->render('tricks/home.html.twig', [
            'controller_name' => 'TricksController',
            'tricks' => $tricks,
        ]);
    }
    /**
     * @Route("/", name="home")
     */
    public function home(TrickRepository $repo): Response {
        $tricks = $repo->findAll();
        return $this->render('tricks/home.html.twig', [
            'controller_name' => 'TricksController',
            'tricks' => $tricks,
        ]);
    }

    /**
     * @Route("/tricks/new", name="tricks_create")
     * @Route("/tricks/{id}/edit", name="tricks_edit")
     */
    public function form(Trick $trick = null,Request $request, EntityManagerInterface $manager) {

        if(!$trick){
            $trick = new Trick();
        }
        $form = $this->createForm(TrickType::class,$trick);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            if($trick->getId()) {
                $trick->setUpdateAt(new \DateTime());
            }
            else {
                $trick->setCreatedAt(new \DateTimeImmutable())
                      ->setUser($this->getUser());
            }
                $extensionsValides = array('jpg', 'jpeg', 'png');


            define ('SITE_ROOT', realpath(dirname(__FILE__)));


            $manager->persist($trick);
            $manager->flush();
            $chemin = "images/tricks/".$trick->getId();
            if (!empty($trick->getImage())) {
                $someNewFilename = $trick->getImage().".jpg";
            } else {
                $someNewFilename = "1.jpg";
                $trick->setImage(1);
            }

            $file = $form['brochure']->getData();

            if (!empty($file)) {
                $file->move($chemin, $someNewFilename);
                $trick->setImage($trick->getImage() + 1);
            }
            $manager->persist($trick);
            $manager->flush();
            return $this->redirectToRoute('tricks_show',['id'=>$trick->getId()]);
        }

        return $this->render('tricks/create.html.twig', [
            'formTrick' => $form->createView(),
            'editMode' => $trick->getId() !== null,
        ]);
    }
    /**
     * @Route("/tricks/{id}/delete", name="tricks_delete")
     */
    public function deleteTrick(Trick $trick = null, EntityManagerInterface $manager) {

        if (!$trick) {
            throw $this->createNotFoundException(
                'pas de trick'
            );
        }

        $manager->remove($trick);
        $manager->flush();

        return $this->redirect($this->generateUrl('tricks'));
    }
    /**
     * @Route("/comment/{id}/delete", name="comment_delete")
     */
    public function deleteComment(Comment $comment = null, EntityManagerInterface $manager) {

        if (!$comment) {
            throw $this->createNotFoundException(
                'pas de comment'
            );
        }
        $trick = $comment->getTrick();

        $manager->remove($comment);
        $manager->flush();

        return $this->redirectToRoute('tricks_show',['id'=>$trick->getId()]);
    }


    /**
     *  @Route("/tricks/{id}", name="tricks_show")
     */
    public function show(Trick $trick,CommentRepository $comments,Request $request,PaginatorInterface $paginator,EntityManagerInterface $manager) {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class,$comment);
        $form->handleRequest($request);
        $paginator = $paginator->paginate(
            $comments->paginationQuery($trick->getId()),
            $request->query->get('page',1),
            5
        );
        if($form->isSubmitted()&& $form->isValid()){
            $comment->setCreatedAt(new \DateTimeImmutable())
                    ->setTrick($trick)
                    ->setUser($this->getUser());
            $manager->persist($comment);
            $manager->flush();

            return $this->redirectToRoute('tricks_show',['id' => $trick->getId(), 'paginator' => $paginator,]);
        }
        return $this->render('tricks/show.html.twig',[
            'trick' => $trick,
            'paginator' => $paginator,
            'commentForm' => $form->createView()
        ]);
    }
}