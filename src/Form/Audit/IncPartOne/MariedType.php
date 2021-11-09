<?php

namespace App\Form\Audit\IncPartOne;

use App\Entity\Audit\PartOne\Maried;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class MariedType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('communityBefore', CheckboxType::class, [
                'label'=> "La communauté avant 1966",
                'required' => false,
            ])

            ->add('communityAfter', CheckboxType::class, [
                'label'=> "La communauté après 1966",
                'required' => false,
            ])

            ->add('separationOfProperty', CheckboxType::class, [
                'label'=> "Séparation de biens",
                'required' => false,
            ])

            ->add('partAcquisitions', CheckboxType::class, [
                'label'=> "Participation aux aquêts",
                'required' => false,
            ])

            ->add('year', IntegerType::class, [
                'label'=> "Année de mariage",
                'constraints' => new Length(4),
                'required' => false,
            ])

            ->add('previousWedding', CheckboxType::class, [
                'label'=> "Précédent mariage",
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Maried::class,
        ]);
    }
}
