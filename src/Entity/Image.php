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
 * Class Image
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\Image")
 * @ORM\Table(name="Images")
 */
class Image extends AbstractBase
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Provider
     */
    public function setName(string $name): Provider
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return Provider
     */
    public function setAddress(string $address): Provider
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Provider
     */
    public function setEmail(string $email): Provider
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return int
     */
    public function getPhone(): int
    {
        return $this->phone;
    }

    /**
     * @param int $phone
     * @return Provider
     */
    public function setPhone(int $phone): Provider
    {
        $this->phone = $phone;
        return $this;
    }
}