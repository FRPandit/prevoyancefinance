<?php

namespace App\Form\Audit;

use App\Entity\Audit\PartOne;
use App\Entity\Audit\ProStatus;
use App\Entity\Audit\ShareInCompagny;
use App\Entity\Status;
use App\Form\Audit\IncPartOne\ChildrenType;
use App\Form\Audit\IncPartOne\IntelligenceType;
use App\Form\Audit\IncPartOne\MariedType;
use App\Form\Audit\IncPartOne\ObjectiveType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartOneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
// ---- Objectif(s): (Q1)
            ->add('objective', ObjectiveType::class, [
                'label'=> "Objectif(s): (plusieurs choix possibles)",
                'required' => false,
            ])

// ---- Je suis:  (Q2)
// Formulaire de renseignement identité
            -> add('intelligence', IntelligenceType::class, [
                'label' => "Je suis : ",
            ])

// autres tables avec un label de Q2
// ---- Menu déroulant avec l'Entité ProStatus (Chef d'entreprise, cadre, Travailleur non salarié...)
            ->add('proStatus', EntityType::class, [
                'label' => "Statut Professionnel: ",
                'class' => ProStatus::class,
                'choice_label' => "proLabel",
                'multiple' => false,
                'expanded' => false,
            ])
// ---- Select avec l'Entité ShareInCompagny (minoritaire, majoritaire, égalitaire)
            ->add('shareInCompany', EntityType::class, [
                'label' => "Part dans la société: ",
                'class' => ShareInCompagny::class,
                'choice_label' => "shareLabel",
                'multiple' => false,
                'expanded' => false,
            ])

// ---- Vous êtes : (Q3)
//Bouton radio avec l'Entité Status (/!\ cette Entité n'est pas dans Audit)
             ->add('status', EntityType::class, [
                'label' => "Vous êtes: ",
                'class' => Status::class,
                'choice_label' => "sLabel",
                'required' => true,
                'multiple' => false,
                'expanded' => true,
            ])

// ---- Vous êtes mariés sous: (Q4)
            ->add('maried', MariedType::class, [
                'label' => "Vous êtes mariés sous: ",
            ])

// ---- Avez-vous des enfants? (Q5)
            ->add('child', ChoiceType::class, [
                'label' => "Avez-vous des enfants: ",
                'required' => true,
                'choices' => [
                    "Oui" => true,
                    "Non" => false,
                ],
                'multiple' => false,
                'expanded' => true,
            ])

            ->add('children', CollectionType::class, [
                'entry_type' => ChildrenType::class,
                'entry_options' => ['label' => false],
                'label' => false,
            ])

//            ->add('childrenTwo', ChildrenType::class, [
//                'label' => false,
//            ])
//
//            ->add('childrenThree', ChildrenType::class, [
//                'label' => false,
//            ])
//
//            ->add('childrenFour', ChildrenType::class, [
//                'label' => false,
//            ])

// ---- Avez-vous déjà effectué? (Q6)
// Checkbox Dans PartOne (bas de page)
            ->add('donation', CheckboxType::class, [
                'label'=> "Une Donation ? ",
                'required' => false,
            ])

            ->add('testament', CheckboxType::class, [
                'label'=> "Un testament ? ",
                'required' => false,
            ])

            ->add('notary', ChoiceType::class, [
                'label'=> "Avez vous un notaire de confiance ? ",
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'required' => true,
                'multiple' => false,
                'expanded' => true,

            ])

            ->add('notaryName', TextType::class, [
                'label'=> "De quel notaire s'agit-il ? "
            ])


            ->add('donationBetweenSpouses', CheckboxType::class, [
                'label'=> "Une Donation entre époux? ",
                'required' => false,
            ])

    //        ->add('Save', SubmitType::class, ["label" => 'Etape suivante!'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PartOne::class,
        ]);
    }
}
