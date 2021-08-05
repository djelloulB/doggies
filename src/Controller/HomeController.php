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
        $annonces = $annonceRepository->findAll();
        $annonceurs = $annonceurRepository->findAll();

                // $dogs = [];
        
        // for($i= 0 ; $i <=5 ; $i++){

        //     $dog = new Dog();
        //     $dog->setNom('Arturo');
        //     $dog->setIfLof(1);
        //     $dog->setAntecedents('Arturo est un ancien chien de cirque. ');
        //     $image = new Image();
        //     $image->setUrlImage('img/Arturo/arthuro.jpg');
        //     $dog->addImage($image);
            
        //     $dogs[] = $dog;
        // }
        // $Annonces = [];
        // for($i= 0 ; $i <5 ; $i++){
        //     $annonce = new Annonce();
        //     $annonce->setTitre('Arturo');
        //     $annonce->setDateMAJ(new \DateTime());
        //     $annonce->addDog($dogs[$i]);
        //     $Annonces[] = $annonce;
        // }
        // $Annonceurs = [];
        // $annonceur = new Annonceur();
        // $annonceur->setNom('Jean');
        // $annonceur->setPrenom('Michel');
        // $annonceur->setMotDePasse('123');
        // $annonceur->setEmail('jm@fr.fr');
        // $annonceur->setTelephone('0620103000');
        // $Annonceurs[] = $annonceur;

        return $this->render('home/index.html.twig', [
            
            'annonces' => $annonces,
            'annonceurs' => $annonceurs,
        ]);
    }
}
