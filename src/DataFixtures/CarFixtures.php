<?php

namespace App\DataFixtures;

use App\Entity\Car;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CarFixtures extends AbstractFixture implements DependentFixtureInterface 
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 30; $i ++) {
            // Générer un nombre aléatoire de voitures pour chaque utilisateur
            $numCars = rand(0, 1); // Générer 0 ou 1 voiture par utilisateur
    
            for ($j = 0; $j < $numCars; $j++) {
                $car = new Car();
                $car->setBrand($this->faker->company);
                $car->setModel($this->faker->word);
                $car->setSeats($this->faker->numberBetween($min = 2, $max = 7));
                $car->setCreated($this->faker->dateTimeThisYear());
    
                // Récupérer une référence d'utilisateur comme propriétaire
                $userReference = $this->getReference('user_' . $i);
                $car->setOwner($userReference);
    
                $manager->persist($car);
            }
        }
    
        $manager->flush();
}

    public function getDependencies()
{
    return [
        UserFixtures::class,
    ];
}
}


