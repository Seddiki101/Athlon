<?php

namespace App\Form;

use App\Entity\Comments;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Captcha\Bundle\CaptchaBundle\Validator\Constraints\ValidCaptcha;
use Gregwar\CaptchaBundle\Type\CaptchaType;


class CommentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('email', EmailType::class, [
            'label' => 'Votre e-mail',
            'attr' => [
                'class' => 'form-control'
            ]
        ])
        ->add('nickname', TextType::class, [
            'label' => 'Votre pseudo',
            'attr' => [
                'class' => 'form-control'
            ]
        ])
        ->add('content')
        ->add('rgpd', CheckboxType::class, [
            'label' => 'Voulez vous vraiment publier ce comentaire ?',
          
            'constraints' => [
                new NotBlank()
               
            ]
        ])
        ->add('parentid', HiddenType::class, [
            'mapped' => false
        ])
        ->add('Publier', SubmitType::class,[
            'attr' => [
                'class' => 'c-btn'
            ]

        ])

        ->add('captcha', CaptchaType::class,[
            'attr' => [
               
                'class' => "form-control"
            ],
            ]
        )
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comments::class,
            'parentComment' => null,
        ]);
    }
}
