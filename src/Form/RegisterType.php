<?php

namespace App\Form;

use App\Entity\Recette;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' =>[
                    'class' =>'form-control'
                ]
            ])
            // ->add('roles')
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('nom', textType::class, [
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('prenom', textType::class, [
                'label' => 'Prenom',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            // ->add('creat_at', null, [
            //     'widget' => 'single_text',
            // ])
            // ->add('recette', EntityType::class, [
            //     'class' => Recette::class,
            //     'choice_label' => 'id',
            //     'multiple' => true,
            // ])

            ->add('save', SubmitType::class, [
                'label' => "S'inscrire",
                'attr' => [
                    'class' => 'btn btn-success'
                ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
