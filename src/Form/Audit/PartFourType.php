<?php

namespace App\Form\Audit;

use App\Entity\Audit\PartFour\MovableHeritage;
use App\Entity\Audit\PartFour\PartFour;


use App\Form\Audit\IncPartFour\MovableHeritageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartFourType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('movableHeritage', CollectionType::class, [
                'entry_type' => MovableHeritageType::class,
                'required'=>false, 'label'=>false,
                'entry_options'=>['label' => false]
            ])
            ->add('mainBank', TextType::class, ["label"=>"Quelle est votre banque principale ?", "required"=>true])
            ->add('satisfaction', ChoiceType::class,["label"=>"Etes-vous satisfait de votre banque",
                'choices' => [
                    "OUI" => true,
                    "NON" => false
                ],
                'required' => true,
                'multiple' => false,
                'expanded' => true,
                "placeholder" => false
                ])
            ->add('adviceFrequency',ChoiceType::class,["label"=>"Voyez-vous régulièrement votre conseiller",
                'choices' => [
                    "OUI" => true,
                    "NON" => false
                ],
                'required' => true,
                'multiple' => false,
                'expanded' => true,
                "placeholder" => false
            ])
            ->add('missingService', TextareaType::class,["label"=>"Selon vous, quel service manque t-il ?", 'required'=> false])
            ->add('monthlySaving',IntegerType::class,["label"=> "Combien Arrivez-vous à épargner chaque mois ?"] )
            ->add('openToProposals',ChoiceType::class,["label"=>"Si votre conseiller vous propose des solutions
            qui ne change pas vos habitudes tout en gardant de la flexibilité et qui vous apporte plus de rentabilité êtes vous 
            ouvert aux propositions ?",
                'choices' => [
                    "OUI" => true,
                    "NON" => false
                ],
                'required' => true,
                'multiple' => false,
                'expanded' => true,
                "placeholder" => false
            ])
            ->add('enregistrer',SubmitType::class )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PartFour::class,
        ]);
    }
}
