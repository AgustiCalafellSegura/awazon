<?php

namespace App\Form;

use App\Entity\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class CustomerFormType.
 */
class CustomerFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('address')
            ->add(
                'email',
                EmailType::class
            )
            ->add(
                'phone',
                TelType::class
            )
            ->add(
                'reviews',
                CollectionType::class,
                array(
                    'allow_add' => true,
                    'allow_delete' => true,
                    'entry_type' => ReviewFormType::class,
                    'entry_options' => array('label' => false),
                )
            )
            ->add(
                'ratings',
                CollectionType::class,
                array('allow_add' => true,
                    'allow_delete' => true,
                    'entry_type' => RatingFormType::class,
                    'entry_options' => array('label' => false),
                )
            )
            ->add(
                'save',
                SubmitType::class
            )
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Customer::class,
        ));
    }
}
