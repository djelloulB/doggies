<?php

namespace App\Controller;

use App\Entity\Adoptant;
use App\Form\AdoptantType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdoptantController extends AbstractController
{
    /**
     * @Route("/adoptant", name="adoptant")
     */
    public function index(): Response
    {
        return $this->render('adoptant/index.html.twig', [
            
        ]);
    }

/**
     * @Route("/adoptant/new", name="adoptant_new")
     */
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $adoptant = new Adoptant();
        $form = $this->createForm(AdoptantType::class, $adoptant);
        

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($adoptant);
            $em->flush();

            $this->addFlash('success', 'Message envoyé');

            return $this-> redirectToRoute('adoptant_new');
        }

        return $this->render('adoptant/new.html.twig', [    
            'form' => $form->createView(),
        ]);
    }
}
