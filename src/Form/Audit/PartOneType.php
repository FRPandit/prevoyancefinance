<?php

namespace App\Form\Audit;

use App\Entity\Audit\PartOne;
use App\Entity\Audit\ProStatus;
use App\Entity\Audit\ShareInCompagny;
use App\Entity\Status;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartOneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //Checkbox Dans PartOne (bas de page)
            ->add('donation', CheckboxType::class, [
                'label'=> "Une Donation ? ",
                'required' => false,
            ])

            ->add('testament', CheckboxType::class, [
                'label'=> "Un testament ? ",
                'required' => false,
            ])

            ->add('notary', CheckboxType::class, [
                'label'=> "Avez vous un notaire de confiance ? ",
                'required' => false,
            ])

            ->add('notaryName', TextType::class, [
                'label'=> "De quel notaire s'agit-il ? "
            ])


            ->add('donationBetweenSpouses', CheckboxType::class, [
                'label'=> "Une Donation ? ",
                'required' => false,
            ])

            // autres tables avec un label
            //Menu déroulant avec l'Entité ProStatus (Chef d'entreprise, cadre, Travailleur non salarié...)
            ->add('proStatus', EntityType::class, [
                'label' => "Statut Professionnel: ",
                'class' => ProStatus::class,
                'choice_label' => "proLabel",
                'multiple' => true,
                'expanded' => false,
            ])
                //Select avec l'Entité ShareInCompagny (minoritaire, majoritaire, égalitaire)
            ->add('shareInCompany', EntityType::class, [
                'label' => "Part dans la société: ",
                'class' => ShareInCompagny::class,
                'choice_label' => "shareLabel",
                'multiple' => true,
                'expanded' => false,
            ])
            //Bouton radio avec l'Entité Status (/!\ cette Entité n'est pas dans Audit)
             ->add('status', EntityType::class, [
                'label' => "Vous êtes: ",
                'class' => Status::class,
                'choice_label' => "sLabel",
                'required' => true,
                'multiple' => false,
                'expanded' => true,
            ])


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PartOne::class,
        ]);
    }
}
