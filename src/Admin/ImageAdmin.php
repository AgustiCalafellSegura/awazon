<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichFileType;

/**
 * Class ImageAdmin.
 */
class ImageAdmin extends AbstractAdmin
{
    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
//        $vichUploaderService = $this->getConfigurationPool()->getContainer()->get('vich_uploader.templating.helper.uploader_helper');
//        $liipImagineService = $this->getConfigurationPool()->getContainer()->get('liip_imagine.cache.manager');
        $imageManager = $this->getConfigurationPool()->getContainer()->get('app.manager.image');
        $formMapper
            ->add(
                'imageFile',
                VichFileType::class,
                array(
                    'required' => false,
                    //TODO show image tumbnail
//                    'help' => 'help text'
                )
            );
        if ($this->getSubject()->getId()) {
            $formMapper
                ->add(
                    'img_thumbnail',
                    TextType::class,
                    array(
                        'mapped' => false,
                        'sonata_help' => $imageManager->getImageHtml($this->getSubject(), '300xY'),
                    )
                );
        }
        $formMapper
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

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('image')
            ->add('product')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
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
