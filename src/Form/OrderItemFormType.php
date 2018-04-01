<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 20/02/18
 * Time: 16:51.
 */

namespace App\Form;

use App\Entity\Order;
use App\Entity\OrderItem;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderItemFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('units')
            ->add('order', EntityType::class, array('class' => Order::class))
            ->add('product', EntityType::class, array('class' => Product::class))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => OrderItem::class,
        ));
    }
}
