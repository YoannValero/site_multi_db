<?php

namespace App\DataFixtures;

use App\Entity\Main\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $passwordEncoder) {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('yoann.valero7@gmail.com');
        $user->setRoles(['ROLE_USER']);
        
        ;
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'yoyoyoyo'));

        $manager->persist($user);
        $manager->flush();
    }
}
