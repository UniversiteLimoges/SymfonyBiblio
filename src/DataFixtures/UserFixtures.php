<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Entity\User;

class UserFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setEmail('tonybengue@hotmail.fr');
        $user1->setNom('Bengué');
        $user1->setPrenom('Tony');
        $user1->setTelephone('0643546845');
        $user1->setRoles(array('ROLE_ADMIN'));
        $user1->setAdresse('Rue de la soif');
        $password = $this->encoder->encodePassword($user1, 'Lethilie');
        $user1->setPassword($password);

        $manager->persist($user1);

        $user2 = new User();
        $user2->setEmail('chien@hotmail.fr');
        $user2->setNom('Mister');
        $user2->setPrenom('Freeze');
        $user2->setTelephone('0643546845');
        $user2->setRoles(array('ROLE_USER'));
        $user2->setAdresse('Rue de la fume');
        $password = $this->encoder->encodePassword($user2, 'Unchien');
        $user2->setPassword($password);

        $manager->persist($user2);

        $manager->flush();
    }
}
