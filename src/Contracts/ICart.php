<?php namespace Isswp101\ShoppingCart\Contracts;

use Isswp101\ShoppingCart\CartItem;

interface ICart
{
    /**
     * Add a product to the shopping cart.
     *
     * @param int $productID
     * @param int|float $qty
     * @param int|float $price
     * @param array $options
     * @param IDiscount[] $discounts
     * @return CartItem
     */
    public function add($productID, $qty, $price, array $options = [], array $discounts = []);

    /**
     * Update the product quantity.
     *
     * @param string $id
     * @param int|float $qty
     * @return CartItem
     */
    public function update($id, $qty);

    /**
     * Delete the product.
     *
     * @param string $id
     * @return void
     */
    public function delete($id);

    /**
     * Clear the shopping cart.
     *
     * @return void
     */
    public function clear();

    /**
     * Calculate the total amount.
     *
     * @return int|float
     */
    public function total();
}