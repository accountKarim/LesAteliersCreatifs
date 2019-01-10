<?php
namespace App\Controller;


use App\Form\MembreType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class HomeController extends AbstractController {


    /**
     * @Route("/", name="page_home")
     */
    public function index() {


        return $this->render("pages/home.html.twig");


    }


    /**
     * @Route("/profile", name="page_profile")
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function profile(Request $request, UserPasswordEncoderInterface $encoder) {

        $user = $this->getUser();
        $form = $this->createForm(MembreType::class, $user);
        $form->handleRequest($request);

        dump($form->getData());

        if ($form->isSubmitted() && $form->isValid()) {
            // Encoder le mot de passe de l'utilisateur
            $password = $encoder->encodePassword($user, $user->getMdp());
            $user->setMdp($password);

            // Envoi les information d'inscription a la base de donnée
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // message flash de success
            $this->addFlash('success', 'Votre profile à bien été modifier');
            return $this->redirectToRoute('page_profile');
        }

        return $this->render('pages/profile.html.twig', [
            'form' => $form->createView()
        ]);

    }


}