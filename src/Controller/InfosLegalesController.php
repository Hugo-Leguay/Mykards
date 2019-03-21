<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InfosLegalesController extends AbstractController
{
    /**
     * @Route("/infos/legales", name="infos_legales")
     */
    public function index()
    {
        return $this->render('infos_legales/index.html.twig', [
            'controller_name' => 'InfosLegalesController',
        ]);
    }
}
