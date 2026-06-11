<?php

namespace App\Form;

use App\Entity\Exercises;
use App\Entity\WorkoutRoutine;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WorkoutRoutineFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('mondayChecked', CheckboxType::class, ['required' => false])
            ->add('tuesdayChecked', CheckboxType::class, ['required' => false])
            ->add('wednesdayChecked', CheckboxType::class, ['required' => false])
            ->add('thursdayChecked', CheckboxType::class, ['required' => false])
            ->add('fridayChecked', CheckboxType::class, ['required' => false])
            ->add('saturdayChecked', CheckboxType::class, ['required' => false])
            ->add('sundayChecked', CheckboxType::class, ['required' => false])
            ->add('exercises', EntityType::class, [
                'class' => Exercises::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => WorkoutRoutine::class,
        ]);
    }
}
