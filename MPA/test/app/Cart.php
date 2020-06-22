<?php

namespace App;

class Cart
{
    // Properties
    public $items = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;

    /**
     * Cart constructor.
     */
    public function __construct($oldcart)
    {
        if ($oldcart) {
            $this->items = $oldcart->items;
            $this->totalQuantity = $oldcart->totalQuantity;
            $this->totalPrice = $oldcart->totalPrice;
        }
    }

    // Add one item by id to the cart
    public function add ($item, $id)
    {
        $storedItem = ['quantity' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['quantity']++;
        $storedItem['price'] = $item->price * $storedItem['quantity'];
        $this->items[$id] = $storedItem;
        $this->totalQuantity++;
        $this->totalPrice += $item->price;
    }

    // Remove one item from the cart by id
    public function reduceOne ($id)
    {
        $this->items[$id]['quantity']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQuantity--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        if ($this->items[$id]['quantity'] <= 0) {
            unset($this->items[$id]);
        }
    }

    // Remove all items from the cart by id
    public function removeItem($id)
    {
        $this->totalQuantity -= $this->items[$id]['quantity'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}