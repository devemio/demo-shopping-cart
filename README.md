# Shopping Cart Demo

## Install

Via Composer

``` bash
$ composer require isswp101/shopping-cart
```

## Usage

``` php
$cart = app(ICart::class);
```

Add
``` php
$cart->add(1, 10, 100, ['size' => 'xs']);
$cart->add(1, 20, 100, ['size' => 'xs']);
```
1 (Product ID) | 10 (Quantity) | 100 (Price) | ['size' => 'xs'] (Options)

Discount / Update
``` php
$item = $cart->add(1, 10, 20, [], [new PercentDiscount()]);
$item = $cart->update($item->getHashedID(), -5);
```

Clear / Delete
``` php
$cart->delete($id);
$cart->clear();
```

Total price
``` php
$cart->total();
```