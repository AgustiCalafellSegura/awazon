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
 * @ORM\Entity(repositoryClass="App\Repository\OrderItem")
 * @ORM\Table(name="OrderItems")
 */
class OrderItem extends AbstractBase
{

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $unit;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $product;

    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param string $unit
     * @return OrderItem
     */
    public function setUnit(string $unit)
    {
        $this->unit = $unit;
        return $this;
    }

    /**
     * @return string
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param string $product
     * @return OrderItem
     */
    public function setProduct(string $product)
    {
        $this->product = $product;
        return $this;
    }


}