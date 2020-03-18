<?php
namespace App\DataFixtures;

use App\Entity\Avis;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AvisFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager) : void
    {
        $avi1 = new Avis();
        $avi1->setCommentaire("ceci est un commentaire");
			  
		 $avi2 = new Avis();
        $avi2->setCommentaire("ceci est un commentaire1");

        $manager->persist($avi1);
        $manager->persist($avi2);

        $manager->flush();

    }
}