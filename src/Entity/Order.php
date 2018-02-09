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
 * Class Order
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\Order")
 * @ORM\Table(name="Orders")
 */
class Order extends AbstractBase
{
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $date;

    /**
     * @var array
     * @ORM\OneToMany(targetEntity="App\Entity\OrderItem", mappedBy="order", cascade={"persist"})
     */
    private $orderItems;

    /**
     * @var Provider
     * @ORM\ManyToOne(targetEntity="App\Entity\Provider", inversedBy="orders")
     * @ORM\JoinColumn(name="provider_id", referencedColumnName="id")
     */
    private $provider;

    /**
     * @var Customer
     */
    private $customer;

    public function __construct()
    {
        $this->customer = array();
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return Order
     */
    public function setDate(string $date): Order
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return array
     */
    public function getOrderItems(): array
    {
        return $this->orderItems;
    }

    /**
     * @param array $orderItems
     * @return Order
     */
    public function setOrderItems(array $orderItems): Order
    {
        $this->orderItems = $orderItems;
        return $this;
    }

    /**
     * @return Provider
     */
    public function getProvider(): Provider
    {
        return $this->provider;
    }

    /**
     * @param Provider $provider
     * @return Order
     */
    public function setProvider(Provider $provider): Order
    {
        $this->provider = $provider;
        return $this;
    }

    /**
     * @return int
     */
    public function getCustomer(): int
    {
        return $this->customer;
    }

    /**
     * @param int $customer
     * @return Order
     */
    public function setCustomer(int $customer): Order
    {
        $this->customer = $customer;
        return $this;
    }
}