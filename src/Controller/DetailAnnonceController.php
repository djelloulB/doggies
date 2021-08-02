<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Dog;
use App\Entity\Image;
use App\Entity\Annonce;

class DetailAnnonceController extends AbstractController
{
    /**
     * @Route("/detailAnnonce", name="detailAnnonce")
     */
    public function index(): Response
    {


        $dogs = [];
        
        for($i= 0 ; $i <=1 ; $i++){

            $dog = new Dog();
            $dog->setNom('Arturo');
            $dog->setIfLof(1);
            $dog->setAntecedents('Arturo est un ancien chien de cirque. ');
            $image = new Image();
            $image->setUrlImage('img/Arturo/arthuro.jpg');
            $dog->addImage($image);
            
            $dogs[] = $dog;
        }
        $Annonces = [];
        for($i= 0 ; $i <1 ; $i++){
            $annonce = new Annonce();
            $annonce->setTitre('Arturo');
            $annonce->setDateMAJ(new \DateTime());
            $annonce->addDog($dogs[$i]);
            $Annonces[] = $annonce;
        }

        return $this->render('detail_annonce/index.html.twig', [
            'controller_name' => 'DetailAnnonceController',
            // 'title' => 'Dog Corner',
            'annonces' => $Annonces,
        ]);
    }
}
