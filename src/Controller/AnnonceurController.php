<?php

namespace App\Controller;

use App\Entity\Annonceur;
use App\Repository\AnnonceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_ANNONCEUR")
 */
class AnnonceurController extends AbstractController
{
    /**
     * @Route("/annonceur", name="annonceur_index")
     */
    public function index(AnnonceRepository $annonceRepository ): Response
    { 
        /** @var Annonceur $user */
        $user = $this->getUser();
        $annonces = $user->getAnnonces();

        // $annonces = $annonceRepository->findBy([
        //     'annonceur' => $user,
        // ]);

        
        return $this->render('annonceur/index.html.twig', [
            'annonces' => $annonces,
        ]);
    }
}
