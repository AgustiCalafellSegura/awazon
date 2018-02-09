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
     * @var array
     * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="product", cascade={"persist"})
     */
    private $image;

    /**
     * @var float
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @var Category
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="orders")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @var array
     * @ORM\OneToMany(targetEntity="App\Entity\Rating", mappedBy="product", cascade={"persist"})
     */
    private $ratings;

    /**
     * @var array
     * @ORM\OneToMany(targetEntity="App\Entity\OrderItem", mappedBy="product", cascade={"persist"})
     */
    private $orderItems;
    /**
     * @var array
     * @ORM\OneToMany(targetEntity="App\Entity\Review", mappedBy="product", cascade={"persist"})
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Product
     */
    public function setDescription(string $description): Product
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return array
     */
    public function getImage(): array
    {
        return $this->image;
    }

    /**
     * @param array $image
     * @return Product
     */
    public function setImage(array $image): Product
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return Product
     */
    public function setPrice(float $price): Product
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return Product
     */
    public function setCategory(Category $category): Product
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return array
     */
    public function getRatings(): array
    {
        return $this->ratings;
    }

    /**
     * @param array $ratings
     * @return Product
     */
    public function setRatings(array $ratings): Product
    {
        $this->ratings = $ratings;
        return $this;
    }

    /**
     * @return array
     */
    public function getOrderItems(): array
    {
        return $this->orderItems;
    }

    /**
     * @param array $orderItems
     * @return Product
     */
    public function setOrderItems(array $orderItems): Product
    {
        $this->orderItems = $orderItems;
        return $this;
    }

    /**
     * @return array
     */
    public function getReviews(): array
    {
        return $this->reviews;
    }

    /**
     * @param array $reviews
     * @return Product
     */
    public function setReviews(array $reviews): Product
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