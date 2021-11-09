<?php

namespace App\Form\Audit\IncPartOne;

use App\Entity\Audit\PartOne\Children;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class ChildrenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        //Formulaire de renseignement identité (Q5)
        $builder
            // Year of Birth
            ->add('yob', IntegerType::class, [
                'label' => "Année de naissance",
                'required' => false,
                "constraints" => [
                    new Length(4),
                ],
            ])
            ->add('handicapped', CheckboxType::class, [
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Children::class,
        ]);
    }
}
