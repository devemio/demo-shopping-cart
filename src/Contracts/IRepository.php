<?php namespace Isswp101\ShoppingCart\Contracts;

interface IRepository
{
    /**
     * @param string $id
     * @return bool
     */
    public function has($id);

    /**
     * @param string $id
     * @return ICartItem
     */
    public function get($id);

    /**
     * @param ICartItem $item
     * @return ICartItem
     */
    public function save(ICartItem $item);

    /**
     * @param string|null $id
     * @return void
     */
    public function delete($id = null);
}