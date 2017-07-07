<?php

use Isswp101\ShoppingCart\Contracts\ICart;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/ioc.php';

init(app());

/** @var ICart $cart */
$cart = app(ICart::class);

$cart->add(1, 10, ['size' => 'xs']);
$cart->add(1, 20, ['size' => 'xs']);
$item = $cart->add(1, 10);
$item = $cart->update($item->getHashedID(), -5);
// $cart->clear();
dd($item->getQty());