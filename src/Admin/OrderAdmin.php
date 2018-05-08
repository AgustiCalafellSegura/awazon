<?php

namespace App\Admin;

use App\Entity\Customer;
use App\Entity\Provider;
use App\Repository\CustomerRepository;
use App\Repository\ProviderRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

/**
 * Class OrderAdmin.
 */
class OrderAdmin extends AbstractAdmin
{
    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add(
                'date',
                DateType::class,
                array(
                    'required' => false,
                )
            )
            ->add(
                'orderItems',
                CollectionType::class,
                array(
                )
            )
            ->add(
                'provider',
                EntityType::class,
                array(
                    'class' => Provider::class,
                    'query_builder' => function (ProviderRepository $pr) {
                        return $pr->findAllSortedByNameQB();
                    },
                )
            )
            ->add(
                'customer',
                EntityType::class,
                array(
                    'class' => Customer::class,
                    'query_builder' => function (CustomerRepository $pr) {
                        return $pr->findAllSortedByNameQB();
                    },
                )
            )
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('date')
            ->add('orderItems')
            ->add('provider')
            ->add('customer')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
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
