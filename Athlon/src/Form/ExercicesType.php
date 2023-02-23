<?php

namespace App\Form;

use App\Entity\Exercices;
use App\Entity\Cours;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ExercicesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('Nom', null, [
                'empty_data' => ''
            ])
            ->add('duree_exercices',IntegerType::class, [
                'empty_data' => ' '
            ])
            ->add('nombre_repetitions',IntegerType::class, [
                'empty_data' => ' '
            ])
            ->add('desc_exercices',null, [
                'empty_data' => ''
            ])

            ->add('machine',null, [
        'empty_data' => ''
    ])
            ->add('image_exercice',FileType::class,[
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
            // ->add('Cours')
            ->add('Cours',EntityType::class,[
                'class'=>Cours::class,
                'choice_label'=>'nom',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Exercices::class,
        ]);
    }
}
