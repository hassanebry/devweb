<?php
namespace App\DataFixtures;

use App\Entity\Reservation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ReservationFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager) : void
    {
        $resa1 = new Reservation();
        $resa1->setDateReserv(new \DateTime('+5 days'))
			  ->setPlaceReserv(2)
			  ->setEtat('ok');
			  
			  
		$resa2 = new Reservation();
        $resa2->setDateReserv(new \DateTime('+5 days'))
			  ->setPlaceReserv(2)
			  ->setEtat('ok');
			 
        $manager->persist($resa1);
        $manager->persist($resa2);

        $manager->flush();

    }
}