<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 6/02/18
 * Time: 17:13.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Review.
 *
 * @ORM\Entity(repositoryClass="App\Repository\ReviewRepository")
 * @ORM\Table(name="Reviews")
 */
class Review extends AbstractBase
{
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $review;

    /**
     * @var Customer
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="reviews")
     */
    private $customer;

    /**
     * @var Product
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="reviews")
     */
    private $product;

    /**
     * @return string
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * @param string $review
     *
     * @return Review
     */
    public function setReview($review)
    {
        $this->review = $review;

        return $this;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     *
     * @return Review
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
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
     *
     * @return Review
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    public function __toString()
    {
        return $this->getReview();
    }
}
