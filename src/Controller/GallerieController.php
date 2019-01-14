<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 14/01/2019
 * Time: 10:11
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GallerieController  extends AbstractController {



    /**
     * @Route("/gallerie", name="gallerie")
     * @return Response
     */
    public function showOeuvres ()
    {

    }



}
