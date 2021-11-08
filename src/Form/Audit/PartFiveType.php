<?php

namespace App\Form\Audit;

use App\Entity\Audit\PartFive\PartFive;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartFiveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('individualForm', CollectionType::class,[ 'label'=>false,
                'entry_type'=> IndividualFormType::class,
                'entry_options'=>['label'=>false]

            ])

            ->add('enregistrer', SubmitType::class,['label'=> "enregistrer"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PartFive::class,
        ]);
    }
}
