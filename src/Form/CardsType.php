<?php

namespace App\Form;

use App\Entity\Cards;

use App\Entity\CurrentCards;
use App\Entity\Game;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CardsType extends AbstractType





{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('game', EntityType::class, [
                'label' => 'Choisissez votre jeu',
                'class' => Game::class,
                'choice_label' => 'Name',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('a')
                        ->orderBy('a.Name', 'ASC');
                },
            ])

            //formulaire qui récupère la liste des cartes//

            ->add('CurrentCards', EntityType::class, [
                'label' => 'cartes',
                'class' => CurrentCards::class,
                'choice_label' => 'NameCard',
                'query_builder' => function (EntityRepository $entityRepository) {
                    return $entityRepository ->createQueryBuilder('a')
                        ->orderBy('a.NameCard');
                }

            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cards::class,
        ]);
    }
}
