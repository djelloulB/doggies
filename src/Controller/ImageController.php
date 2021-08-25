<?php

namespace App\Controller;

use App\Entity\Image;
use App\Form\ImageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;

/**
 * @IsGranted("ROLE_ANNONCEUR")
 */
class ImageController extends AbstractController
{
    /**
     * @Route("/image", name="image_index")
     */
    public function index(): Response
    {
        return $this->render('image/index', [
            'controller_name' => 'ImageController',
        ]);
    } // cette function sert à afficher la liste des images

    /**
     * @Route("/image/new", name="image_new")
     */
    public function form(Request $request, EntityManagerInterface $em): Response
    {
        $image = new Image();

        $form = $this->createForm(ImageType::class, $image);
        $form->handleRequest($request);//pour gerer la soumission du formulaire

        if ($form->isSubmitted() && $form->isValid()) {
            // On enregistre

            $em->persist($image);// enregistre l'image
            $em->flush(); //envoie l'image
            return $this->redirectToRoute('annonce_new');
        }


        return $this->render('image/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
