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
 * Class Rating
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\Rating")
 * @ORM\Table(name="Ratings")
 */
class Rating extends AbstractBase
{

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $rate;

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
     * @return int
     */
    public function getRate(): int
    {
        return $this->rate;
    }

    /**
     * @param int $rate
     * @return Rating
     */
    public function setRate(int $rate): Rating
    {
        $this->rate = $rate;
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
     * @return Rating
     */
    public function setCustomer(Customer $customer): Rating
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
     * @return Rating
     */
    public function setProduct(Product $product): Rating
    {
        $this->product = $product;
        return $this;
    }
}