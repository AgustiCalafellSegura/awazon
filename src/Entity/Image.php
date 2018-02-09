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
 * @ORM\Entity(repositoryClass="App\Repository\Image")
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
     *
     */
    private $imageFile;

    /**
     * @var Product
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="orders")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Image
     */
    public function setImage(string $image): Image
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return File
     */
    public function getImageFile(): File
    {
        return $this->imageFile;
    }

    /**
     * @param File $imageFile
     * @return Image
     */
    public function setImageFile(File $imageFile): Image
    {
        $this->imageFile = $imageFile;
        return $this;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     * @return Image
     */
    public function setProduct(Product $product): Image
    {
        $this->product = $product;
        return $this;
    }
}