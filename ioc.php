<?php

use Illuminate\Contracts\Container\Container;
use Isswp101\ShoppingCart\Cart;
use Isswp101\ShoppingCart\Contracts\ICart;
use Isswp101\ShoppingCart\Contracts\IRepository;
use Isswp101\ShoppingCart\Contracts\IUser;
use Isswp101\ShoppingCart\Repositories\RedisRepository;

function init(Container $app)
{
    $app->singleton(IUser::class, function () {
        return new class implements IUser
        {
            public function getID()
            {
                return 1;
            }
        };
    });

    $app->bind(IRepository::class, RedisRepository::class);

    $app->singleton(ICart::class, Cart::class);
}