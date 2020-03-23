<?php

namespace App\Controller;

use App\Entity\Trajet;
use App\Entity\Utilisateur;
use App\Form\TrajetType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TrajetController extends AbstractController
{
    /**
     * Lister tous les trajet.
     * @Route("/trajet/", name="trajet.list")
     * @return Response
     */
    public function list() : Response
    {

        $trajets = $this->getDoctrine()->getRepository(Trajet::class)->findAll();
        return $this->render('trajet/list.html.twig', [
        'trajets' => $trajets,
        ]);
    }

    /**
	 * Créer un nouveau trajet.
	 * @Route("/nouveau-trajet", name="trajet.create")
	 * @param Request $request
	 * @param EntityManagerInterface $em
	 * @return RedirectResponse|Response
	*/
	public function create(Request $request, EntityManagerInterface $em) : Response
	{
		$trajet = new Trajet();
		$form = $this->createForm(TrajetType::class, $trajet);
		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
        $em->persist($trajet);
		$em->flush();
		return $this->redirectToRoute('trajet.list');
	}
		return $this->render('trajet/create.html.twig', [
		'form' => $form->createView(),
		]);
    }

    /**
     * Chercher et afficher un trajet.
     * @Route("/trajet/{slug}", name="trajet.show")
     * @param Trajet $trajet
     * @return Response
     */
    public function show(Trajet $trajet) : Response
    {
    
        return $this->render('trajet/show.html.twig', [
        'trajet' => $trajet,
    ]);
    }

    



}
