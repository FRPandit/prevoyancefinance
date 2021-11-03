<?php

namespace App\Form\Audit;

use App\Entity\Audit\PartThree\PartThree;
use App\Form\Audit\IncPartThree\CreditLeasingType;
use App\Form\Audit\IncPartThree\PatrimonyType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartThreeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('patrimony', CollectionType::class, [
                'entry_type' => PatrimonyType::class,
                'required' => false,
                "label" => false,
            ])

            ->add('haveCreditLeasing', ChoiceType::class, [
                'label' => "Avez-vous d'autres crédits ou leasing en cours?",
                'required' => true,
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ],
                'multiple' => false,
                'expanded' => true,
            ])

            ->add('creditLeasing', CollectionType::class, [
                'label' => false,
                'entry_type' => CreditLeasingType::class,
                'required' => false,
            ])

            ->add('project', ChoiceType::class, [
                'label' => "Avez-vous des projets de financement?",
                'required' => true,
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('needs', TextType::class, [
                'label' => "Vos Besoins ?",
                'required' => false,
            ])
            ->add('trustedLawyer', ChoiceType::class, [
                'label' => "Avez-vous un avocat de confiance?",
                'required' => true,
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('legalSpecificity', TextType::class, [
                'label' => "Sa spécificité juridique:",
                'required' => false,
            ])
            ->add('lawFirm', TextType::class, [
                'label' => "Quel cabinet?",
                'required' => false,
            ])


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PartThree::class,
        ]);
    }
}
