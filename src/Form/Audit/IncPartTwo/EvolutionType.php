<?php

namespace App\Form\Audit\IncPartTwo;

use App\Entity\Audit\Evolution;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;


class EvolutionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('evolutionChoice', ChoiceType::class, ['label' => "Un nouveau poste ou une augmentation
            est-elle prévu ? ",
                "choices" => [
                    "OUI" => true,
                    "NON" => false]]
                )
            ->add('salary', SalaryType::class,[ 'label'=>"Salaire annuel perçu(comprennant les primes)"])
            ->add('proStatus', EntityType::class, ['label' => "Nouveau Statut",
                "class" => "App\Entity\Audit\ProStatus",
                "choice_label" => "proLabel",
                "multiple" => false,
                'expanded' => false,
                "placeholder" => false,

            ])
            ->add('year', IntegerType::class, ['label' => "Quelle année ?",
                "constraints"=> [
                    new Length(4),

                ]



                ]
            );

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evolution::class,
        ]);
    }
}
