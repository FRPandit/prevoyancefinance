<?php

namespace App\Form\Audit\IncPartThree;

use App\Entity\Audit\PartThree\Patrimony;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PatrimonyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('detainedBy', TextType::class)
            ->add('methodOfDetention', TextType::class)
            ->add('estimatedValue', IntegerType::class)
            ->add('acquisitionValue' , IntegerType::class)
            ->add('taxation', TextType::class)
            ->add('rent', IntegerType::class)
            ->add('sale', CheckboxType::class,['label'=>false])
            ->add('capitalOfRest', IntegerType::class)
            ->add('lender', TextType::class)
            ->add('borrowingDate', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('during', IntegerType::class)
            ->add('percentageOfInsurance', TextType::class)
            ->add('rate', TextType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Patrimony::class,
        ]);
    }
}
