<?php

namespace App\Form\Audit\IncPartOne;

use App\Entity\Audit\PartOne\Intelligence;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IntelligenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        //Formulaire de renseignement identité (Q2)
        $builder
            ->add('woman',CheckboxType::class, [
                'label' => 'Femme',
                'required' => false,
            ])

            ->add('man',CheckboxType::class, [
                'label' => 'Homme',
                'required' => false,
            ])

            ->add('name', TextType::class, [
                'label' => 'Nom: ',
                'required' => true,
            ])

            ->add('firstname', TextType::class, [
                'label' => 'Prenom: ',
                'required' => true,
            ])

            ->add('nativeCountry', TextType::class, [
                'label' => 'Pays de naissance: ',
                'required' => true,
            ])

            ->add('department', TextType::class, [
                'label' => 'Département: ',
                'required' => true,
            ])

            ->add('job', TextType::class, [
                'label' => 'Profession: ',
                'required' => true,
            ])

            ->add('phone', TextType::class, [
                'label' => 'Téléphone: ',
                'required' => true,
            ])

            ->add('email', EmailType::class, [
                'label' => 'Email: ',
                'required' => true,
            ])

            ->add('compagnyForm', TextType::class, [
                'label' => 'Forme de votre société: ',
                'required' => false,
            ])

            ->add('axaCustomer', ChoiceType::class, [
                'label' => 'Etes-vous déjà client Axa? ',
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ],
                'multiple' => false,
                'expanded' => true,
                'required' => true,
            ])

            ->add('socialSecurityNumber', IntegerType::class, [
                'label' => 'Numéro de sécurité sociale: ',
                'required' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Intelligence::class,
        ]);
    }
}
