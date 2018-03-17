<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 13/03/18
 * Time: 16:57
 */

namespace App\Admin;

use App\Form\CustomerFormType;
use App\Form\ProductFormType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RatingAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add(
                'rate',
                TextType::class
            )
            ->add(
                'customer',
                CustomerFormType::class
            )
            ->add(
                'product',
                ProductFormType::class,
                array(
                    'required' => false,
                )
            )
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('rate')
            ->add('customer')
            ->add('product')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add(
                'rate',
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