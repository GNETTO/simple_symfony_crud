<?php

namespace App\Controller;

use App\Entity\Student;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\StudentRepository;

class DefaultController extends AbstractController
{
    public function index()
    {
        return $this->render('blog/home.html.twig', []);
    }




    public function inscription(Request $req)
    {
        //dump($$req->request);


        if ($req->request->count() > 0) {

            //echo $req->request->get('nom');
            $this->entitiesManager = $this->getDoctrine()->getManager();
            $student = new Student();

            $student->setNom($req->request->get('nom'));
            $student->setPrenoms($req->request->get('prenom'));
            $student->setEmail($req->request->get('email'));
            $student->setPassword($req->request->get('password'));
            $student->setDescription($req->request->get('desc'));

            // tell Doctrine you want to (eventually) save the Product (no queries yet)
            $this->entitiesManager->persist($student);

            // actually executes the queries (i.e. the INSERT query)
            $this->entitiesManager->flush();

            return  $this->redirectToRoute('success', ['id' => $student->getId()]);
            //return new Response('Saved new product with id ' . $student->getId());
        }


        return $this->render('blog/inscription.html.twig', []);
    }

    /**
     * @Route("/success", name="success")
     */
    public function success()
    {
        return $this->render('blog/success.html.twig', []);
    }

    public function dashboard()
    {
        return $this->render('blog/dashboard.html.twig', []);
    }

    public function tous(): Response
    {
        $students = $this->getDoctrine()
            ->getRepository(Student::class)
            ->findAll();

        if (!$students) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }
        return $this->render('blog/tous.html.twig', [
            'tous' => $students
        ]);
    }
}
