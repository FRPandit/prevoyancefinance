<?php

namespace App\Form\Audit\IncPartFive;

use App\Entity\Audit\PartFive\FinancialProducts;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FinancialProductsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nothing', CheckboxType::class,['label'=>false,"required"=>false])
            ->add('bankAccount',CheckboxType::class,['label'=>false,"required"=>false])
            ->add('financialSavings',CheckboxType::class,['label'=>false,"required"=>false])
            ->add('lifeInsurance',CheckboxType::class,['label'=>false,"required"=>false])
            ->add('lifeInsuranceUc', IntegerType::class,['label'=>"% UC","required"=>false])
            ->add('retirementInvestment',CheckboxType::class,['label'=>false,"required"=>false])
            ->add('retirementInvestmentUc', IntegerType::class,['label'=>"% UC","required"=>false])
            ->add('employeeSavings',CheckboxType::class,['label'=>false,"required"=>false])
            ->add('employeeSavingsUc', IntegerType::class,['label'=>"% UC","required"=>false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FinancialProducts::class,
        ]);
    }
}
