<?php

namespace App\Form;

use App\Entity\Trajet;
use App\Entity\Utilisateur;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrajetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('villeD', TextType::class, [
                'attr' => ['class' => 'tinymce'],
            ])
            ->add('dateD', DateType::class)
            ->add('heureD', TimeType::class)
            ->add('villeA', TextType::class)
            ->add('dateA', DateType::class)
            ->add('heureA', TimeType::class)
            ->add('place_dispo', NumberType::class)
            ->add('prix', NumberType::class)
            ->add('distance', NumberType::class)         
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trajet::class,
        ]);
    }
}
