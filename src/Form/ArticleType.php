<?php

namespace App\Form;

use App\Entity\Access;
use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Thematic;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //Formulaire de création d'article
        $builder
            // Ajout de chaque input
            ->add('ArtName', TextType::class, ['label'=>"Nom de l'article : "])
            ->add('category', EntityType::class,[ 'label'=> "Catégorie : ",
            'class' => Category::class,
            'choice_label'=>"catLabel",
            'multiple'=>false,
            'expanded'=>true

            ])
            ->add('access',EntityType::class,['label'=>"Accès : ",
                'class'=>Access::class,
                'choice_label' => "aLabel",
                'multiple'=>false,
                'expanded'=>true
            ])
            ->add('thematic', EntityType::class,['label'=> "Thématique : ",
                'class'=>Thematic::class,
                'choice_label'=>"thLabel",
                'multiple'=>true,
                'expanded'=>true
            ])
            ->add('creationDate', DateType::class,['label'=>"Date de création : "])
            ->add('expDate', DateType::class,['label'=>" Si offre du moment date de fin de l'offre : "])
            ->add('description', TextareaType::class, ["label"=>"Corps de l'article :"])
            ->add('ArtImg', FileType::class, ['label'=>'Télécharger image',
                'mapped'=>false,
                'required'=>false,
                'constraints'=>[
                    new File([
                        'maxSize'=> '1024k',
                        'mimeTypes'=> [
                            'image/jpeg',
                            'image/png',
                            'image/jpg'
                            // A COMPLETER SI BESOIN
                        ],
                        'mimeTypesMessage'=>"La taille ou le format ne correspond pas",
                    ])
                ]
        ] )
        ->add("enregistrer", SubmitType::class,["label"=>"Enregistrer"])
        ->add("publier", SubmitType::class,['label'=>"Publier"])
        ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}