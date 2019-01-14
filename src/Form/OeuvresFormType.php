<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 08/01/2019
 * Time: 14:28
 */

namespace App\Form;


use App\Entity\Categories;
use App\Entity\Oeuvres;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
//use Doctrine\ORM\EntityManagerInterface;

class OeuvresFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $option
     */
//    private $entityManager;
//
//    public function __construct(EntityManagerInterface $entityManager)
//    {
//        $this->entityManager = $entityManager;
//    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('titre',TextType::class, [
                'data_class' => null,
            'required'=>true,
            'label'=>"Titre de Oeuvre",
            'attr'=>[
                'placeholder'=>"Titre de Oeuvre",
                'class' => 'form-control col-md-12'
            ]
        ])
        ->add('dimensions',TextType::class, [
            'label'=>"dimensions",'data_class' => null,
            'attr'=>[
                'class' => 'col-md-12'
            ]
//                'name'=> "editor1",
         ])
        ->add('techniques',TextType::class, [
            'label'=>"techniques",'data_class' => null,
            'attr'=>[
                'class' => 'col-md-12'
            ]

        ])

        ->add('prix',TextType::class, [
            'label'=>"prix",'data_class' => null,
            'attr'=>[
                'class' => ' col-md-12'
            ]
        ])
            ->add('photo', FileType::class, [
                'data_class' => null,
                'attr'=> [
                    'label'=>"photo",
                    'class'=>'form-control col-md-12 form-control-file dropify'
                ]
            ])

        ->add('id_categories', EntityType::class,[
            'label'=>"id_categories",'data_class' => null,
            'class'=>Categories::class,
            'choice_label'=>"nom",
            'expanded'=>false,
            'multiple'=>false,
            'attr'=>[
                'class' => 'form-control col-md-12'
            ]

        ])

        ->add('statut', CheckboxType::class, [
            'required'=> false,
            'label'=>"statut",
            'attr'=>[
                'class'=>'form-control col-md-12 ',
                'data-toggle' => 'toggle',
                'data-on'=> 'Oui',
                'data-off'=>'Non'
            ]
        ])
//        ->add('submit', SubmitType::class, [
//            'label'=>"Creer une Oeuvre",
//            'attr'=>[
//                'class' => 'col-md-12 btn btn-primary mt-5'
//            ]
//
//
//
//        ] )
    ;
//        $entityManager = $options['entity_manager'];
    }

    public function configureOptions(OptionsResolver $resolver)
    {

        $resolver->setDefaults([
            'data_class' => Oeuvres::class,
//            'validation_groups' => false

        ])
//        ->setRequired('entity_manager')
            ;
    }

    public function getBlockPrefix()
    {
        return 'oeuvre';
    }

}