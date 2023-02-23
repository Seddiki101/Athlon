<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Sujet;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Regex;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('titre', TextType::class, [
            'constraints' => [
                new NotBlank(),
                new Length(['min' => 5, 'max' => 20])
                
            ]
        ])
        
            ->add('auteur', null, [
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[^0-9]*$/',
                        'message' => 'Le champ ne doit pas contenir de chiffres'
                    ])
                ]
            ])

            ->add('descripton')
            ->add('imgArticle',FileType::class,[
                'label' => 'image',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '2Mi',
                        'mimeTypesMessage' => 'Please upload a valid image file',
                    ])
                ],
            ])
            ->add('SujetX',EntityType::class,[
                'class'=>Sujet::class,
                'choice_label'=>'nom',
         ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
