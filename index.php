<?php

use Isswp101\ShoppingCart\Contracts\ICart;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/ioc.php';

init(app());

/** @var ICart $cart */
$cart = app(ICart::class);

dd($cart->add(1, 10));