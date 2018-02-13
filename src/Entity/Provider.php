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
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $phone;

    /**
     * @var array
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="provider", cascade={"persist"})
     */
    private $products;

    /**
     * @var array
     * @ORM\OneToMany(targetEntity="App\Entity\Order", mappedBy="provider", cascade={"persist"})
     */
    private $orders;

    public function __construct()
    {
        $this->products = array();
        $this->orders = array();
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
    public function setName(string $name)
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
    public function setAddress(string $address)
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
    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Provider
     */
    public function setPhone(string $phone): Provider
    {
        $this->phone = $phone;
        return $this;
    }


    /**
     * @param Product $product
     * @return $this
     */
    public function addProduct(Product $product)
    {
        $this->products[] = $product;
        $product->setProvider($this);

        return $this;
    }

    /**
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        foreach ($this->products as $itemSong)
        {
            if($itemSong->getName()){
                $this->products = array_diff($product);
            }
        }
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param array $products
     * @return Provider
     */
    public function setProducts(array $products): Provider
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return array
     */
    public function getOrders(): array
    {
        return $this->orders;
    }

    /**
     * @param array $orders
     * @return Provider
     */
    public function setOrders(array $orders): Provider
    {
        $this->orders = $orders;
        return $this;
    }


}