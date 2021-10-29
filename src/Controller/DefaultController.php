<?php

namespace App\Controller;

use App\Entity\Student;
use App\Services\Contenu;
use App\Repository\StudentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

//$c = new   Contenu();
class DefaultController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function index(Contenu $content)
    {
        //return new Response($content->home_temple("Nous somme la"));

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

            // tell Doctrine you want to (eventually) save the studnt$student (no queries yet)
            $this->entitiesManager->persist($student);

            // actually executes the queries (i.e. the INSERT query)
            $this->entitiesManager->flush();

            return  $this->redirectToRoute('success', ['id' => $student->getId()]);
            //return new Response('Saved new studnt$student with id ' . $student->getId());
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
        $repo  = $this->getDoctrine()
            ->getRepository(Student::class);
        $students = $repo->findAll();
        //dump($students);

        if (!$students) {
            throw $this->createNotFoundException(
                'No studnt$student found for id '
            );
        }
        return $this->render('blog/tous.html.twig', [
            'tous' => $students,
            'test' => 'valueTest'
        ]);
    }

    /**
     * @Route("/success_update", name="success")
     */
    public function success_update()
    {
        return $this->render('blog/success_update.html.twig', []);
    }

    public function modification($id, Request $req)
    {
        $mod = 0;
        if (!empty($_POST['nom'])) {
            $mod = "reussie";
            $entityManager = $this->getDoctrine()->getManager();
            $student = $entityManager->getRepository(Student::class)->find($id);

            if (!$student) {
                throw $this->createNotFoundException(
                    'No studnt$student found for id ' . $id
                );
            }

            $student->setNom($req->request->get('nom'));
            $student->setPrenoms($req->request->get('prenom'));
            $student->setEmail($req->request->get('email'));
            $student->setPassword($req->request->get('password'));
            $student->setDescription($req->request->get('desc'));
            $entityManager->flush();
            return  $this->redirectToRoute('success', ['id' => 0]);
        }

        $repo  = $this->getDoctrine()
            ->getRepository(Student::class);
        $students = $repo->find($id);
        return $this->render('blog/modification.html.twig', [
            'student' => $students,
            'id' => $id,
            'mod' => $mod
        ]);
    }

    /**
     * @Route("/success_delete", name="success_delete")
     */
    public function success_delete()
    {
        return $this->render('blog/success_delete.html.twig', []);
    }

    public function suppression($id, Request $req)
    {
        $mod = 0;
        if (!empty($_POST['nom'])) {
            $mod = "reussie";
            $entityManager = $this->getDoctrine()->getManager();
            $student = $entityManager->getRepository(Student::class)->find($id);

            if (!$student) {
                throw $this->createNotFoundException(
                    'No studnt$student found for id ' . $id
                );
            }
            $entityManager->remove($student);
            $entityManager->flush();
            return  $this->redirectToRoute('success_delete', ['id' => 0]);
        }

        $repo  = $this->getDoctrine()
            ->getRepository(Student::class);
        $students = $repo->find($id);
        return $this->render('blog/supprimer.html.twig', [
            'student' => $students,
            'id' => $id,
            'mod' => $mod
        ]);
    }
}
