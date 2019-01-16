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
        $listOeuvres = $repository->findBy([],['categories'=>'DESC']);

        return $this->render('pages/boutique.html.twig', [
            'oeuvres' => $listOeuvres
        ]);
    }

    /**
     * Page permettant d'afficher les articles
     * d'une categorie
     *прописываем название адреса такое как нам надо, вместо слова slug можно использовать любое на наше усмотрение
     *
     * @Route("/categorie/{nom}", methods={"GET"}, name="front_categorie")
     * @param Categories|null $categories
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */

    public function categorie( Categories $categories=null)
    {

        if(null===$categories){
            return $this->redirectToRoute('/', [],
                Response::HTTP_MOVED_PERMANENTLY);
        }



        return $this->render('Gallerie/gallerie.html.twig', [
            'categories'=>$categories,
            'oeuvres'=>$categories->getOeuvres()
        ]);
    }

    
}