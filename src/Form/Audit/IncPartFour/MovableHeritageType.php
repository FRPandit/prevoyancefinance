<?php

namespace App\Form\Audit\IncPartFour;

use App\Entity\Audit\PartFour\MovableHeritage;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovableHeritageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('detainedBy',TextType::class)
            ->add('openDate',DateType::class,['widget'=>"single_text"])
            ->add('amount', IntegerType::class)
            ->add('organization', TextType::class)
            ->add('interestRate',IntegerType::class)
            ->add('monthlyAnnualPayment', TextType::class)
            ->add('goal', TextType::class)
            ->add('beneficiary',TextType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MovableHeritage::class,
        ]);
    }
}
