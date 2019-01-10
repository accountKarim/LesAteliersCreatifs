<?php
namespace App\Controller;

use App\Form\MembreType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class profilController extends AbstractController {


    /**
     * @Route("/profil", name="page_profil")
     * @param UserInterface $user
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function profil(UserInterface $user, Request $request) {

        $form = $this->createForm(MembreType::class, $user);
        $form->handleRequest($request);

        return $this->render('pages/profil.html.twig', [
            'form' => $form->createView()
        ]);

    }


}