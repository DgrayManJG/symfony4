<?php

namespace App\Controller;

use App\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PostsController extends Controller
{
    /**
     * @Route("/posts", name="posts")
     * @param RegistryInterface $doctrine
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(RegistryInterface $doctrine)
    {
        $posts = $doctrine->getRepository(Post::class)->findAll();

        return $this->render('posts/list.html.twig', compact('posts'));
    }
}
