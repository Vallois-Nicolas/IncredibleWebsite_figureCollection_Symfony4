<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Users;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $userPasswordEncoderInterface;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoderInterface) {
        $this->userPasswordEncoderInterface = $userPasswordEncoderInterface;
    }

    public function load(ObjectManager $manager)
    {
        $user = new Users();
        $user->setUsername('demo');
        $user->setPassword($this->userPasswordEncoderInterface->encodePassword($user, 'demo'));
        $manager->persist($user);
        $manager->flush();
    }
}
