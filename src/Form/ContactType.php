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
                    'class' => 'form-control', 'style' => 'margin-bottom:15px',
                    'placeholder' => "Saisissez votre Nom"
                ]
            ])
            ->add('prenom', TextType::class, [
                'label'=>"Votre Prénom: ",
                'attr' =>[
                    'class' => 'form-control', 'style' => 'margin-bottom:15px',
                    'placeholder' => "Saisissez votre prénom"
                ]
            ])
            ->add('telephone', TelType::class, [
                'label'=>"Votre téléphone: ",
                'attr' =>[
                    'class' => 'form-control', 'style' => 'margin-bottom:15px',
                    'placeholder' => "Saisissez votre téléphone"
                ]
            ])
            ->add('email', EmailType::class, [
                'label'=>"Votre email: ",
                'attr' =>[
                    'class' => 'form-control', 'style' => 'margin-bottom:15px',
                    'placeholder' => "Saisissez votre email"

                ]
            ])
            ->add('message', TextareaType::class, [
                'label'=>"Votre message: ",
                'attr' =>[
                    'class' => 'form-control placeholder_message',
                    'rows'=>6,
                    'placeholder' => "Saisissez votre message"

                                    ]
            ])
            ->add('submit', SubmitType::class, [
                'label'=>"Envoyer",
                'attr' =>[
                    'class' => 'btn mt-5 submit w-100' , 'style' => 'margin-bottom:15px',
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
