<?php namespace Isswp101\ShoppingCart\Contracts;

use Isswp101\ShoppingCart\CartItem;

interface ICart
{
    /**
     * Add a product to the shopping cart.
     *
     * @param int $productID
     * @param int|float $qty
     * @param array $options
     * @return CartItem
     */
    public function add($productID, $qty, array $options = []);

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
}