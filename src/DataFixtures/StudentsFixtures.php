<?php

namespace App\DataFixtures;

use App\Entity\Student;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class StudentsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for ($i = 0; $i <= 10; $i++) {
            $student = new Student();
            $student->setNom("ABC_" . $i)
                ->setPrenoms("Prenom_" . $i)
                ->setEmail("monsieur.gnet@gmail.com")
                ->setPassword("1234")
                ->setDescription("Bonne description");
            $manager->persist($student);
        }
        // $product = new Product();
        // $manager->persist($product);
        $manager->flush();
    }
}
