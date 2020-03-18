<?php
namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UtilisateurFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager) : void
    {
        $utilisateur1 = new Utilisateur();
        $utilisateur1->setNom("Dupont")
            ->setPrenom("Benjamin")
            ->setTel("0123456789")
            ->setEmail("Dupont@a5sys.fr")
			->setPassword("123456")
			->setAdresse("1 rue test")
			->setVille("Nantes")
			->setCodePostal(44300)
			;

        $utilisateur2 = new Utilisateur();
        $utilisateur2->setNom("Diallo")
            ->setPrenom("Hawa")
            ->setTel("0123456789")
            ->setEmail("hawa@test.fr")
			->setPassword("123456")
			->setAdresse("2 rue test")
			->setVille("Nantes")
			->setCodePostal(44300)
			;

        $manager->persist($utilisateur1);
        $manager->persist($utilisateur2);

        $manager->flush();
    }
}