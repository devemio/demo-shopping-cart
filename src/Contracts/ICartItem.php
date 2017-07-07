<?php namespace Isswp101\ShoppingCart\Contracts;

interface ICartItem
{
    public function getHashedID();

    public function setQty($qty);

    public function getQty();

    public function getTotalPrice();
}