<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 30/4/18
 * Time: 18:40.
 */

namespace App\Manager;

use Vich\UploaderBundle\Templating\Helper\UploaderHelper;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;

class ImageManager
{
    /**
     * @var UploaderHelper
     */
    private $vichUploaderService;

    /**
     * @var CacheManager
     */
    private $liipImagineService;

    /**
     * ImageManager constructor.
     *
     * @param UploaderHelper $vichUploaderService
     * @param CacheManager   $liipImagineService
     */
    public function __construct(UploaderHelper $vichUploaderService, CacheManager $liipImagineService)
    {
        $this->vichUploaderService = $vichUploaderService;
        $this->liipImagineService = $liipImagineService;
    }

    /**
     * @param mixed  $object
     * @param string $size
     *
     * @return string
     */
    public function getImageUrl($object, $size)
    {
        return $this->liipImagineService->generateUrl($this->vichUploaderService->asset($object, 'imageFile'), $size);
    }
}
