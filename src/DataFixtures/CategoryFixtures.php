<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\Category;

class CategoryFixtures extends Fixture
{


    public function load(ObjectManager $manager)
    {
        $Category = new Category();
        $Category->setNom("Roman");
        $Category->setDescription("C'est la categorie des roman");

        $manager->persist($Category);
        $manager->flush();
    }
}
