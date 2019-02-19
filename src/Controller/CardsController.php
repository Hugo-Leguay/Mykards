<?php

namespace App\Controller;

use App\Entity\Cards;
use App\Form\CardsType;
use App\Repository\CardsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cards")
 */
class CardsController extends AbstractController
{
    /**
     * @Route("/", name="cards_index", methods={"GET"})
     */
    public function index(CardsRepository $cardsRepository): Response
    {
        return $this->render('cards/index.html.twig', [
            'cards' => $cardsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="cards_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $card = new Cards();
        $form = $this->createForm(CardsType::class, $card);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($card);
            $entityManager->flush();

            return $this->redirectToRoute('cards_index');
        }

        return $this->render('cards/new.html.twig', [
            'card' => $card,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cards_show", methods={"GET"})
     */
    public function show(Cards $card): Response
    {
        return $this->render('cards/show.html.twig', [
            'card' => $card,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cards_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Cards $card): Response
    {
        $form = $this->createForm(CardsType::class, $card);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cards_index', [
                'id' => $card->getId(),
            ]);
        }

        return $this->render('cards/edit.html.twig', [
            'card' => $card,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cards_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Cards $card): Response
    {
        if ($this->isCsrfTokenValid('delete'.$card->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($card);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cards_index');
    }
}
