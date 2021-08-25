<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Entity\DemandeAdoption;
use App\Entity\Message;
use App\Form\DemandeAdoptionType;
use App\Form\MessagingType;
use App\Repository\BreedRepository;
use App\Repository\DemandeAdoptionRepository;
use App\Repository\MessageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;

/**
 * @IsGranted("ROLE_ADOPTANT")
 */
class DemandeAdoptionController extends AbstractController
{
    /**
     * @Route("/demande-adoption/{id}", requirements={"id"="\d+"}, name="demande_adoption")
     */
    public function index(MessageRepository $messageRepository, DemandeAdoptionRepository $demandeAdoptionRepository, Request $request, EntityManagerInterface $em, Annonce $annonce): Response
    {
        $demande = new DemandeAdoption();
        $message = new Message();
        $demande->addMessage($message);
        $demande->setAnnonce($annonce);
        $demande->addAdoptant($this->getUser());
        $form = $this->createForm(DemandeAdoptionType::class, $demande);
        $demandeExistante= $demandeAdoptionRepository->findByAdoptant($annonce, $this->getUser());

        $form->handleRequest($request);

        // On regarde si le formulaire a été soumis ET est valide
        if ($form->isSubmitted() && $form->isValid()) {
            // On enregistre
            $em->persist($demande);
            $em->flush();
            $this->addFlash('success', 'Demande envoyée ! Vous devez attendre la réponse de l\'annonceur avant de pouvoir le contacter de nouveau ');
            // Une fois que le formulaire est validé,
            // on redirige pour éviter que l'utilisateur ne recharge la page
            // et soumette la même information une seconde fois
            return $this->redirectToRoute('demande_adoption', ['id'=>$annonce->getId()]);
        }



        return $this->render('demande_adoption/index.html.twig', [

            'form' => $form->createView(),
            'annonce' => $annonce,
            'message' => $message,
            'demandeExistante' => $demandeExistante,

        ]);
    }
}
