<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ConnectionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('email', TextType::class, ['label'=>'Identifiant', 'attr' =>['class'=>'cnx','placeholder'=>'Adresse mail ou pseudo']], array('required'=> true) )
            ->add('pwd', PasswordType::class, ['attr' =>['class'=>'cnx'], 'label'=>'Mot de passe',
                'mapped'=>false,
                'constraints'=>[
                    new NotBlank([
                        'message'=>'Entrer un mot de passe svp',
                    ]),
                    new Length([
                        'min'=>6,
                        'minMessage'=>'Votre mot de passe doit contenir au moins {{limit }} caracteres',
                        'max'=>4096,
                    ]),
                ],
            ])

        ;
    }


    //Cette fonction permet de configurer les options du formulaire.
    //ex: ici on indique à quelle entité est rattachée ce formulaire.
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
