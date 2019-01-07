<?php
namespace App\Controller\Security;

use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MembreController extends AbstractController {


    /**
     * @Route("/inscription", name="security.inscription")
     */
    public function inscription(Request $request) {

        $this->render("security/inscription.html.twig");

    }


}