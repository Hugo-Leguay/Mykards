<?php

namespace App\Controller;

use App\Entity\ImageCards;
use App\Form\ImageCardsType;
use App\Repository\ImageCardsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/image/cards")
 */
class ImageCardsController extends AbstractController
{
    /**
     * @Route("/", name="image_cards_index", methods={"GET"})
     */
    public function index(ImageCardsRepository $imageCardsRepository): Response
    {
        return $this->render('image_cards/index.html.twig', [
            'image_cards' => $imageCardsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="image_cards_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $imageCard = new ImageCards();
        $form = $this->createForm(ImageCardsType::class, $imageCard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($imageCard);
            $entityManager->flush();

            return $this->redirectToRoute('image_cards_index');
        }

        return $this->render('image_cards/new.html.twig', [
            'image_card' => $imageCard,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="image_cards_show", methods={"GET"})
     */
    public function show(ImageCards $imageCard): Response
    {
        return $this->render('image_cards/show.html.twig', [
            'image_card' => $imageCard,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="image_cards_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ImageCards $imageCard): Response
    {
        $form = $this->createForm(ImageCardsType::class, $imageCard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('image_cards_index', [
                'id' => $imageCard->getId(),
            ]);
        }

        return $this->render('image_cards/edit.html.twig', [
            'image_card' => $imageCard,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="image_cards_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ImageCards $imageCard): Response
    {
        if ($this->isCsrfTokenValid('delete'.$imageCard->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($imageCard);
            $entityManager->flush();
        }

        return $this->redirectToRoute('image_cards_index');
    }
}
