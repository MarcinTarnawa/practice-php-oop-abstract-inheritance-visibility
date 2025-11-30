<?php

class Cart
{
    public $cart = [];
    
    public function addProduct(Product $product)
    {
        $this->cart[] = $product;
        return $this->cart;
    }

    public function removeFromCart($id)
    {
       foreach ($this->cart as $key => $product) {
            if ($key === $id) {
                unset($this->cart[$id]);
                return;
            }
        }
    }

    public function getCartProducts()
    {
        return $this->cart;
    }

    public function viewProducts()
    {
        foreach ($this->cart as $list => $item) {
            foreach($item as $name)
                echo $name . '<br>';
        }
    }
}