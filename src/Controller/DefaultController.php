<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends AbstractController
{
    public function index()
    {
        return $this->render('blog/home.html.twig', []);
    }

    public function inscription()
    {
        return $this->render('blog/inscription.html.twig', []);
    }

    public function dashboard()
    {
        return $this->render('blog/dashboard.html.twig', []);
    }
}
