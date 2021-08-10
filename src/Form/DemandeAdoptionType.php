<?php

namespace App\Form;

use App\Entity\DemandeAdoption;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandeAdoptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('messages', CollectionType::class, [
                'entry_type' => MessagingType::class
            ])
            ->add('sujet', TextType::class, ['required'=> true,])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DemandeAdoption::class,
        ]);
    }
}
