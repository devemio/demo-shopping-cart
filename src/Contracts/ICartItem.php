<?php namespace Isswp101\ShoppingCart\Contracts;

interface ICartItem
{
    public function getHashedID();

    public function setQty($qty);
}