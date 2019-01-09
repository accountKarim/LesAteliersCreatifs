<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function contact(Request $request)
    {
        $contact = new Contact();
        //        Création du Formulaire
        $form = $this->createForm(ContactType::class, $contact)
            ->handleRequest($request);
        // Si le formulaire est soumis et valide
        if ($form->isSubmitted()&& $form->isValid()){


            //Sauvegarde en BDD
            $em=$this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            // Notification
            $this->addFlash('notice',
                'Félicitations, votre message à bien été pris en compte, nous vous répondrons dans les plus brefs délais !');

        }
        return $this->render('contact/index.html.twig', [
            'form'=>$form->createView(),
            'controller_name' => 'ContactController',
        ]);


    }
}
