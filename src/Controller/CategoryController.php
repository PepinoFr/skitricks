<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/new", name="add_category")
     */
    public function index(Category $categ = null,Request $request, EntityManagerInterface $manager): Response
    {
        if(!$categ){
            $categ = new Category();
        }
        $form = $this->createForm(CategoryType::class,$categ);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($categ);
            $manager->flush();
            return $this->redirectToRoute('tricks');
        }

        $form->handleRequest($request);
        return $this->render('category/index.html.twig', [
            'formCateg' => $form->createView(),
        ]);
    }
}
