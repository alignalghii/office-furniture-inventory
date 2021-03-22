<?php

namespace App\Form;

use App\Entity\IUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('email')
            ->add(
                'password',
                TextType::class,
                isset($options['attr']['data-keepable-password']) ? ['label' => $options['attr']['data-keepable-password']] : []
            )->add('privilege')
            ->add('active')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => IUser::class,
        ]);
    }
}
