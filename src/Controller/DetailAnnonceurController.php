<?php

namespace App\Controller;

use App\Entity\Annonceur;
use App\Repository\AnnonceurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailAnnonceurController extends AbstractController
{
    /**
     * @Route("/detail/annonceur", name="detail_annonceur")
     */
    public function index(): Response
    {
        return $this->render('detail_annonceur/index.html.twig', [
            'controller_name' => 'DetailAnnonceurController',
        ]);
    }

    /**
     * @Route("/annonceur/{id}", requirements={"id"="\d+"}, name="detailAnnonceur")
     */
    public function detailAnnonceur(Annonceur $annonceur ): Response
    {
        /** @var Annonceur $user */




        return $this->render('detail_annonceur/index.html.twig', [
            'annonceur' => $annonceur,
        ]);

    }
}
