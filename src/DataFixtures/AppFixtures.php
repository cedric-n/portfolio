<?php

namespace App\DataFixtures;

use App\Entity\Realisation;

use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $date = new DateTime('now');
        $date->format('d/m/Y');
        for ($i=0; $i <= 10; $i++) {
            $realisation = new Realisation();
            $realisation->setName('realisation_' . $i);
            $realisation->setCategory('category_' . $i);
            $realisation->setBeginAt($date);
            $realisation->setDescription('description' . $i);
            $realisation->setPosterFile(null);
            $manager->persist($realisation);
        }


        $manager->flush();
    }
}

