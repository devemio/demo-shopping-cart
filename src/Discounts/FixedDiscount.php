<?php namespace Isswp101\ShoppingCart\Discounts;

use Isswp101\ShoppingCart\Contracts\IDiscount;

class FixedDiscount implements IDiscount
{
    const DISCOUNT = 200;

    public function calculate($price)
    {
        $res = $price - FixedDiscount::DISCOUNT;
        return $res < 0 ? 0 : $res;
    }
}