<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 20/02/18
 * Time: 16:51.
 */

namespace App\Form;

use App\Entity\Customer;
use App\Entity\Product;
use App\Entity\Rating;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RatingFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rate')
            ->add('customer', EntityType::class, array('class' => Customer::class))
            ->add('product', EntityType::class, array('class' => Product::class))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Rating::class,
        ));
    }
}
