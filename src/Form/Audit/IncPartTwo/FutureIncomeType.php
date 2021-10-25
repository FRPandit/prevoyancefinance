<?php

namespace App\Form\Audit\IncPartTwo;

use App\Entity\Audit\FutureIncome;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FutureIncomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('proStatus', EntityType::class, ['label' => "Nouveau Statut",
                "class" => "App\Entity\Audit\ProStatus",
                "choice_label" => "proLabel",
                "multiple" => false,
                'expanded' => false,
                "placeholder" => true
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FutureIncome::class,
        ]);
    }
}
