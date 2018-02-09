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
     *
     * @var Customes
     * @ORM\ManyToOne(targetEntity="Artist", inversedBy="albums")
     * @ORM\JoinColumn(name="artist_id", referencedColumnName="id")
     */
    private $client;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $datepurchose;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $product;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $amount;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $item;


}