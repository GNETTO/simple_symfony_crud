<?php

namespace App\Controller;

use App\Entity\Student;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

/*use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;*/

class ExampleController extends AbstractController
{
    /**
     * @Route("/example", name="example")
     */
    public function index(Request $req): Response
    {
        $student = new Student();
        $form = $this->createFormBuilder($student)
            ->add('nom')
            ->add('prenoms')
            ->add('email')
            ->add('password')
            ->add('description', TextareaType::class)
            ->getForm();
        return $this->render('blog/inscription.html.twig', [
            'formStudent' => $form->createView()
        ]);
        /*return $this->render('example/index.html.twig', [
            'controller_name' => 'ExampleController',
        ]);*/
    }
}
