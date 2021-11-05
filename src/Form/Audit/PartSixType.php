<?php

namespace App\Form\Audit;

use App\Entity\Audit\PartSix\PartSix;
use App\Form\Audit\IncPartSix\FamilyNeedsType;
use App\Form\Audit\IncPartSix\HealthNeedsType;
use App\Form\Audit\IncPartSix\RecommendationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartSixType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('singleMinIncome', IntegerType::class, [
                'label'=> "Seul",
            ])
            ->add('coupleMinIncome', IntegerType::class, [
                'label'=> "En couple",
            ])
            ->add('stopWorking', IntegerType::class, [
                'label'=> "ans",
            ])
            ->add('retirementCapital', ChoiceType::class, [
                'label' => "(voyage, achat...)",
                'required' => true,
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('amountRetirementCapital', IntegerType::class, [
                'label'=> "",
            ])
            ->add('medicalHistory', ChoiceType::class, [
                'label' => "",
                'required' => true,
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('familyMedicalHistory', ChoiceType::class, [
                'label' => "",
                'required' => true,
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('smoking', ChoiceType::class, [
                'label' => "",
                'required' => true,
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('stopSmoking', ChoiceType::class, [
                'label' => "",
                'required' => true,
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('cover', ChoiceType::class, [
                'label' => "",
                'required' => true,
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('comment', TextType::class)
            ->add('haveReco', ChoiceType::class, [
                'label' => "",
                'required' => true,
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('familyNeeds', FamilyNeedsType::class)
            ->add('healthNeeds', HealthNeedsType::class)
            ->add('recommendation', CollectionType::class, [
                'entry_type' => RecommendationType::class,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PartSix::class,
        ]);
    }
}
