<?php
namespace App\Controller;


use App\Entity\Oeuvres;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {


    /**
     * @Route("/", name="page_home")
     */
    public function index() {


        $repository = $this->getDoctrine()
            ->getRepository(Oeuvres::class);
        $carousel = $repository->findAll();

        return $this->render("pages/home.html.twig", [
            'carousel'=>$carousel

        ]);



    }


}