<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends AbstractFixture 
{
    public function load(ObjectManager $manager)
    {$users = [];
        for ($i = 0; $i < 30; $i ++) {
            $user = new User();
            $user->setFirstName($this->faker->firstName());
            $user->setLastName($this->faker->lastName());
            $user->setCreated($this->faker->dateTimeThisYear());
            $user->setPhone($this->faker->phoneNumber());
            $user->setEmail($this->faker->email());

            $plainPassword = $this->faker->password();
            $encodedPassword = $this->passwordHasher->hashPassword($user, '12345');
            $user->setPassword($encodedPassword);

            $manager->persist($user);
            $users[] = $user;
            $this->setReference('user_' . $i , $user);
        }

        $manager->flush();
    }

    
}

