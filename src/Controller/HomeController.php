<?php

namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Dog;
use App\Entity\Image;
use App\Entity\Annonce;
use App\Entity\Annonceur;
use App\Repository\AnnonceRepository;
use App\Repository\AnnonceurRepository;
use App\Repository\DogRepository;
use App\Repository\ImageRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home_index")
     */
    public function index(AnnonceurRepository $annonceurRepository, AnnonceRepository $annonceRepository): Response
    {
        $annonces = $annonceRepository->findBy([], ['dateMAJ' =>'DESC'], 5);
        $annonceurs = $annonceurRepository->findByDateMAJ();
    

        return $this->render('home/index.html.twig', [
            
            'annonces' => $annonces,
            'annonceurs' => $annonceurs,
        ]);
    }
}
