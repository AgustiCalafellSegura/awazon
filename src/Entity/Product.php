<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 6/02/18
 * Time: 17:13.
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Product.
 *
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
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
     * @var float
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Image", mappedBy="product", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $images;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="OrderItem", mappedBy="product", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $orderItems;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Review", mappedBy="product", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $reviews;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Rating", mappedBy="product", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $ratings;

    /**
     * @var Provider
     * @ORM\ManyToOne(targetEntity="Provider", inversedBy="products")
     */
    private $provider;

    /**
     * @var Category
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
     */
    private $category;

    /**
     * Product constructor.
     */
    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->orderItems = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->ratings = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
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
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param ArrayCollection $images
     *
     * @return Product
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * @param Image $image
     *
     * @return $this
     */
    public function addImage(Image $image)
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setProduct($this);
        }

        return $this;
    }

    /**
     * @param Image $image
     *
     * @return $this
     */
    public function removeImage(Image $image)
    {
        if ($this->images->contains($image)) {
            $this->images->remove($image);
        }

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }

    /**
     * @param ArrayCollection $orderItems
     *
     * @return Product
     */
    public function setOrderItems($orderItems)
    {
        $this->orderItems = $orderItems;

        return $this;
    }

    /**
     * @param OrderItem $orderItem
     *
     * @return $this
     */
    public function addOrderItem(OrderItem $orderItem)
    {
        if (!$this->orderItems->contains($orderItem)) {
            $this->orderItems->add($orderItem);
            $orderItem->setProduct($this);
        }

        return $this;
    }

    /**
     * @param OrderItem $orderItem
     *
     * @return $this
     */
    public function removeOrderItem(OrderItem $orderItem)
    {
        if ($this->orderItems->contains($orderItem)) {
            $this->orderItems->remove($orderItem);
        }

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * @param ArrayCollection $reviews
     *
     * @return Product
     */
    public function setReviews($reviews)
    {
        $this->reviews = $reviews;

        return $this;
    }

    /**
     * @param Review $review
     *
     * @return $this
     */
    public function addReview(Review $review)
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
            $review->setProduct($this);
        }

        return $this;
    }

    /**
     * @param Review $review
     *
     * @return $this
     */
    public function removeReview(Review $review)
    {
        if ($this->reviews->contains($review)) {
            $this->reviews->remove($review);
        }

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getRatings()
    {
        return $this->ratings;
    }

    /**
     * @param ArrayCollection $ratings
     *
     * @return Product
     */
    public function setRatings($ratings)
    {
        $this->ratings = $ratings;

        return $this;
    }

    /**
     * @param Rating $rating
     *
     * @return $this
     */
    public function addRating(Rating $rating)
    {
        if (!$this->ratings->contains($rating)) {
            $this->ratings->add($rating);
            $rating->setProduct($this);
        }

        return $this;
    }

    /**
     * @param Rating $rating
     *
     * @return $this
     */
    public function removeRating(Rating $rating)
    {
        if ($this->ratings->contains($rating)) {
            $this->ratings->remove($rating);
        }

        return $this;
    }

    /**
     * @return Provider
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param Provider $provider
     *
     * @return Product
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     *
     * @return Product
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
