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

class ReviewAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add(
                'review',
                ModelType::class,
                array(
                    'attr' => array(
                        'hidden' => true,
                    ),
                )
            )
            ->add(
                'customer',
                ModelType::class,
                array(
                    'attr' => array(
                        'hidden' => true,
                    ),
                )
            )
            ->add(
                'product',
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
            ->add('review')
            ->add('customer')
            ->add('product')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add(
                'review',
                null,
                array(
                    'editable' => true,
                    'collapse' => true,
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
