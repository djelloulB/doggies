<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceurController extends AbstractController
{
    /**
     * @Route("/annonceur", name="annonceur_index")
     */
    public function index(): Response
    {

        return $this->render('annonceur/index.html.twig', [
            'title' => 'Dog-Corner',
        ]);
    }
}
