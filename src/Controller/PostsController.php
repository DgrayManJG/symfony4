<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class PostsController
{

    /**
     * @Route("/posts", name="posts")
     * @param Request $request
     * @param RegistryInterface $doctrine
     * @param FormFactoryInterface $formFactory
     * @param Environment $twig
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request, RegistryInterface $doctrine, FormFactoryInterface $formFactory, Environment $twig)
    {
        $posts = $doctrine->getRepository(Post::class)->findAll();
        $form = $formFactory->createBuilder(PostType::class, $posts[0])->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $doctrine->getEntityManager()->flush();
        }

        return new Response($twig->render('posts/list.html.twig', [
            'posts' => $posts,
            'form' => $form->createView()
        ]));
    }
}
