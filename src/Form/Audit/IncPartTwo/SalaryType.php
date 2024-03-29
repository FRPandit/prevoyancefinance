<?php

namespace App\Form\Audit\IncPartTwo;

use App\Entity\Audit\PartTwo\Salary;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SalaryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('amount', IntegerType::class,['label'=>false])

            ->add('grossNet', ChoiceType::class,[

                'choices'=>[
                    "BRUT" => false,
                    "NET" => true,
                ],

                'multiple'=>false,
                'expanded'=>false,
                "label" => false
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Salary::class,
        ]);
    }
}
