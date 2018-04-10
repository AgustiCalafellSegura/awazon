<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Rating.
 *
 * @ORM\Entity(repositoryClass="App\Repository\RatingRepository")
 * @ORM\Table(name="Ratings")
 */
class Rating extends AbstractBase
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @Assert\Range(min="1", max="5")
     */
    private $rate;

    /**
     * @var Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="ratings")
     */
    private $customer;

    /**
     * @var Product
     *
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="ratings")
     */
    private $product;

    /**
     * Methods.
     */

    /**
     * @return int
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param int $rate
     *
     * @return Rating
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

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
     * @return Rating
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
     * @return Rating
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if ($this->getId()) {
            return $this->getCustomer()->getName().' · '.$this->getProduct()->getName().' · '.$this->getRate();
        }

        return '---';
    }
}
