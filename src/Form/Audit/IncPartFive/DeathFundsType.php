<?php

namespace App\Form\Audit\IncPartFive;

use App\Entity\Audit\PartFive\DeathFunds;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\VarExporter\Exception\NotInstantiableTypeException;

class DeathFundsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('consumption', CheckboxType::class,["label"=> "Consommation jusqu'à l'épuisement","required"=>false])
            ->add('acquisition', CheckboxType::class,["label"=>" Acquisition de la résidence principale :","required"=>false])
            ->add('amountAcquisition', IntegerType::class,["required"=>false])
            ->add('investment', CheckboxType::class,['label'=>"Placement","required"=>false])
            ->add('amountInvestment', IntegerType::class,['label'=> "% net consommable","required"=>false])
            ->add('preference', ChoiceType::class, ['label'=>"Souhaitez-vous avantager une personne dans votre succession ?",
                "choices"=>[
                    "OUI" => "OUI",
                    "NON"=> "NON",
                ],
                "required"=>false,
                'multiple'=> false,
                'expanded'=>true,
                'placeholder'=>false])
            ->add('preferenceName',TextType::class,['label'=> " Laquelle ?","required"=>false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DeathFunds::class,
        ]);
    }
}
