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
use Vich\UploaderBundle\Form\Type\VichFileType;

class ImageAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add(
                'imageFile',
                VichFileType::class,
                array(
                    'required' => false,
                    //TODO show image tumbnail
//                    'help' => 'help text'
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
            ->add('image')
            ->add('product')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add(
                'image',
                null,
                array(
                    'editable' => false,
                    //TODO show preview image thumbnail
                    'template' => 'backend/image/image_cell.html.twig',
                )
            )
            ->add(
                'product',
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
