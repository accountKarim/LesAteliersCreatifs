<?php
namespace App\Controller\Security;

use App\Entity\Membres;
use App\Form\MembreType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class MembreController extends AbstractController {


    /**
     * @Route("/inscription", name="security_inscription")
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function inscription(Request $request, UserPasswordEncoderInterface $encoder) {

        $membre = new Membres();
        $form = $this->createForm(MembreType::class, $membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Encoder le mot de passe de l'utilisateur
            $pasword = $encoder->encodePassword($membre, $membre->getMdp());
            $membre->setMdp($pasword);

            // Envoi les information d'inscription a la base de donnée
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($membre);
            $entityManager->flush();
            // Quand l'utilisateur et inscrit en le rediriger ver la page de connection
            return $this->redirectToRoute('security_login');
        }

        return $this->render("security/inscription.html.twig", [
            // En créer la vue du formulaire d'inscription
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/login", name="security_login")
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error
        ));
    }
}