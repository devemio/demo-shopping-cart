<?php namespace Isswp101\ShoppingCart\Discounts;

use Isswp101\ShoppingCart\Contracts\IDiscount;

class PercentDiscount implements IDiscount
{
    const DISCOUNT = 20;

    public function calculate($price)
    {
        $res = $price - $price * PercentDiscount::DISCOUNT / 100;
        return $res < 0 ? 0 : $res;
    }
}