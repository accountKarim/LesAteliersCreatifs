<?php
namespace App\Controller\Security;

use http\Env\Request;
use function Sodium\crypto_box_publickey_from_secretkey;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MembreController extends AbstractController {


    /**
     * @Route("/inscription", name="security.inscription")
     */
    public function inscription(Request $request) {

        $this->render("security/inscription.html.twig");

    }


    public function connexion()
    {
        
    }
}

