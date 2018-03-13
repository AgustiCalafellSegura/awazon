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
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Customer
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\CustomerRepository")
 * @ORM\Table(name="Customers")
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
     * @ORM\Column(type="string", nullable=true)
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
     * @ORM\Column(type="string", nullable=true)
     */
    private $phone;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Order", mappedBy="customer", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $orders;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Review", mappedBy="customer", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $reviews;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Rating", mappedBy="customer", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $ratings;

    /**
     * Customer constructor.
     */
    public function __construct()
    {
        $this->orders = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->ratings = new ArrayCollection();
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
     * @return Customer
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
     * @return Customer
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
     * @return Customer
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
     * @return Customer
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
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
     * @return Customer
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;
        return $this;
    }

    /**
     * @param Order $order
     * @return $this
     */
    public function addOrder(Order $order)
    {
        if (!$this->orders->contains($order))
        {
            $this->orders->add($order);
            $order->setCustomer($this);
        }
        return $this;
    }

    public function removeOrder (Order $order)
    {
        if ($this->orders->contains($order))
        {
            $this->orders->remove($order);
        }
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * @param ArrayCollection $reviews
     * @return Customer
     */
    public function setReviews($reviews)
    {
        $this->reviews = $reviews;
        return $this;
    }

    /**
     * @param Review $review
     *
     * @return $this
     */
    public function addReview(Review $review)
    {
        if (!$this->reviews->contains($review)){
            $this->reviews->add($review);
            $review->setCustomer($this);
        }
        return $this;
    }

    /**
     * @param Review $review
     *
     * @return $this
     */
    public function removeReview(Review $review)
    {
        if ($this->reviews->contains($review))
        {
            $this->reviews->remove($review);
        }
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getRatings()
    {
        return $this->ratings;
    }

    /**
     * @param ArrayCollection $ratings
     * @return Customer
     */
    public function setRatings($ratings)
    {
        $this->ratings = $ratings;
        return $this;
    }

    /**
     * @param Rating $rating
     *
     * @return $this
     */
    public function addRating(Rating  $rating)
    {
        if (!$this->ratings->contains($rating))
        {
            $this->ratings->add($rating);
            $rating->setCustomer($this);
        }
        return $this;
    }

    /**
     * @param Rating $rating
     *
     * @return $this
     */
    public function removeRating(Rating $rating)
    {
        if ($this->ratings->contains($rating))
        {
            $this->ratings->remove($rating);
        }
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if($this->getName()){
            return $this->getName();
        }
        return '---';
    }
}