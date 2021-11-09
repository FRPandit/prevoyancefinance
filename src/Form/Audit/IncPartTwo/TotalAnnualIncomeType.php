<?php

namespace App\Form\Audit\IncPartTwo;

use App\Entity\Audit\PartTwo\TotalAnnualIncome;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TotalAnnualIncomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('salary', SalaryType::class ,['label'=>false]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TotalAnnualIncome::class,
        ]);
    }
}
