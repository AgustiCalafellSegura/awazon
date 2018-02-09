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
     * @var string
     * @ORM\Column(type="string")
     */
    private $orderItems;

    /**
     * @var Provider
     * @ORM\ManyToOne(targetEntity="App\Entity\Provider", inversedBy="orders")
     * @ORM\JoinColumn(name="provider_id", referencedColumnName="id")
     */
    private $provider;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $customer;


}