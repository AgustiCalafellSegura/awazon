<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * CategoryAdmin class.
 */
class CategoryAdmin extends AbstractAdmin
{
    /**
     * @var array
     */
    protected $datagridValues = [
        '_page' => 1,
        '_per_page' => 32,
        '_sort_order' => 'ASC',
        '_sort_by' => 'name',
    ];

    /**
     * Methods.
     */

    /**
     * @param ShowMapper $showMapper
     */
    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->with('Category', [
                'class' => 'col-md-8',
                'box_class' => 'box box-solid box-danger',
                'description' => 'Lorem ipsum',
            ])
            ->add('name')
            ->add('products')
            ->end()
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', TextType::class);
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    /**
     * @param ListMapper $listMapper
     */
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
