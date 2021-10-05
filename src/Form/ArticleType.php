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
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //Formulaire de création d'article
        $builder
            // Ajout de chaque input
            ->add('ArtName', TextType::class, ['label' => "Nom de l'article : "])
            ->add('category', EntityType::class, ['label' => "Catégorie : ",
                'class' => Category::class,
                'choice_label' => "catLabel",
            ])

      /*     $builder->get('category')->addEventListener(
               FormEvents::PRE_SUBMIT,
               function (FormEvent $event)  {

                        $form = $event ->getForm();
                   $this->addAccess($form->getParent(), $form->getData());
               }
           );*/
    /*    $builder->addEventListener(
            FormEvents::POST_SET_DATA,
            function (FormEvent $event){
                $data = $event->getData();
                $access = $data->getAccess();
                $this->addAccess($event->getForm(), null);
            }
        )*/

            ->add('access', EntityType::class, ['label'=>"Access : ",
                          'class' => Access::class,
                          'choice_label'=>"aLabel",
                          'multiple'=>false,
                          "expanded"=>true,

                          ])


                   ->add('thematic', EntityType::class, ['label' => "Thématique : ",
                       'class' => Thematic::class,
                       'choice_label' => "thLabel",
                       'multiple' => false,
                       'expanded' => true
                   ])
                   ->add('creationDate', DateType::class, ['label' => "Date de création : "])
                   ->add('expDate', DateType::class, ['label' => " Si offre du moment date de fin de l'offre : "])
                   ->add('description', TextareaType::class, ["label" => "Corps de l'article :"])
                   ->add('ArtImg', FileType::class, ['label' => 'Télécharger image',
                       'mapped' => false,
                       'required' => false,
                       'constraints' => [
                           new File([
                               'maxSize' => '1024k',
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
                   ->add("enregistrer", SubmitType::class, ["label" => "Enregistrer"])
                   ->add("publier", SubmitType::class, ['label' => "Publier"])
                   ->add("annuler", SubmitType::class, ['label' => "Annuler"]);


   /*    $formModifier = function (FormInterface $form, Category $category = null) {
           if ($category == 2) {
               $accessChoice = null;
           } else {
               $accessChoice = Access::class;
           }

           $form->add('access', EntityType::class, [
               'class' => $accessChoice,
               'choice_label' => "aLabel",
               'multiple' => false,
               'expanded' => true,

           ]);
       };


        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {

                $data = $event->getData();

                $formModifier($event->getForm(), $data->getCategory());

            }
        );*/



    }

  /*  private function addAccess(FormInterface $form, Category $category){

        $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
            'access',
            EntityType::class,
            null,
            [
                'class'=>Access::class,
                'placeholder' => " Selectionnez l'accès de l'article",
                'mapped' => false,
                "required" =>false,
                "auto_initialize" => false,
                "choices" =>$category->getAccess()

            ]
        );
        $form->add($builder->getForm());

    }*/

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
