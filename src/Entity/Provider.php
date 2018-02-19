<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 6/02/18
 * Time: 17:13
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Provider
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\Provider")
 * @ORM\Table(name="Providers")
 */
class Provider extends AbstractBase
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
    private $address;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $phone;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Product", mappedBy="provider", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $products;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Order", mappedBy="provider", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $orders;

    /**
     * provider constructor.
     */
    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->orders = new ArrayCollection();
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
     * @return Provider
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return Provider
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Provider
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Provider
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param ArrayCollection $products
     * @return Provider
     */
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @param Product $product
     *
     * @return $this
     */
    public function addProduct(Product $product)
    {
        if (!$this->products->contains($product))
        {
            $this->products->add($product);
            $product->setProvider($this);
        }
        return $this;
    }

    /**
     * @param Product $product
     *
     * @return $this
     */
    public function removeProduct(Product $product)
    {
        if ($this->products->contains($product))
        {
            $this->products->remove($product);
        }
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param ArrayCollection $orders
     * @return Provider
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;
        return $this;
    }

    /**
     * @param Order $order
     *
     * @return $this
     */
    public function addOrder(Order $order)
    {
        if (!$this->orders->contains($order))
        {
            $this->orders->add($order);
            $order->setProvider($this);
        }
        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}