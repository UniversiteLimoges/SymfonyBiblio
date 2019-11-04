<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        foreach ($this->getUserData() as [$nom, $prenom, $adresse ,$password, $telephone, $email, $roles]) {
            $user = new User();
            $user->setNom($nom);
            $user->setPrenom($prenom);
            $user->setAdresse($adresse);
            $user->setTelephone($telephone);
            $user->setPassword($this->passwordEncoder->encodePassword($user, $password));
            $user->setEmail($email);
            $user->setRoles($roles);

            $manager->persist($user);
            $this->addReference($username, $user);
        }

        $manager->flush();
    }

    private function getUserData(): array
    {
        return [
            ['Valjean', 'Jean', '1 rue raspail', '0556458469', 'jane_admin@symfony.com', ['ROLE_ADMIN']],
        ];
    }


}