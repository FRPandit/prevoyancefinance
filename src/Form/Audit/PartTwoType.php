<?php

namespace App\Form\Audit;

use App\Entity\Audit\CollectiveForesight;
use App\Entity\Audit\CollectiveRetirement;
use App\Entity\Audit\PartTwo;
use App\Entity\Audit\Salary;
use App\Entity\Audit\SavingsPlan;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartTwoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('collectiveForesight', EntityType::class, ['label' => 'Votre entreprise a-t-elle mise
            en place un contrat de prévoyance collectif ?',
                'class' => CollectiveForesight::class,
                'choice_label' => "cfLabel",
                'multiple' => false,
                'expanded' => true,
                'required' => true,
                "placeholder" => true

            ])
            ->add('savingsPlan', EntityType::class, ['label' => 'Votre entreprise a-t-elle mise en place 
            un plan épargne ?',
                'class' => SavingsPlan::class,
                'choice_label' => "savingsLabel",
                'multiple' => false,
                'expanded' => true,
                'required' => true,
                "placeholder" => true
            ])
            ->add('collectiveRetirement', EntityType::class, ['label' => 'Votre entreprise a-t-elle mise en place une 
            retraite collective ?',
                'class' => CollectiveRetirement::class,
                'choice_label' => "collectiveRetirementLabel",
                'multiple' => false,
                'expanded' => true,
                'required' => true,
                "placeholder" => true
            ])
            ->add('activeCompanySavingsPlan', ChoiceType::class, ['label' => "Avez-vous encore un plan épargne actif ?",
                'choices' => [
                    "OUI" => true,
                    "NON" => false,
                    "Je ne sais pas" => null
                ],
                'multiple' => false,
                'expanded' => true,
                'required' => true,
                "placeholder" => true
            ])
            ->add('actualSaving', IntegerType::class, ['label' => "A combien estimez-vous votre épargne actuelle ?"])
            ->add('ableToMeasure', ChoiceType::class, ['label' => "Etes-vous en mesure d'estimer vos futurs revenus :",
                'choices' => [
                    "OUI" => "OUI",
                    "NON" => "NON",
                    "ou 1% par an" => "1% par an"
                ],
                'multiple' => false,
                'expanded' => true,
                'required' => true
            ])
            ->add('contributionClass', ChoiceType::class,['label'=>"Travailleur non salarié connaissez-vous
            votre classe de cotisation ?",
                'choices'=>[
                    "OUI" => true,
                    "NON"=>false,
                ],
                'multiple'=>false,
                'expanded'=>true
            ])
            ->add('contributionClassLabel',TextType::class)
            ->add('trustedAccount')
            ->add('trustedAccountName')
            ->add('guarantee')
            ->add('totalAnnualIncome')
            ->add('futureIncome')
             ->add('Enregistrer', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PartTwo::class,
        ]);
    }
}
