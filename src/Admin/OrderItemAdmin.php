<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 13/03/18
 * Time: 16:57
 */

namespace App\Admin;

use App\Form\OrderFormType;
use App\Form\ProductFormType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class OrderItemAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add(
                'units',
                TextType::class
            )
            ->add(
                'product',
                ModelType::class,
                array(
                    'attr' => array(
                        'hidden' => true,
                    )
                )
            )
            ->add(
                'product',
                ModelType::class,
                array(
                    'attr' => array(
                        'hidden' => true,
                    )
                )
            )
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('units')
            ->add('order')
            ->add('product')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add(
                'units',
                null,
                array(
                    'editable' => true,
                    'collapse' => true,
                )
            )
            ->add(
                'order',
                null,
                array(
                    'editable' => true,
                )
            )
            ->add(
                'product',
                null,
                array(
                    'editable' => true,
                )
            )
            ->add(
                '_actions',
                'actions',
                array(
                    'actions' => array(
                        'edit' => [],
                        'delete' => [],
                    ),
                )
            )
        ;
    }
}