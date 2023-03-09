<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\CallbackTransformer;



class UserTypedit2 extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('nom')
            ->add('prenom')
			->add('email')
            ->add('password')
			
			->add('roles', ChoiceType::class, [
					'choices' => [
					'User' => 'ROLE_USER',
					'Admin' => 'ROLE_ADMIN',
					]  
				]) 
				
				

				
				
	
			->add('phone')
			->add('adres')
			->add('imgUsr',FileType::class,[
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
			
			
			
			
			;
			
			
			
			
			
			       // Data transformer
        $builder->get('roles')
            ->addModelTransformer(new CallbackTransformer(
                function ($rolesArray) {
                     // transform the array to a string
                     return count($rolesArray)? $rolesArray[0]: null;
                },
                function ($rolesString) {
                     // transform the string back to an array
                     return [$rolesString];
                }
        ));
			
			
			
			
			
			
			
			
			
        
    }
	
	

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
