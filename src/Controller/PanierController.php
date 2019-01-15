<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 15/01/2019
 * Time: 11:24
 */

namespace App\Controller;


use App\Entity\Oeuvres;
use App\Repository\OeuvresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Attribute\NamespacedAttributeBag;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
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

        dump($panier);
        return $this->render('pages/panier.html.twig', [
            "panier" => $panier
        ]);
//        clear();
    }

    /**
     * @Route("/remove/{id}", name="removeInPanier")
     * @param SessionInterface $session
     * @param Oeuvres $oeuvres
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function removeOeuvrePanier(SessionInterface $session, Oeuvres $oeuvres)
    {
        $session->remove($oeuvres->$id);
        // remove array PHP
        // search in array remove and save cart in session
        $panier = $session->get('panier');
        return $this->render('pages/panier.html.twig', [
            "panier" => $panier
        ]);
    }





}