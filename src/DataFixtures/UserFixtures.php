<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    const CELINE_USER = 'uceline';

//    private $passwordEncoder;
//
//    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
//    {
//        $this->passwordEncoder = $passwordEncoder;
//    }


    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setEmail('celinegaudet2@yahoo.fr')
//            ->setPassword($this->passwordEncoder->encodePassword(
//                $user1,
//                'password'
//    ))
                ->setName('Celine')
                ->setFirstName('Gaudet')
                ->setPassword('password');


        $user2 = new User();
        $user2->setEmail('celine@rti-zone.org')
            ->setName('Celine')
            ->setFirstName('Gaudet')
            ->setPassword('password');


         $manager->persist($user1);
         $manager->persist($user2);
         $manager->flush();

         $this->addReference(self::CELINE_USER, $user1);
    }
}
