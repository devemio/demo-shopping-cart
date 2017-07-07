<?php

use Isswp101\ShoppingCart\Contracts\ICart;
use Isswp101\ShoppingCart\Discounts\PercentDiscount;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/ioc.php';

init(app());

/** @var ICart $cart */
$cart = app(ICart::class);

$cart->add(1, 10, 100, ['size' => 'xs']);
$cart->add(1, 20, 100, ['size' => 'xs']);
$item = $cart->add(1, 10, 20, [], [new PercentDiscount()]);
$item = $cart->update($item->getHashedID(), -5);

// $cart->clear();

dd($cart->total());