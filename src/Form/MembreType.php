<?php

namespace App\Form;

use App\Entity\Membres;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MembreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'required' => false,
                'label' => "Nom",
                'attr' => [
                    'placeholder' => "Saisissez votre Nom"
                ]
            ])
            ->add('prenom', TextType::class, [
                'required' => false,
                'label' => "Prénom",
                'attr' => [
                    'placeholder' => "Saisissez votre prénom"
                ]
            ])
            ->add('email', EmailType::class, [
                'required' => false,
                'label' => "Email",
                'attr' => [
                    'placeholder' => "Saisissez votre Email"
                ]
            ])
            ->add('mdp', PasswordType::class, [
                'required' => false,
                'label' => "Mot de passe",
                'attr' => [
                    'placeholder' => "Saisissez votre mot de passe"
                ]
            ])
            ->add('adresse', TextType::class, [
                'required' => false,
                'label' => "Adresse",
                'attr' => [
                    'placeholder' => "Saisissez votre adresse"
                ]
            ])
            ->add('ville', TextType::class, [
                'required' => false,
                'label' => "Ville",
                'attr' => [
                    'placeholder' => "Saisissez une ville"
                ]
            ])
            ->add('codePostal', IntegerType::class, [
                'required' => false,
                'label' => "Code postal",
                'attr' => [
                    'placeholder' => "Saisissez votre code postal"
                ]
            ])
            ->add('tel', IntegerType::class, [
                'required' => false,
                'label' => "Téléphone",
                'attr' => [
                    'placeholder' => "Saisissez votre numéro de téléphone"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Membres::class,
        ]);
    }
}
