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
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

final class CalculateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first', NumberType::class,
                [
                    'label'       => 'First number',
                    'constraints' => [new NotBlank(),],
                ])
            ->add('second', NumberType::class,
                [
                    'label'       => 'Second number',
                    'constraints' => [new NotBlank(),],
                ])
            ->add('operation', ChoiceType::class,
                [
                    'choices' => [
                        'plus (+)'           => 'plus',
                        'minus (-)'          => 'minus',
                        'multiplication (*)' => 'multiplication',
                        'division (/)'       => 'division',
                    ],
                ])
            ->add('save', SubmitType::class, ['label' => 'calculate']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class'  => Calculate::class,
            'constraints' => [
                new Callback([$this, 'validate']),
            ],
        ]);
    }

    public function validate(Calculate $formData, ExecutionContextInterface $context): void
    {
        if ($formData->getOperation() !== 'division') {
            return;
        }
        if ($formData->getSecond() !== 0.0) {
            return;
        }

        $context->buildViolation('Division by zero is not possible!')
            ->atPath('second')
            ->addViolation();
    }
}
