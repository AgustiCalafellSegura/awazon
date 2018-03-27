<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 13/03/18
 * Time: 16:57.
 */

namespace App\Admin;

use App\Entity\Category;
use App\Entity\Product;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Form\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
        '_sort_by' => 'name',
    ];

    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->with('Product', [
                'class' => 'col-md-8',
                'box_class' => 'box box-solid box-danger',
                'description' => 'Lorem ipsum',
            ])
            ->add('name')
            ->add('description')
            ->add('price')
            ->add('images')
            ->add('orderItems')
            ->add('reviews')
            ->add('ratings')
            ->add('provider')
            ->add('category')
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
                'description',
                TextType::class
            )
            ->add(
                'price',
                IntegerType::class
            )
            ->add(
                'provider',
                EntityType::class,
                array(
                    'class' => Product::class,
                    'query_builder' => function (ProductRepository $pr) {
                        return $pr->findAllSortedByNameQB();
                    },
                )
            )
            ->add(
                'category',
                EntityType::class,
                array(
                    'class' => Category::class,
                    'query_builder' => function (CategoryRepository $cr) {
                        return $cr->findAllSortedByNameQB();
                    },
                )
            )
            ->add(
                'images',
                CollectionType::class,
                array(
                    'required' => false,
                    'error_bubbling' => true,
                ),
                array(
                    'edit' => 'inline',
                    'inline' => 'table',
                )
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
                        'show' => [],
                        'delete' => [],
                    ),
                )
            )
        ;
    }
}
