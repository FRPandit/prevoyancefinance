<?php

namespace App\Form;

use App\Entity\Status;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class EditProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder,  array $options)
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
            ->add('name',TextType::class, ['label' => 'Nom:'])
            ->add('firstname',TextType::class, ['label' => 'Prénom:'])
            ->add('pseudo', TextType::class, ['label' => 'Pseudo:'])
            ->add('birthday',DateType::class, ['label' => 'Date de Naissance:'])
            ->add('email', EmailType::class, ['label' => 'Mail:'])
            ->add('gender')
            ->add('phone',TelType::class, ['label' => 'Téléphone Fixe:'])
            ->add('mobile',TelType::class, ['label' => 'Mobile:'])
            ->add('status', EntityType::class, ['label' => 'Statut Marital:',
                'class' => Status::class,
                'choice_label' => "sLabel",
                ]  )

            ->add('address')
            ->add('mutualHealth')
            ->add('retirement')
            ->add('foresight')
            ->add('tax')
            ->add('saving')
            ->add('succession')
            ->add('Save', SubmitType::class, ["label" => 'Enregistrer!'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
