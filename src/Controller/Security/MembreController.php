<?php
namespace App\Controller\Security;

use App\Entity\Membres;
use App\Form\MembreType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class MembreController extends AbstractController {


    /**
     * Inscription d'un membre
     * @Route("/register", name="security_register", methods={"GET", "POST"})
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
            // message flash de success
            $this->addFlash('success', 'Vous êtes inscrit vous pouvez maintenant vous connecter');
            // Quand l'utilisateur et inscrit en le rediriger ver la page de connection
            return $this->redirectToRoute('security_login');
        }

        return $this->render("security/register.html.twig", [
            // En créer la vue du formulaire d'inscription
            'form' => $form->createView()
        ]);

    }

    /**
     * Connection d'un membre
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

    /**
     * Déconnexion d'un Membre
     * @Route("/logout", name="security_logout")
     */
    public function logout()
    {
    }


    /**
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @Route("/profil", name="security_profil")
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function profil(Request $request, UserPasswordEncoderInterface $encoder) {

        # Récupération des données de l'utilisateur
        $user = $this->getUser();

        # Créer un Formulaire permettant l'ajout d'un utilisateur
        $form = $this->createForm(MembreType::class, $user);

        # Traitement des données POST
        $form->handleRequest($request);
        
        # Vérification des données du Formulaire
        if ($form->isSubmitted() && $form->isValid()) {

            // Encoder le mot de passe de l'utilisateur
            $password = $encoder->encodePassword($user, $user->getMdp());
            $user->setMdp($password);

            # Envoi les informations à la base de données
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            # message flash de success
            $this->addFlash('success', 'Vos informations personnelles en bien etre modifié');

            # Redirection sur la même page
            return $this->redirectToRoute('security_profil');
        }

        # Affichage du Formulaire dans la Vue
        return $this->render('security/profile.html.twig', [
            'form' => $form->createView()
        ]);

    }

}