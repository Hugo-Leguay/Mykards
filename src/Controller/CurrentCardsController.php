<?php

namespace App\Controller;

use App\Entity\CurrentCards;
use App\Form\CurrentCardsType;
use App\Repository\CurrentCardsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;




/**
 * @Route("/current/cards")
 */
class CurrentCardsController extends AbstractController
{
    /**
     * @Route("/", name="current_cards_index", methods={"GET"})
     */
    public function index(CurrentCardsRepository $currentCardsRepository): Response
    {
        return $this->render('current_cards/index.html.twig', [
            'current_cards' => $currentCardsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="current_cards_new", methods={"GET","POST"})
     */
    public function new(Request $request, CurrentCardsRepository $currentCardsRepository): Response
    {
        $currentCard = new CurrentCards();
        $form = $this->createForm(CurrentCardsType::class, $currentCard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($currentCard);
            $entityManager->flush();

            return $this->redirectToRoute('current_cards_new');
        }

        return $this->render('current_cards/new.html.twig', [
            'current_card' => $currentCard,
            'form' => $form->createView(),
            'currentCards' => $currentCardsRepository->findAll()

        ]);
    }

    /**
     * @Route("/{id}", name="current_cards_show", methods={"GET"})
     */
    public function show(CurrentCards $currentCard): Response
    {
        return $this->render('current_cards/show.html.twig', [
            'current_card' => $currentCard,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="current_cards_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CurrentCards $currentCard): Response
    {
        $form = $this->createForm(CurrentCardsType::class, $currentCard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('current_cards_index', [
                'id' => $currentCard->getId(),
            ]);
        }

        return $this->render('current_cards/edit.html.twig', [
            'current_card' => $currentCard,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="current_cards_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CurrentCards $currentCard): Response
    {
        if ($this->isCsrfTokenValid('delete'.$currentCard->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($currentCard);
            $entityManager->flush();
        }

        return $this->redirectToRoute('current_cards_index');
    }
}
