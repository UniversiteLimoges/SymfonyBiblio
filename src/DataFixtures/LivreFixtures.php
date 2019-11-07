<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity;

class LivreFixtures extends Fixture
{


    public function load(ObjectManager $manager)
    {
        $Livre = new Livre();
        $Livre->setTitre("Lola");
        $Livre->setDescription("livre de lola");
        $Livre->setAuteur("Lola");
        $Livre->setEditeur("Lola edition");
        $Livre->setDateParution("2014-01-01");
        $Livre->setDisponibilite(true);
        $Livre->setsetIban("0216154187513");
        $Livre->setExemplaireTotal("7");
        $Livre->setExemplaireDispo("7");
        $Livre->setCategory('$Category');
        $Livre->setDisponibilite("true");

        $manager->persist($Livre);

        $manager->flush();
    }
}
