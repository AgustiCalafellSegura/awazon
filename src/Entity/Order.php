<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Order.
 *
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 * @ORM\Table(name="Orders")
 */
class Order extends AbstractBase
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="OrderItem", mappedBy="order", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $orderItems;

    /**
     * @var Provider
     *
     * @ORM\ManyToOne(targetEntity="Provider", inversedBy="orders")
     */
    private $provider;

    /**
     * @var Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="orders")
     */
    private $customer;

    /**
     * Methods.
     */

    /**
     * Order constructor.
     */
    public function __construct()
    {
        $this->orderItems = new ArrayCollection();
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     *
     * @return Order
     */
    public function setDate($date)
    {
        $this->date = $date;

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
     * @return Order
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
            $orderItem->setOrder($this);
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
     * @return Provider
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param Provider $provider
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
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
     * @return Order
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if ($this->getId()) {
            return $this->getDate()->format('d/m/Y').' · '.$this->getProvider()->getName().' · '.$this->getCustomer()->getName();
        }

        return '---';
    }
}
