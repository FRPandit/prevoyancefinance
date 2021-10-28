<?php

namespace App\Form\Audit\IncPartTwo;

use App\Entity\Audit\TotalAnnualIncome;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TotalAnnualIncomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('divend', SalaryType::class ,['label'=>"Traitements, salaire et dividendes","mapped"=>false])
            ->add('nonCommercial', SalaryType::class ,['label'=>"Bénéfices non commerciaux","mapped"=>false])
            ->add('industrial', SalaryType::class ,['label'=>"Bénéfices industriels et commerciaux","mapped"=>false])
            ->add('agricultural', SalaryType::class ,['label'=>"Bénéfices agricoles","mapped"=>false])
            ->add('pension', SalaryType::class ,['label'=>"Pensions, retraites et rentes","mapped"=>false])
            ->add('realEstate', SalaryType::class ,['label'=>"Revenus immobiliers","mapped"=>false])
            ->add('movable', SalaryType::class ,['label'=>"Revenus mobiliers","mapped"=>false])
            ->add('various', SalaryType::class ,['label'=>"Revenus divers","mapped"=>false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TotalAnnualIncome::class,
        ]);
    }
}
