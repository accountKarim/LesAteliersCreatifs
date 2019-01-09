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

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OeuvresFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $option
     */
    public function buildForm(FormBuilderInterface $builder, array $option)
    {
        $builder->add('titre',TextType::class, [
            'required'=>true,
            'label'=>"Titre de l'Article",
            'attr'=>[
                'placeholder'=>"Titre de l'Article"
            ]
        ])
        ->add('dimensions',TextareaType::class, [
        'label'=>false,
//                'name'=> "editor1",
    ])
        ->add('photo', FileType::class, [
            'attr'=> [
                'class'=>'dropify'
            ]
        ])
        ->add('techniques',TextareaType::class, [
            'label'=>false,
//                'name'=> "editor1",
        ])

        ->add('prix',TextType::class, [
            'label'=>false
        ])


        ->add('categorie', EntityType::class,[
            'class'=>Categories::class,
            'choice_label'=>"nom",
            'expanded'=>false,
            'multiple'=>false,
            'label'=>false
        ])

        ->add('statut', CheckboxType::class, [
            'required'=> false,
            'attr'=>[
                'data-toggle' => 'toggle',
                'data-on'=> 'Oui',
                'data-off'=>'Non'
            ]
        ])
        ->add('submit', SubmitType::class, [
            'label'=>"Creer une Oeuvre"

        ] )
    ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Oeuvres::class
        ]);
    }

    public function getBlockPrefix()
    {
        return 'oeuvre';
    }

}