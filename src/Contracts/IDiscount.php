<?php namespace Isswp101\ShoppingCart\Contracts;

interface IDiscount
{
    public function calculate($price);
}