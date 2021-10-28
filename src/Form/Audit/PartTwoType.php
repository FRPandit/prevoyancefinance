<?php

namespace App\Form\Audit;

use App\Entity\Audit\CollectiveForesight;
use App\Entity\Audit\CollectiveRetirement;
use App\Entity\Audit\PartTwo;
use App\Entity\Audit\SavingsPlan;
use App\Form\Audit\IncPartTwo\EvolutionType;
use App\Form\Audit\IncPartTwo\FutureIncomeType;
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
                'required' => false,
                "placeholder" => false
            ])
            ->add('actualSaving', IntegerType::class, ['label' => "A combien estimez-vous votre épargne actuelle ?"])

            //Question 5
            ->add('salary', SalaryType::class, ['label' => "Afin de pouvoir estimer votre futur retraite, quel est votre
            niveau actuel de rémunération",

                'required' => false,])

            //question 6
            ->add('evolution', EvolutionType::class,['required' => false,"label" => false])

            //Question 7
            ->add('ableToMeasure', ChoiceType::class, ['label' => "Etes-vous en mesure d'estimer vos futurs revenus :",
                'choices' => [
                    "OUI" => "OUI",
                    "NON" => "NON",
                    "ou 1% par an" => "1% par an"
                ],
                'multiple' => false,
                'expanded' => true,
                'required' => false,
                "placeholder" => false

            ])
          ->add('futureIncome', FutureIncomeType::class,['required' => false,"label" => false,]
              )

            //Question 8
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
            ->add('contributionClassLabel', TextType::class, ['required' => false, 'label'=>false])

            //Question 9
            ->add('deathGuarantee', GuaranteeType::class, ['required' => false,"mapped" => false])
            ->add('stopWorking', GuaranteeType::class, ['required' => false,"mapped" => false])
            ->add('invalidity', GuaranteeType::class, ['required' => false,"mapped" => false])
            ->add('complementaryHealth', GuaranteeType::class, ['required' => false,"mapped" => false])
            ->add('dependency', GuaranteeType::class, ['required' => false,"mapped" => false])
            ->add('retirement', GuaranteeType::class, ['required' => false,"mapped" => false])
            ->add('childrenStudies', GuaranteeType::class, ['required' => false,"mapped" => false])
            ->add('lifeAccidentGuarantee', GuaranteeType::class, ['required' => false,"mapped" => false])
            ->add('juridicProtection', GuaranteeType::class, ['required' => false,"mapped" => false])
            ->add('internetProtection', GuaranteeType::class, ['required' => false,"mapped" => false])

            //Question 10
            ->add('totalAnnualIncome', TotalAnnualIncomeType::class,['required' => false, 'label'=>false])

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
            ->add('trustedAccountName', TextType::class, ['required' => false,'label' => "De quel cabinet s'agit-il ?"])
            ->add('enregistrer', SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PartTwo::class,
        ]);
    }
}
