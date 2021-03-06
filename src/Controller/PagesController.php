<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class PagesController {

    /**
     * @Route("/")
     * @param Environment $twig
     * @return Response
     */
    public function index (Environment $twig){
        return new Response($twig->render('pages/welcome.html.twig', array('message' => 'Bienvenue tout le monde')));
    }
}