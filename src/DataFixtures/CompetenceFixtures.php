<?php

namespace App\DataFixtures;

use App\Entity\Competence;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CompetenceFixtures extends Fixture 
{

    public function load(ObjectManager $manager)
    {

        for ($i=0; $i <= 5; $i++) 
        {
            $competence = new Competence();

            $competence->setName('competence_' . $i);
            $competence->setDescription('...');
            $competence->setLevel($i);
            $this->addReference('competence_' . $i, $competence);

            $manager->persist($competence);
        }

        $manager->flush();

    }
}