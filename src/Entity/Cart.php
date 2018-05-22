<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Cart.
 */
class Cart
{
    /**
     * @var CartItem[]
     */
    private $items;

    /**
     * Cart constructor.
     */
    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    /**
     * @return CartItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param CartItem[] $items
     *
     * @return $this
     */
    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @param CartItem $item
     *
     * @return $this
     */
    public function addItem(CartItem $item)
    {
        if (!$this->items->contains($item)) {
            $this->items->add($item);
            $item->setCart($this);
        }

        return $this;
    }

    /**
     * @param CartItem $item
     *
     * @return $this
     */
    public function removeItem(CartItem $item)
    {
        if ($this->items->contains($item)) {
            $this->items->remove($item);
        }

        return $this;
    }
}
