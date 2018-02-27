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
 * Class OrderItem
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\OrderItemRepository")
 * @ORM\Table(name="OrderItems")
 */
class OrderItem extends AbstractBase
{

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $units;

    /**
     * @var Order
     * @ORM\ManyToOne(targetEntity="Order", inversedBy="orderItems")
     */
    private $order;

    /**
     * @var Product
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="orderItems")
     */
    private $product;

    /**
     * @return int
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * @param int $units
     * @return OrderItem
     */
    public function setUnits($units)
    {
        $this->units = $units;
        return $this;
    }

    /**
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param Order $order
     * @return OrderItem
     */
    public function setOrder($order)
    {
        $this->order = $order;
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
     * @return OrderItem
     */
    public function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }

    public function __toString()
    {
        return $this->getOrder()->getProvider()->getName().' · '.$this->getProduct()->getName();
    }
}