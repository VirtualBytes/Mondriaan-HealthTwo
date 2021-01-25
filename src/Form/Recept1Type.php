<?php

namespace App\Form;

use App\Entity\Recept;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Recept1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('datum')
            ->add('periode')
            ->add('dosis')
            ->add('prijs')
            ->add('medicijn')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recept::class,
        ]);
    }
}
