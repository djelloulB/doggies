<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Entity\DemandeAdoption;
use App\Entity\Message;
use App\Form\DemandeAdoptionType;
use App\Form\MessagingType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_ADOPTANT")
 */
class DemandeAdoptionController extends AbstractController
{
    /**
     * @Route("/annonce/{id}/demande-adoption", name="demande_adoption")
     */
    public function index(Annonce $annonce): Response
    {

        $demande = new DemandeAdoption();
        $demande->addMessage(new Message());
        $demande->setAnnonce($annonce);
        $demande->addAdoptant($this->getUser());
        $form = $this->createForm(DemandeAdoptionType::class, $demande);
        
        return $this->render('demande_adoption/index.html.twig', [
           
            'form' => $form->createView(),
            'annonce' => $annonce,
        ]);
    }
}
