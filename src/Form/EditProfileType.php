<?php

namespace App\Form;

use App\Entity\Address;
use App\Entity\Gender;
use App\Entity\Status;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\File;

class EditProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('img', FileType::class, ['label' => 'Importer une photo de profil ',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '2048k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/jpg'
                            // A COMPLETER SI BESOIN
                        ],
                        'mimeTypesMessage' => "La taille ou le format ne correspond pas",
                    ])
                ]
            ])
            ->add('name', TextType::class, ['label' => 'Nom: ', 'required' => false])
            ->add('firstname', TextType::class, ['label' => 'Prénom: ', 'required' => false])
            ->add('pseudo', TextType::class, ['label' => 'Pseudo: '])
            ->add('birthday', BirthdayType::class, ['label' => 'Date de Naissance: ', 'required' => false])
            ->add('email', EmailType::class, ['label' => 'Mail: '])
            ->add('gender', EntityType::class, ['label' => "Genre : ",
                'class' => Gender::class,
                'choice_label' => "gLabel",
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('phone', TelType::class, ['label' => 'Téléphone Fixe: ', 'required' => false])
            ->add('mobile', TelType::class, ['label' => 'Mobile: ', 'required' => false])
            ->add('status', EntityType::class, [
                'label' => 'Statut Marital: ',
                'class' => Status::class,
                'choice_label' => "sLabel",
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('mutualHealth', CheckboxType::class, [
                'label' => 'Mutuelle ',
                'required' => false,
            ])
            ->add('retirement', CheckboxType::class, [
                'label' => 'Retraite ',
                'required' => false,
            ])
            ->add('foresight', CheckboxType::class, [
                'label' => 'Prévoyance ',
                'required' => false,
            ])
            ->add('tax',  CheckboxType::class, [
                'label' => 'Impôts ',
                'required' => false,
            ])
            ->add('saving',  CheckboxType::class, [
                'label' => 'Epargne ',
                'required' => false,
            ])
            ->add('succession', CheckboxType::class, [
                'label' => 'Succession ',
                'required' => false,
            ])

            ->add('Save', SubmitType::class, ["label" => 'Enregistrer!']);


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
