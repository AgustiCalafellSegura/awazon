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
 * Class Category
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\Category")
 * @ORM\Table(name="Categories")
 */
class Category extends AbstractBase
{

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var array
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="category", cascade={"persist"})
     */
    private $products;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Category
     */
    public function setName(string $name): Category
    {
        $this->name = $name;
        return $this;
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
     * @return Category
     */
    public function setProducts(array $products): Category
    {
        $this->products = $products;
        return $this;
    }
}