<?php

namespace App\Form;

use App\Entity\Article;
<<<<<<< Updated upstream
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
=======
use App\Entity\Sujet;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

>>>>>>> Stashed changes

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('auteur')
            ->add('descripton')
            ->add('imgArticle')
<<<<<<< Updated upstream
            ->add('SujetX')
=======
            ->add('SujetX',EntityType::class,[
                'class'=>Sujet::class,
                'choice_label'=>'nom',
         ])
>>>>>>> Stashed changes
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
