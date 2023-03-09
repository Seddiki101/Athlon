<?php

namespace App\Form;

use App\Entity\Conge;
use App\Entity\Employe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

use Symfony\Component\Validator\Constraints as Assert;



class CongeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('dateD')
        ->add('dateF')
            ->add('type', ChoiceType::class, [
                'label' => 'Type de congé',
                'choices' => [
                    'Congé annuel' => 'Congé annuel',
                    'Congé maladie' => 'Congé maladie',
                    'Congé de maternité' => 'Congé de maternité',
                    'Congé de paternité' => 'Congé de paternité',
                    'Congé parental' => 'Congé parental',
                    'Congé de deuil' => 'Congé de deuil',
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('employe',EntityType::class,[
                'class'=>Employe::class,
                'choice_label'=>'nom',
                'expanded'=>false,
                'multiple'=>false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Conge::class,
        ]);
    }
}
