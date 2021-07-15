<?php
declare(strict_types=1);

namespace App\Form;

use App\Entity\Calculate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class CalculateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first', NumberType::class)
            ->add('second', NumberType::class)
            ->add('operation', ChoiceType::class,
                [
                    'choices' => [
                        'plus (+)' => 'plus',
                        'minus (-)' => 'minus',
                        'multiplication (*)' => 'multiplication',
                        'division (/)' => 'division',
                    ],
                ])
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Calculate::class,
        ]);
    }
}
