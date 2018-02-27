<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 6/02/18
 * Time: 17:13
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\File;

/**
 * Class Image
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 * @ORM\Table(name="Images")
 */
class Image extends AbstractBase
{

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $image;

    /**
     * @var File
     * Vich\UploadableField(mapping="products", fileNameProperty="image")
     * Assert\Image()
     */
    private $imageFile;

    /**
     * @var Product
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="images")
     */
    private $product;

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param File $imageFile
     */
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Image
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function __toString()
    {
        return $this->getProduct()->getName().' · '.$this->getImage();
    }
}