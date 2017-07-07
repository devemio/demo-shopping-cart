<?php namespace Isswp101\ShoppingCart;

use Isswp101\ShoppingCart\Contracts\ICartItem;
use Isswp101\ShoppingCart\Contracts\IDiscount;

class CartItem implements ICartItem
{
    private $productID;
    private $qty = 0;
    private $price = 0;
    private $options = [];

    /**
     * @var IDiscount[]
     */
    private $discounts = [];

    public function __construct($productID, $qty, $price, array $options, array $discounts)
    {
        $this->productID = $productID;
        $this->qty = $qty;
        $this->price = $price;
        $this->options = $options;
        $this->discounts = $discounts;
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

    public function getTotalPrice()
    {
        $price = $this->price;
        foreach ($this->discounts as $discount) {
            $price = $discount->calculate($price);
        }
        return $price;
    }
}