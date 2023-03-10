<?php

namespace App\Form;

use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateTimeType::class, [
                'widget' => 'single_text',
                'input' => 'datetime',
                'html5' => 'false',
                'by_reference' => true,
            ])
            ->add('user', null, [
                'empty_data' => ''
            ])
            ->add('statue', \Symfony\Component\Form\Extension\Core\Type\ChoiceType::class, [
                    'choices' => [
                        'pending' => 'pending',
                        'approved' => 'approved',
                    ]]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
            'attr' => [
                'novalidate' => 'novalidate',
            ]
        ]);
    }
}
