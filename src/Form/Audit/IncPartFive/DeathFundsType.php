<?php

namespace App\Form\Audit\IncPartFive;

use App\Entity\Audit\PartFive\DeathFunds;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeathFundsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('consumption', CheckboxType::class,["label"=> "Consommation jusqu'à l'épuisement"])
            ->add('acquisition', CheckboxType::class,["label"=>" Acquisition de la résidence principale :"])
            ->add('amountAcquisition', IntegerType::class)
            ->add('investment', CheckboxType::class,['label'=>"Placement"])
            ->add('amountInvestment', IntegerType::class,['label'=> "% net consommable"])
            ->add('preference', ChoiceType::class, ['label'=>"Souhaitez-vous avantager une personne dans votre succession ?",
                "choices"=>[
                    "OUI" => true,
                    "NON"=> false,
                ],
                'multiple'=> false,
                'expanded'=>true,
                'placeholder'=>false])
            ->add('preferenceName',TextType::class,['label'=> " Laquelle ?"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DeathFunds::class,
        ]);
    }
}
