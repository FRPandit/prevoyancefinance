<?php

namespace App\Form\Audit\IncPartThree;

use App\Entity\Audit\PartThree\CreditLeasing;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreditLeasingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('totalRemaining',IntegerType::class)
            ->add('end', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('rate', TextType::class)
            ->add('mensuality', IntegerType::class)
            ->add('coverFirstInsured', IntegerType::class)
            ->add('coverSecondInsured', IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CreditLeasing::class,
        ]);
    }
}
