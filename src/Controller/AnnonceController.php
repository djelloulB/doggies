<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Entity\Annonceur;
use App\Entity\Dog;
use App\Form\AnnonceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceController extends AbstractController
{
    /**
     * @Route("/annonce", name="annonce_index")
     */
    public function index(): Response
    {
        return $this->render('annonce/index', [
            'controller_name' => 'AnnonceControler',
        ]);
    }
        /**
         * @Route("/annonce/{id}/edit", name="annonce_edit")
         * @Route("/annonce/new", name="annonce_new")
         */
        public function form(Request $request, EntityManagerInterface $em, ?Annonce $annonce = null): Response
        {
        /** @var Annonceur $user */
        $user = $this->getUser();

            if (empty($annonce)) {
                $annonce = new Annonce();
                $annonce -> setAnnonceur($user);
                $chien = new Dog();
                $annonce->addDog($chien);
            }
            $form = $this->createForm(AnnonceType::class, $annonce, [
            ]);

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                // On enregistre

                $annonce->setDateMAJ(new \DateTime());

                $em->persist($annonce);
                $em->flush();
                return $this->redirectToRoute('annonceur_index');
            }

            return $this->render('annonce/new.html.twig', [
                'form' => $form->createView(),
            ]);
        }
}
