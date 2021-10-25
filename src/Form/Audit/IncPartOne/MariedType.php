<?php

namespace App\Form\Audit\IncPartOne;

use App\Entity\Audit\Maried;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MariedType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('communityBefore')
            ->add('communityAfter')
            ->add('separationOfProperty')
            ->add('partAcquisitions')
            ->add('year')
            ->add('previousWedding')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Maried::class,
        ]);
    }
}
