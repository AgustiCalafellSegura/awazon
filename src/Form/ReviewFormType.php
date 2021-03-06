<?php

namespace App\Form;

use App\Entity\Customer;
use App\Entity\Product;
use App\Entity\Review;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ReviewFormType.
 */
class ReviewFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('review')
            ->add(
                'customer',
                EntityType::class,
                array(
                    'class' => Customer::class,
                )
            )
            ->add(
                'product',
                EntityType::class,
                array(
                    'class' => Product::class,
                )
            )
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Review::class,
        ));
    }
}
