<?php

namespace App\Form\Audit\IncPartTwo;

use App\Entity\Audit\PartTwo\FutureIncome;
use App\Entity\Audit\ProStatus;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FutureIncomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('salary', SalaryType::class, [ "label"=>false,])
            ->add('proStatus', EntityType::class, [ 'label'=>false,
                "class" => ProStatus::class,
                "choice_label" => "proLabel",
                "multiple" => false,
                'expanded' => false,
            ]);


    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FutureIncome::class
        ]);
    }
}
