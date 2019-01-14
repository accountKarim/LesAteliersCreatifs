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
use Symfony\Bridge\Doctrine;


class CategoriesController extends AbstractController
{


    /**
     * @Route("/boutique", name="boutique")
     * @return Response
    */
    public function showOeuvres ()
    {
        $repository = $this->getDoctrine()
            ->getRepository(Oeuvres::class);
        $listOeuvres = $repository->findBy([],['id_categories'=>'DESC']);

        return $this->render('pages/boutique.html.twig', [
            'oeuvres' => $listOeuvres
        ]);
    }


    
}
