<?php

namespace App\DataFixtures;

use App\Entity\Page;
use App\Entity\User;
use Carbon\Carbon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(private readonly UserPasswordHasherInterface $passwordHasher)
    {
        //
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setName('John Doe');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'password'));
        //$user->setCreatedAt(\DateTimeImmutable::);
        //$user->setUpdatedAt(\DateTimeImmutable::);
        $manager->persist($user);

        $manager->flush();
    }
}
