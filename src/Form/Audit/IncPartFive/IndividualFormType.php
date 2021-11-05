<?php

namespace App\Form\Audit;

use App\Entity\Audit\PartFive\DropReaction;
use App\Entity\Audit\PartFive\FinancialInvestment;
use App\Entity\Audit\PartFive\IndividualForm;
use App\Entity\Audit\PartFive\Preference;
use App\Entity\Audit\PartFive\PreviousFinancialProducts;
use App\Entity\Audit\PartFive\Risk;
use App\Entity\Audit\PartFive\ShareOfInvestment;
use App\Entity\Audit\PartFive\Unplanned;
use App\Form\Audit\IncPartFive\DeathFundsType;
use App\Form\Audit\IncPartFive\FinancialProductsType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;

class IndividualFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Question 1
            ->add('financialProducts', FinancialProductsType::class, [
                'label' => "Détenez-vous des produits financiers ?",

            ])
            //Question 2
            ->add('previousFinancialProducts', EntityType::class, [
                'label' => "Sinon avez-vous détenu des produits financier (PEA, comptes titres, assurance vie ..)?",
                'class' => PreviousFinancialProducts::class,
                'choice_label' => false,
                'multiple' => false,
                "expanded" => true,
                "placeholder" => false
            ])
            //Question 3
            ->add('financialInvestment', EntityType::class, [
                'label' => "Comment gérez-vous vos investissements financiers ?",
                'class' => FinancialInvestment::class,
                'choice_label' => false,
                'multiple' => false,
                "expanded" => true,
                "placeholder" => false
            ])
            //Question 4
            ->add('risk', EntityType::class, [
                'label' => "Selon vous, les actions représentent-elles un risque de perte en capital plus important que les obligations ?",
                'class' => Risk::class,
                'choice_label' => false,
                'multiple' => false,
                "expanded" => true,
                "placeholder" => false
            ])
            //Question 5
            ->add('shareOfInvestment', EntityType::class, [
                'label' => "Quelle part représente ce placement dans votre patrimoine ( hors immobilier et professionnel ) ?",
                'class'=>ShareOfInvestment::class,
                'choice_label' => false,
                'multiple' => false,
                "expanded" => true,
                "placeholder" => false
            ])
            //Question 6
            ->add('unplanned', EntityType::class, [
                'label' => "Pensez-vous que vous pourriez avoir besoin de ce placement en cas d'évènement imprévu ?",
                'class'=>Unplanned::class,
                'choice_label' => false,
                'multiple' => false,
                "expanded" => true,
                "placeholder" => false
            ])
            //Question 7
            ->add('dropReaction', EntityType::class, [
                'label' => "Vous investissez sur le long terme, au bout d'un an votre placement à fait une baisse de 1à% que faites-vous ?",
                'class'=>DropReaction::class,
                'choice_label' => false,
                'multiple' => false,
                "expanded" => true,
                "placeholder" => false
            ])
            //Question 8
            ->add('preference', EntityType::class, [
                'label' => "Que privilégiez-vous avec ce placement",
                'class' => Preference::class,
                'choice_label' => false,
                'multiple' => false,
                "expanded" => true,
                "placeholder" => false
            ])
            //Question 9
            ->add('deathFunds', DeathFundsType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => IndividualForm::class,
        ]);
    }
}
