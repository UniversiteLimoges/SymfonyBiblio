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
        $user1->setEmail('admin@admin.fr');
        $user1->setNom('Administrateur');
        $user1->setPrenom('Admin');
        $user1->setTelephone('0643546845');
        $user1->setRoles(array('ROLE_ADMIN'));
        $user1->setAdresse('Rue de la soif');
        $password = $this->encoder->encodePassword($user1, 'admin123');
        $user1->setPassword($password);

        $manager->persist($user1);

        $user2 = new User();
        $user2->setEmail('user@user.fr');
        $user2->setNom('User');
        $user2->setPrenom('Character');
        $user2->setTelephone('0643546845');
        $user2->setRoles(array('ROLE_USER'));
        $user2->setAdresse('Rue de la fume');
        $password = $this->encoder->encodePassword($user2, 'user123');
        $user2->setPassword($password);

        $manager->persist($user2);
        $manager->flush();
    }
}
