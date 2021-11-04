<?php

namespace App\Form\Audit\IncPartSix;

use App\Entity\Audit\PartSix\FamilyNeeds;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FamilyNeedsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('funeral', IntegerType::class, [
                'label'=> "- Obsèques ( généralement entre 4500 et 10 000 € )",
            ])
            ->add('incomeTaxes', IntegerType::class, [
                'label'=> "- Impôts sur le revenu annuel",
            ])
            ->add('propertyTaxes', IntegerType::class, [
                'label'=> "- Impôts fonciers",
            ])
            ->add('housingTaxes', IntegerType::class, [
                'label'=> "- Taxe d'habitation",
            ])
            ->add('torew', IntegerType::class, [
                'label'=> "- Impôts sur la fortune immobilière",
            ])
            ->add('professionalLoad', IntegerType::class, [
                'label'=> "- Charges professionnelles fixes",
            ])
            ->add('corporateTaxes', IntegerType::class, [
                'label'=> "- Impôts sur les sociétés",
            ])
            ->add('professionalVehicle', ChoiceType::class, [
                'label' => "- Le véhicule quotidiennement utilisé est-il un véhicule professionnel ?",
                'required' => true,
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('spouseAdditionalCapital', IntegerType::class, [
                'label'=> "- Si vous voulez laisser un capital supplémentaire à votre conjoint(e) quel est-il ?",
            ])
            ->add('otherAdditionalCapital', IntegerType::class, [
                'label'=> "- Si vous voulez laisser un capital supplémentaire à vos enfants ou un tiers quel est-il ?",
            ])
            ->add('spouseSalary', IntegerType::class, [
                'label'=> "- Quel est le salaire de votre conjoint(e) ?",
            ])
            ->add('sufficientSalary', ChoiceType::class, [
                'label' => "- Si vous venez à disparaître , le salaire de votre conjoint(e) suffirait-il à votre famille ?",
                'required' => true,
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('wwdc', ChoiceType::class, [
                'label' => "- Votre conjoint pourrait-il continuer à travailler avec les enfants à charge ?",
                'required' => true,
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('missingMonthlyIncome', IntegerType::class, [
                'label'=> "- A combien estimez-vous le revenu manquant chaque mois ?",
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FamilyNeeds::class,
        ]);
    }
}
