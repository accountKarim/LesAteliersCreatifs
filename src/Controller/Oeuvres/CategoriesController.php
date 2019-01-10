<?php
/**
 * Created by PhpStorm.
 * User: hiba
 * Date: 09/01/2019
 * Time: 16:48
 */

namespace App\Controller\Oeuvres;


use App\Entity\Categories;
use App\Entity\Oeuvres;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\MakerBundle\Doctrine;

/**
 * @method getDoctrine()
 */
class CategoriesController extends AbstractController
{


    #public function showOeuvre(){
     #   $oeuvre = $this->getDoctrine()
      #      ->getRepository(Categories::class)
       #     ->findAll()
    #}
    /**
     * @Route("/gallerie/{nom}", name="oeuvres")
     */
    public function showOuvres ($nom)
    {
        $categories = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findOneBy(['nom' => $nom]);
        
        return $this->render('front/categorie.html.twig', [
            'oeuvres' => $categories->getArticles()
        ]);
    }
    
}
