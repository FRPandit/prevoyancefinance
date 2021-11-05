<?php

namespace App\Form\Audit\IncPartSix;

use App\Entity\Audit\PartSix\Recommendation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecommendationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('firstname')
            ->add('job')
            ->add('age')
            ->add('relationship')
            ->add('phone')
            ->add('mail')
            ->add('callingTimes')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recommendation::class,
        ]);
    }
}
