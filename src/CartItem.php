<?php namespace Isswp101\ShoppingCart;

use Isswp101\ShoppingCart\Contracts\ICartItem;

class CartItem implements ICartItem
{
    private $productID;
    private $qty = 0;
    private $options = [];

    public function __construct($productID, $qty, array $options)
    {
        $this->productID = $productID;
        $this->qty = $qty;
        $this->options = $options;
    }

    public function getHashedID()
    {
        ksort($this->options);
        return md5($this->productID . serialize($this->options));
    }

    public function setQty($qty)
    {
        $this->qty += $qty;
    }

    public function getProductID()
    {
        return $this->productID;
    }

    public function getQty()
    {
        return $this->qty;
    }

    public function getOptions()
    {
        return $this->options;
    }
}