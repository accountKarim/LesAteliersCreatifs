<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 15/01/2019
 * Time: 11:24
 */

namespace App\Controller;


use App\Entity\Oeuvres;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{


    /**
     * @Route("/panier/ajouter/{id}", name="addPanier")
     * @param SessionInterface $session
     * @param Oeuvres $oeuvres
     * @return string
     */
    public function ajouterOeuvre(SessionInterface $session, Oeuvres $oeuvres)
    {
//        $session->invalidate();
//        $session = new Session(new NativeSessionStorage(), new NamespacedAttributeBag());
//        $session->replace($articles);

//        $panier = $session->get($articles);
//        dump($panier);
//        die();

//        $session->clear();
        $panier = $session->get('panier', []);
        $panier[] = $oeuvres;
        $session->set('panier', $panier);

        return $this->redirectToRoute('panier');

//
//        $em = $this->getDoctrine()->getManager();
//        $productRepository = $em->getRepository(Oeuvres::class);
//        $product = $productRepository->findAll($id);
////$oeuvres id remove
/// $panier=$panier_>th
///
//        $panier =(array('panier' => array(
//            'id'=>$product=>$this->get($id),
//            'titre'=>$product=>$this->get($titre)
//        ) ;
////        $sessionset
/// "panier" => $panier


    }

    /**
     * @Route("/panier", name="panier")
     * @param SessionInterface $session
     * @param $oeuvres
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function panierAction(SessionInterface $session)
    {

        $panier = $session->get('panier');

//        dump($panier);
        return $this->render('pages/panier.html.twig', [
            "panier" => $panier
        ]);
//        clear();
    }
//

    /**
     * @Route("/remove/{id}", name="removeInPanier")
     * @param $id
     * @param SessionInterface $session
     * @param Oeuvres $oeuvres
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function removeOeuvrePanier($id, SessionInterface $session, Oeuvres $oeuvres)
    {
        $panier = $session->get('panier');

        /**
         * @var int $index
         * @var Oeuvres $oeuvre
         */
        foreach ($panier as $index => $oeuvre) {
            if ($oeuvre->getId() == $id) {
                unset($panier[$index]);
                break;
            }
        }

        $session->set('panier', $panier);
        return $this->redirectToRoute('panier');
    }

    /**
     * @Route("/remove", name="removePanier")
     * @param SessionInterface $session
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function removePanier( SessionInterface $session)
    {
        $session->remove('panier');
        return $this->redirectToRoute('panier');

    }



}