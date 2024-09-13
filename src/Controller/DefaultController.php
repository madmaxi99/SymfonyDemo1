<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('default/home.html.twig');
    }

    #[Route('/secured', name: 'secured')]
    public function secured(): Response
    {
        // This page requires authentication
        return $this->render('default/secured.html.twig');
    }
}
