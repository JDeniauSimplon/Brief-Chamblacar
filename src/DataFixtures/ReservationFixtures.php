<?php
    namespace App\DataFixtures;

    use App\Entity\Reservation;
    use Doctrine\Common\DataFixtures\DependentFixtureInterface;
    use Doctrine\Persistence\ObjectManager;
    use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
    use Faker\Factory;

class ReservationFixtures extends AbstractFixture implements DependentFixtureInterface {

    public function load (ObjectManager $manager):void {

        for ($i=0; $i < 30; $i++) { 
            $reservation = new Reservation();
            $reservation->setConfirmed($this->faker->boolean());
            

                // Récupérer une référence d'utilisateur comme propriétaire
                $userReference = $this->getReference('user_' . $i);
                $reservation->setPassenger($userReference);


                // Récupérer une référence d'utilisateur comme propriétaire
                $rideReference = $this->getReference('ride_' . $i);
                $reservation->setRide($rideReference);
            
            $manager->persist($reservation);   
        }
        $manager->flush();
    }

    public function getDependencies() {
        return [
            UserFixtures::class,
            RideFixtures::class
        ];
    }
}


?>