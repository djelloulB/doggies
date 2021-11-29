<?php

namespace App\Controller;

use App\Entity\Adoptant;
use App\Entity\Annonce;
use App\Entity\DemandeAdoption;
use App\Entity\Message;
use App\Form\AdoptantType;
use App\Repository\AdoptantRepository;
use App\Repository\DemandeAdoptionRepository;
use App\Repository\MessageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

class AdoptantController extends AbstractController
{
    /**
     * @IsGranted("ROLE_ADOPTANT")
     * @Route("/adoptant", name="adoptant")
     */
    public function index(DemandeAdoptionRepository $demandeAdoptionRepository): Response
    {
        /** @var Adoptant $adoptant */
        $adoptant = $this->getUser();
        $demandes = $adoptant->getDemandeAdoption();
        

        return $this->render('adoptant/index.html.twig', [
            'demandes' => $demandes,

        ]);
    }

/**
     * @Route("/adoptant_new", name="adoptant_new")
     */
    public function new(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $a): Response
    {
        $adoptant = new Adoptant();
        $form = $this->createForm(AdoptantType::class, $adoptant);
        

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $mdp = $a->hashPassword($adoptant, $adoptant->getPlainPassword());
            $adoptant->setMotDePasse($mdp);
            $em->persist($adoptant);
            $em->flush();

            $this->addFlash('success', 'Compte créer');

            return $this-> redirectToRoute('home_index');
        }

        return $this->render('adoptant/new.html.twig', [    
            'form' => $form->createView(),
        ]);
    }
}
