<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 13/03/18
 * Time: 16:57.
 */

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class OrderAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add(
                'date',
                TextType::class,
                array(
                    'required' => false,
                )
            )
            ->add(
                'orderItems',
                ModelType::class,
                array(
                    'attr' => array(
                        'hidden' => true,
                    ),
                )
            )
            ->add(
                'provider',
                ModelType::class,
                array(
                    'attr' => array(
                        'hidden' => true,
                    ),
                )
            )
            ->add(
                'customergit ',
                ModelType::class,
                array(
                    'attr' => array(
                        'hidden' => true,
                    ),
                )
            )
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('date')
            ->add('orderItems')
            ->add('provider')
            ->add('customer')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add(
                'date',
                null,
                array(
                    'editable' => true,
                    'collapse' => true,
                )
            )
            ->add(
                'orderItems',
                null,
                array(
                    'editable' => true,
                )
            )
            ->add(
                'provider',
                null,
                array(
                    'editable' => true,
                )
            )
            ->add(
                'customer',
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
