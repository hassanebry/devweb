<?php
namespace App\DataFixtures;

use App\Entity\Trajet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TrajetFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager) : void
    {
        $trajet1 = new Trajet();
      
        $trajet1->setVilleD("Nantes")
        ->setVilleA("Angers")
        ->setDateD(new \DateTime('+5 days'))
        ->setDateA(new \DateTime('+5 days'))
        ->setPlaceDispo(4)
        ->setPrix(12)
        ->setDistance(100)
        ->setDureeT(3)
        ->setHeureD(new \DateTime('12:00:00'))
        ->setHeureA(new \DateTime('15:00:00'));
        $manager->persist($trajet1);

        $trajet2 = new Trajet();
      
        $trajet2->setVilleD("Paris")
        ->setVilleA("Lyon")
        ->setDateD(new \DateTime('+6 days'))
        ->setDateA(new \DateTime('+6 days'))
        ->setPlaceDispo(4)
        ->setPrix(12)
        ->setDistance(100)
        ->setDureeT(3)
        ->setHeureD(new \DateTime('12:00:00'))
        ->setHeureA(new \DateTime('15:00:00'));
		
        $manager->persist($trajet2);

        $manager->flush();
    }
    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            UtilisateurFixtures::class
        ];
    }
	
}