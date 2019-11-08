<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\Livre;
use App\Entity\Category;

class LivreFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $Livre = new Livre();
        $Livre->setTitre("Lola");
        $Livre->setDescription("livre de lola");
        $Livre->setAuteur("Lola");
        $Livre->setEditeur("Lola edition");
        $Livre->setDateParution(new \DateTime());
        $Livre->setDisponibilite(true);
        $Livre->setIban("0216154187513");
        $Livre->setExemplaireTotal("7");
        $Livre->setExemplaireDispo("7");
        $Livre->setCategory(new Category());

        $manager->persist($Livre);
        $manager->flush();
    }
}
