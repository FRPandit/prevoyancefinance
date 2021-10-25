<?php

namespace App\Form\Audit\IncPartOne;

use App\Entity\Audit\Children;
use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChildrenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('child', ChoiceType::class, [
                'label' => "Avez-vous des enfants: ",
                'required' => true,
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ]
            ])

            // Year of Birth
            ->add('yob', DateType::class, [
                'label' => "Année de naissance",
                'widget' => "single_text",
                'format' => 'yyyy',
            ])

            ->add('handicapped', CheckboxType::class, [
                'required' => 'false',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Children::class,
        ]);
    }
}
