<?php

namespace App\Form\Audit;

use App\Entity\Audit\PartTwo\CollectiveForesight;
use App\Entity\Audit\PartTwo\CollectiveRetirement;
use App\Entity\Audit\PartTwo\PartTwo;
use App\Entity\Audit\PartTwo\SavingsPlan;
use App\Form\Audit\IncPartTwo\EvolutionType;
use App\Form\Audit\IncPartTwo\FutureIncomeType;
use App\Form\Audit\IncPartTwo\GuaranteeType;
use App\Form\Audit\IncPartTwo\SalaryType;
use App\Form\Audit\IncPartTwo\TotalAnnualIncomeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
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
            // Question 1
            ->add('collectiveForesight', EntityType::class, ['label' => 'Votre entreprise a-t-elle mise
            en place un contrat de prévoyance collectif ?',
                'class' => CollectiveForesight::class,
                'choice_label' => "cfLabel",
                'multiple' => false,
                'expanded' => true,
                'required' => false,
                "placeholder" => false

            ])

            //question 2
            ->add('savingsPlan', EntityType::class, ['label' => 'Votre entreprise a-t-elle mise en place 
            un plan épargne ?',
                'class' => SavingsPlan::class,
                'choice_label' => "savingsLabel",
                'multiple' => false,
                'expanded' => true,
                'required' => false,
                "placeholder" => false
            ])

            //Question 3
            ->add('collectiveRetirement', EntityType::class, ['label' => 'Votre entreprise a-t-elle mise en place une 
            retraite collective ?',
                'class' => CollectiveRetirement::class,
                'choice_label' => "collectiveRetirementLabel",
                'multiple' => false,
                'expanded' => true,
                'required' => false,
                "placeholder" => false
            ])
            //Question 4
            ->add('activeCompanySavingsPlan', ChoiceType::class, ['label' => "Avez-vous encore un plan épargne actif ?",
                'choices' => [
                    "OUI" => true,
                    "NON" => false,
                    "Je ne sais pas" => null
                ],
                'multiple' => false,
                'expanded' => true,
                'required' => true,
                "placeholder" => false
            ])
            ->add('actualSaving', IntegerType::class, ['label' => "A combien estimez-vous votre épargne actuelle ?",
                "required"=>false
            ])

            //Question 5
            ->add('salary', SalaryType::class, ['label' => "Afin de pouvoir estimer votre futur retraite, quel est votre
            niveau actuel de rémunération ?",

                'required' => true,])

            //question 6
            ->add('evolution', EvolutionType::class, ['required' => true, "label" => false])

            //Question 7
            ->add('ableToMeasure', ChoiceType::class, ['label' => "Etes-vous en mesure d'estimer vos futurs revenus :",
                'choices' => [
                    "OUI" => "OUI",
                    "NON" => "NON",
                    "ou 1% par an" => "1% par an"
                ],
                'multiple' => false,
                'expanded' => true,
                'required' => true,
                "placeholder" => false

            ])
            //Question 8
            ->add('futureIncome', CollectionType::class, [
                    'entry_type' => FutureIncomeType::class,
                    'required' => false,
                    "label" => false,
                    'entry_options' => ['label' => false],
                    ]
            )

            //Question 9
            ->add('contributionClass', ChoiceType::class, ['label' => "Travailleur non salarié connaissez-vous
            votre classe de cotisation ?",
                'choices' => [
                    "OUI" => true,
                    "NON" => false,
                ],
                'multiple' => false,
                'required' => false,
                'expanded' => true,
                "placeholder" => false

            ])
            ->add('contributionClassLabel', TextType::class, ['required' => false, 'label' => false])

            //Question 10
            ->add('guarantee', CollectionType::class, [
                'entry_type'=> GuaranteeType::class,
                'required' => false
            ])


            //Question 11
            ->add('totalAnnualIncome', CollectionType::class, [
                'entry_type'=>TotalAnnualIncomeType::class,
                'required' => false, 'label' => false,
                'entry_options' => ['label' => false],
                ])

            //Question 11
            ->add('trustedAccount', ChoiceType::class, ['label' => "Avez-vous un expert comptable de confiance ?",
                'choices' => [
                    "OUI" => true,
                    "NON" => false
                ],
                'required' => false,
                'multiple' => false,
                'expanded' => true,
                "placeholder" => false
            ])
            ->add('trustedAccountName', TextType::class, ['required' => false, 'label' => "De quel cabinet s'agit-il ?"])
            ->add('enregistrer', SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PartTwo::class,
        ]);
    }
}
