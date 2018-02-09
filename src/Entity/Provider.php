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
     * @var integer
     * @ORM\Column(type="integer")
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
     * @return int
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param int $phone
     * @return Provider
     */
    public function setPhone(int $phone)
    {
        $this->phone = $phone;
        return $this;
    }
}