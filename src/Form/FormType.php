<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\CurrencyExchange;
use Doctrine\DBAL\Types\DateTimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateTime', DateTimeType::class, [
                'required' => true,
                'widget' => 'single_text',
                'html5' => true])
            ->add('wybierzKurs', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
    }
}
