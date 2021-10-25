<?php

namespace App\Form\Audit\IncPartTwo;

use App\Entity\Audit\Salary;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            ->add('amount', IntegerType::class,['label'=>"Afin de pouvoir estimer votre futur retraite, quel est votre
            niveau actuel de rémunération"])
            ->add('grossNet', ChoiceType::class,[
                'choices'=>[
                    "BRUT" => false,
                    "NET" => true,
                ],
                'label'=>'Salaire soumis à cotisation annuellement perçu(comprenant les primes)',
                'multiple'=>false,
                'expanded'=>false
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
