<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;



class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, EntityManagerInterface $em): Response
    {

        // $this->addFlash('success', 'Message de test');
        $contact = new Contact();
        $form= $this->createForm(ContactType::class, $contact);
      

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($contact);
            $em->flush();

            $this->addFlash('success', 'Message envoyé');

            return $this-> redirectToRoute('contact');
        }
       

        return $this->render('contact/index.html.twig', [
            // 'controller_name' => 'ContactController',
            'form' => $form->createView(),
        ]);
    }
}
