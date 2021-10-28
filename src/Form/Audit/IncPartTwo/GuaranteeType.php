<?php

namespace App\Form\Audit;

use App\Entity\Audit\Guarantee;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GuaranteeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('company',TextType::class )
            ->add('amountOfGuarantees',IntegerType::class)
            ->add('date', DateType::class)
            ->add('contribution', IntegerType::class)
            ->add('madelin', CheckboxType::class,[
               "label" => false,
            ])
            ->add('beneficiaries', TextType::class )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Guarantee::class,
        ]);
    }
}
