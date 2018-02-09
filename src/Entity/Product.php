<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 6/02/18
 * Time: 17:13
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Product
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\Product")
 * @ORM\Table(name="Products")
 */
class Product extends AbstractBase
{

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $image;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $category;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $ratings;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $orderItems;
    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $reviews;

    /**
     * @var Provider
     * @ORM\ManyToOne(targetEntity="App\Entity\Provider", inversedBy="products")
     * @ORM\JoinColumn(name="provider_id", referencedColumnName="id")
     */
    private $provider;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Product
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Product
     */
    public function setImage(string $image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     * @return Product
     */
    public function setPrice(int $price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param int $category
     * @return Product
     */
    public function setCategory(int $category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return int
     */
    public function getRatings(): int
    {
        return $this->ratings;
    }

    /**
     * @param int $ratings
     * @return Product
     */
    public function setRatings(int $ratings): Product
    {
        $this->ratings = $ratings;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrderItems(): int
    {
        return $this->orderItems;
    }

    /**
     * @param int $orderItems
     * @return Product
     */
    public function setOrderItems(int $orderItems): Product
    {
        $this->orderItems = $orderItems;
        return $this;
    }

    /**
     * @return int
     */
    public function getReviews(): int
    {
        return $this->reviews;
    }

    /**
     * @param int $reviews
     * @return Product
     */
    public function setReviews(int $reviews): Product
    {
        $this->reviews = $reviews;
        return $this;
    }

    /**
     * @return Provider
     */
    public function getProvider(): Provider
    {
        return $this->provider;
    }

    /**
     * @param Provider $provider
     * @return Product
     */
    public function setProvider(Provider $provider): Product
    {
        $this->provider = $provider;
        return $this;
    }
}