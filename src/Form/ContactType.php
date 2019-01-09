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
                'label'=>"Votre Nom: "
            ])
            ->add('prenom', TextType::class, [
                'label'=>"Votre Prenom: "
            ])
            ->add('telephone', TelType::class, [
                'label'=>"Votre telephone: "
            ])
            ->add('email', EmailType::class, [
                'label'=>"Votre email: "
            ])
            ->add('message', TextareaType::class, [
                'label'=>"Votre email: "
            ])
            ->add('submit', SubmitType::class, [
                'label'=>"Envoi message"

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
