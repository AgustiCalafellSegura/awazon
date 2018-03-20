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
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProviderAdmin extends AbstractAdmin
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
        '_sort_by' => 'name',
    ];

    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->with('Personal data', [
                'class' => 'col-md-4',
                'box_class' => 'box box-solid box-danger',
                'description' => 'Lorem ipsum',
            ])
            ->add('name')
            ->add('address')
            ->add('email')
            ->add('phone')
            ->end()
            ->with('Products', [
                'class' => 'col-md-4',
                'box_class' => 'box box-solid box-danger',
                'description' => 'Lorem ipsum',
            ])

            ->add('products')
            ->end()

            ->with('Orders', [
                'class' => 'col-md-4',
                'box_class' => 'box box-solid box-danger',
                'description' => 'Lorem ipsum',
            ])

            ->add('orders')
            // ...
            ->end()
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add(
                'name',
                TextType::class
            )
            ->add(
                'email',
                EmailType::class
            )
            ->add(
                'address',
                TextType::class,
                array(
                    'required' => false,
                )
            )
            ->add(
                'phone',
                TextType::class,
                array(
                    'required' => false,
                )
            )
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('email')
            ->add('address')
            ->add('phone')
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
                'email',
                null,
                array(
                    'editable' => true,
                )
            )
            ->add(
                'phone',
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
                        'show' => [],
                        'delete' => [],
                    ),
                )
            )
        ;
    }
}
