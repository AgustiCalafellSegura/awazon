<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 30/4/18
 * Time: 19:58.
 */

namespace App\Twig;

use App\Entity\Image;
use App\Manager\ImageManager;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppCustomTwig extends AbstractExtension
{
    /**
     * @var ImageManager
     */
    public $imageManager;

    /**
     * AppCustomTwig constructor.
     *
     * @param ImageManager $imageManager
     */
    public function __construct(ImageManager $imageManager)
    {
        $this->imageManager = $imageManager;
    }

    /**
     * @return array|\Twig_Filter[]
     */
    public function getFilters()
    {
        return array(
            new TwigFilter('get_image_src', array($this, 'getImageSrc')),
            new TwigFilter('get_image_html', array($this, 'getImageHtml')),
        );
    }

    /**
     * @param Image  $object
     * @param string $size
     *
     * @return string
     */
    public function getImageSrc($object, $size)
    {
        return $this->imageManager->getImageSrc($object, $size);
    }

    /**
     * @param Image  $object
     * @param string $size
     *
     * @return string
     */
    public function getImageHtml($object, $size)
    {
        return $this->imageManager->getImageHtml($object, $size);
    }
}
