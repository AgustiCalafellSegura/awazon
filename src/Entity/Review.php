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
 * Class Review
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\Review")
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Customer", inversedBy="orders")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    private $customer;

    /**
     * @var Product
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="orders")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;

    /**
     * @return string
     */
    public function getReview(): string
    {
        return $this->review;
    }

    /**
     * @param string $review
     * @return Review
     */
    public function setReview(string $review): Review
    {
        $this->review = $review;
        return $this;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     * @return Review
     */
    public function setCustomer(Customer $customer): Review
    {
        $this->customer = $customer;
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
     * @return Review
     */
    public function setProduct(Product $product): Review
    {
        $this->product = $product;
        return $this;
    }
}