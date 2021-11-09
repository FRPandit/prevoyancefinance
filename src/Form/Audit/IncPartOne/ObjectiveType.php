<?php

namespace App\Form\Audit\IncPartOne;

use App\Entity\Audit\PartOne\Objective;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ObjectiveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('audit', CheckboxType::class, [
                'label'=> "Réaliser un audit complet",
                'required' => false,
            ])

            ->add('retirementSolution', CheckboxType::class, [
                'label'=> "Recevoir des solution en Retraite ",
                'required' => false,
            ])

            ->add('successionSolution', CheckboxType::class, [
                'label'=> "Recevoir des solution pour une succession ",
                'required' => false,
            ])

            ->add('foresightSolution', CheckboxType::class, [
                'label'=> "Recevoir des solution en Prévoyance ",
                'required' => false,
            ])

            ->add('savingSolution', CheckboxType::class, [
                'label'=> "Recevoir des solution en Epargne ",
                'required' => false,
            ])

            ->add('healthSolution', CheckboxType::class, [
                'label'=> "Recevoir des solution en Santé ",
                'required' => false,
            ])

            ->add('taxSolution', CheckboxType::class, [
                'label'=> "Recevoir des solution pour les Impôts ",
                'required' => false,
            ])

            ->add('borrowerInsurance', CheckboxType::class, [
                'label'=> "Renégocier mon assurance emprunteur ",
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Objective::class,
        ]);
    }
}
