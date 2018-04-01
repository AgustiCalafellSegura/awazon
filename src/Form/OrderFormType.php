<?php

namespace App\Form;

use App\Entity\Customer;
use App\Entity\Order;
use App\Entity\Provider;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class OrderFormType.
 */
class OrderFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'date',
                DateType::class,
                array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                )
            )
            ->add(
                'orderItems',
                CollectionType::class,
                array(
                    'allow_add' => true,
                    'allow_delete' => true,
                    'entry_type' => OrderItemFormType::class,
                )
            )
            ->add(
                'provider',
                EntityType::class,
                array(
                    'class' => Provider::class,
                )
            )
            ->add(
                'customer',
                EntityType::class,
                array(
                    'class' => Customer::class,
                )
            )
            ->add(
                'save',
                SubmitType::class,
                array()
            )
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Order::class,
        ));
    }
}
