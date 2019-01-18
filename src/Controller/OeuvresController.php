<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 08/01/2019
 * Time: 14:18
 */

namespace App\Controller;

use App\Controller\HelperTrait;

use App\Entity\Categories;
use App\Entity\Oeuvres;
use App\Form\OeuvresFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OeuvresController extends AbstractController
{
    use HelperTrait;

    /**
     * Formulaire pour ajouter un article
     * @Security("is_granted('ROLE_ADMIN')")
     * @Route("/creer-une-oeuvre", name="oeuvre_new")
     * @Route("/oeuvre/edit/{categories}/{id}", name="oeuvre_edit")
     * @param Oeuvres $oeuvre
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */

    public function formOeuvre(Request $request, Oeuvres $oeuvre=null)
    {

        if (!$oeuvre){
            $oeuvre = new Oeuvres();
        }

//        Création du Formulaire
        $form = $this->createForm(OeuvresFormType::class, $oeuvre)
            ->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted()&& $form->isValid()){

            /** @var UploadedFile $photo*/
            $photo = $oeuvre->getPhoto();
            $fileName = $this->slugify($oeuvre->getTitre()).'.'.$photo->guessExtension();

            // Move the file to the directory where brochures are stored
            try {
                $photo->move(
                    $this->getParameter('oeuvres_assets_dir'),
                    $fileName
                );
            } catch (FileException $e) {

            }
            //Mise à jour de l'image
            $oeuvre->setPhoto($fileName);

           //Sauvegarde en BDD
            $em=$this->getDoctrine()->getManager();
            $em->persist($oeuvre);
            $em->flush();

            // Notification
            $this->addFlash('notice',
                'Felicitation, votre article est en ligne!');

//            //Rediraction
            return $this->redirectToRoute('oeuvre_new');
        }

//    Affichage dans la vue
    return $this->render('pages/form.html.twig', [
        'form'=>$form->createView(),
        'editMode'=>$oeuvre->getId()!== null
        ]);

    }




    /**
     * @Security("is_granted('ROLE_ADMIN')")
     * @Route("/oeuvre/delete/{id}", name="delete_oeuvre", methods={"GET","POST"})
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteOeuvre($id): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        $entityManager = $this->getDoctrine()->getManager();
        $oeuvre = $entityManager->getRepository(Oeuvres::class)->find($id);


        $entityManager->remove($oeuvre);

        $entityManager->flush();

        return $this->redirectToRoute('oeuvre_new', [
            'id' => $oeuvre->getId()
        ]);
    }

    /**
     * @Security("is_granted('ROLE_ADMIN')")
     * @Route("/oeuvres", name="oeuvres")
     * @Route("/messages", name="messages")
     * * @Route("/membres", name="membres")
     */
    public function oeuvr()
    {
        return $this->render('pages/form.html.twig');
    }


    /**
     * @Security("is_granted('ROLE_ADMIN')")
     * @Route("/oeuvre/{id}.html",
     * name="show_ouevre")
     *
     * @param Categories $categories
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */

    public function showOeuvre(Oeuvres $oeuvres)
    {


        return $this->render('pages/oeuvre.html.twig', [
            'oeuvres'=>$oeuvres,
//            'categories'=> $categories
        ]);
    }

}

