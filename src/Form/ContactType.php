<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label'=>"Votre Nom: ",
                'attr' =>[
                    'class' => 'form-control', 'style' => 'margin-bottom:15px'
                ]
            ])
            ->add('prenom', TextType::class, [
                'label'=>"Votre Prenom: ",
                'attr' =>[
                    'class' => 'form-control', 'style' => 'margin-bottom:15px'
                ]
            ])
            ->add('telephone', TelType::class, [
                'label'=>"Votre telephone: ",
                'attr' =>[
                    'class' => 'form-control', 'style' => 'margin-bottom:15px'
                ]
            ])
            ->add('email', EmailType::class, [
                'label'=>"Votre email: ",
                'attr' =>[
                    'class' => 'form-control', 'style' => 'margin-bottom:15px'
                ]
            ])
            ->add('message', TextareaType::class, [
                'label'=>"Votre message: ",
                'attr' =>[
                    'class' => 'form-control',
                    'rows'=>6
                                    ]
            ])
            ->add('submit', SubmitType::class, [
                'label'=>"Envoi message",
                'attr' =>[
                    'class' => 'btn btn-primary', 'style' => 'margin-bottom:15px'
                ]

            ] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
