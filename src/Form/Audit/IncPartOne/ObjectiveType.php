<?php

namespace App\Form\Audit\IncPartOne;

use App\Entity\Audit\Objective;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ObjectiveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('audit')
            ->add('retirementSolution')
            ->add('successionSolution')
            ->add('foresightSolution')
            ->add('savingSolution')
            ->add('healthSolution')
            ->add('taxSolution')
            ->add('borrowerInsurance')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Objective::class,
        ]);
    }
}
