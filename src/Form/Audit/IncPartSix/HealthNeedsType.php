<?php

namespace App\Form\Audit\IncPartSix;

use App\Entity\Audit\PartSix\HealthNeeds;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HealthNeedsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mutualHealthSatisfaction', ChoiceType::class, [
                'label' => "- Etes-vous satisfait de votre complémentaire santé ?",
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('glasses', ChoiceType::class, [
                'label' => "- Des personnes du foyers portent-elles des lunettes/verres de contact ?",
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('dentalCare', ChoiceType::class, [
                'label' => "- Prévoyez vous des soins dentaires pour vous ou vos enfants ?",
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('feeOverruns', ChoiceType::class, [
                'label' => "- Les spécialistes que vous consultez pratiquent-ils des dépassements d'honoraires ?",
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('notReimbursed', ChoiceType::class, [
                'label' => "- Consultez-vous des spécialistes non remboursés par la sécurité sociale ?",
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('spaTreatment', ChoiceType::class, [
                'label' => "- Allez-vous en cure thermale ?",
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ],
                'multiple' => false,
                'expanded' => true,
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => HealthNeeds::class,
        ]);
    }
}
