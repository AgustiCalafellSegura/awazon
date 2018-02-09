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
 * Class Customer
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\Customer")
 * @ORM\Table(name="Customer")
 */
class Customer extends AbstractBase
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
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $phone;

    /**
     * @var array
     * @ORM\OneToMany(targetEntity="App\Entity\Order", mappedBy="customer", cascade={"persist"})
     */
    private $orders;

    /**
     * @var array
     * @ORM\OneToMany(targetEntity="App\Entity\Review", mappedBy="customer", cascade={"persist"})
     */
    private $reviews;

    /**
     * @var array
     * @ORM\OneToMany(targetEntity="App\Entity\Rating", mappedBy="customer", cascade={"persist"})
     */
    private $ratings;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Customer
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
     * @return Customer
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
     * @return Customer
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return int
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param int $phone
     * @return Customer
     */
    public function setPhone(int $phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @param Order $order
     * @return $this
     */
    public function addOrder(Order $order)
    {
        $this->orders[] = $order;
        $order->setOrderItems($this);

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
     * @return Customer
     */
    public function setOrders(array $orders): Customer
    {
        $this->orders = $orders;
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
     * @return Customer
     */
    public function setReviews(array $reviews): Customer
    {
        $this->reviews = $reviews;
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
     * @return Customer
     */
    public function setRatings(array $ratings): Customer
    {
        $this->ratings = $ratings;
        return $this;
    }
}