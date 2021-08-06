<?php

namespace App\Form;

use App\Entity\Dog;
use App\Entity\Image;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('estAdopte')
            ->add('estTolerant')
            ->add('nom')
            ->add('antecedents')
            ->add('ifLof')
            ->add('description')
            ->add('Breeds')
            ->add('images', EntityType::class, [
                'class' => Image::class,
                'by_reference' => false,  //pour s'assurer que l'image soit ajoutée avec les guetter et setters
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Dog::class,
        ]);
    }
}
