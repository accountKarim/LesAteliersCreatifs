<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {


    /**
     * @Route("/", name="page_home")
     */
    public function index() {


        return $this->render("pages/home.html.twig");


    }


    /**
     * @Route("/orders", name="page_orders")
     */
    public function orders() {


        return $this->render("pages/orders.html.twig");


    }


}