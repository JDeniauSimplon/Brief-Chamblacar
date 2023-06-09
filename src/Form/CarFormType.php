<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('brand', TextType::class, [
                'label' => 'Marque',
            ])
            ->add('model', TextType::class, [
                'label' => 'Modèle',
                'attr' => [
                    'class' => 'car_form_model',
                ],
            ])
            ->add('seats', IntegerType::class, [
                'label' => 'Places',
                'attr' => [
                    'class' => 'car_form_seats',
                ],
            ])
            ->add('created', DateTimeType::class, [
                'data' => new \DateTimeImmutable(),
                'label' => 'Véhicule ajouté le',
                'disabled' => true,
                'input' => 'datetime_immutable', // Utiliser "datetime_immutable" comme type d'entrée
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}