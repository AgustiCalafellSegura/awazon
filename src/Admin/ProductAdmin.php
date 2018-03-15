<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 13/03/18
 * Time: 16:57
 */

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProductAdmin extends AbstractAdmin
{
    /**
     * Default values to the datagrid.
     *
     * @var array
     */
    protected $datagridValues = [
        '_page' => 1,
        '_per_page' => 32,
        '_sort_order' => 'ASC',
        '_sort_by' => 'name'
    ];

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add(
                'name',
                TextType::class
            )
            ->add(
                'description',
                TextType::class
            )
            ->add(
                'price',
                IntegerType::class
            )
            ->add(
                'provider',
                TextType::class
            )
            ->add(
                'category',
                TextType::class
            )
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('provider')
            ->add('category')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add(
                'name',
                null,
                array(
                    'editable' => true,
                )
            )
            ->add(
                'description',
                null,
                array(
                    'editable' => true,
                )
            )
            ->add(
                'price',
                null,
                array(
                    'editable' => true,
                )
            )
            ->add(
                'provider',
                null,
                array(
                    'editable' => false,
                )
            )
            ->add(
                'category',
                null,
                array(
                    'editable' => false,
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