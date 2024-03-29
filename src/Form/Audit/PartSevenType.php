<?php

namespace App\Form\Audit;

use App\Entity\Audit\PartSeven\Documents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\All;

use Symfony\Component\Validator\Constraints\File;

class PartSevenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('document', FileType::class, ['label' => 'Importer les documents ',
                'mapped' => false,
                'required' => false,
                "multiple"=>true,
                "constraints" => [
                    new All([               // "new all" permet d'appliquer les contriantes à tous les fichier
                                            // obligatoire sinon ne fonctionne pas avec "multiple"=>true
                        'constraints' =>
                            [
                                new File([
                                    'maxSize' => '2048k',
                                    'mimeTypes' => [
                                        'image/jpeg',
                                        'image/png',
                                        'image/jpg',
                                        'application/pdf'
                                        // A COMPLETER SI BESOIN
                                    ],
                                    'mimeTypesMessage' => "La taille ou le format ne correspond pas",
                                ])
                            ],
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Documents::class,
        ]);
    }
}
