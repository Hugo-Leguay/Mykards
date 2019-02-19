<?php

namespace App\Form;

use App\Entity\Cards;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CardsType extends AbstractType





{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Type')


        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cards::class,
        ]);
    }
}
