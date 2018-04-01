<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 20/02/18
 * Time: 16:51.
 */

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('price')
            ->add('images',
                CollectionType::class,
                array(
                    'entry_type' => ImageFormType::class,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                )
            )
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Product::class,
        ));
    }
}
