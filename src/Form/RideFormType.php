<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Ride;

class RideFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('departure', TextType::class, [
                'label' => 'Lieu de départ',
            ])
            ->add('destination', TextType::class, [
                'label' => "Lieu d'arrivée",
            ])
            ->add('seats', IntegerType::class, [
                'label' => 'Places disponibles',
            ])
            ->add('price', IntegerType::class, [
                'label' => 'Prix',
            ])
            ->add('date', DateTimeType::class, [
                'label' => 'Date de départ',
                'widget' => 'single_text',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ride::class,
        ]);
    }
}