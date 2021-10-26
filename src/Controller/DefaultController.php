<?php

namespace App\Controller;

use App\Entity\Student;

use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class DefaultController extends AbstractController
{
    public function index()
    {
        return $this->render('blog/home.html.twig', []);
    }

    public function inscription(Request $req, ObjectManager $manager)
    {
        $student = new Student();
        $form = $this->createFormBuilder($student)
            ->add('nom')
            ->add('prenoms')
            ->add('email')
            ->add('password')
            ->add('description')
            ->getForm();
        return $this->render('blog/inscription.html.twig', [
            'formStudent' => $form->createView()
        ]);
    }

    public function dashboard()
    {
        return $this->render('blog/dashboard.html.twig', []);
    }
}
