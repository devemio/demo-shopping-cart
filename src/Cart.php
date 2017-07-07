<?php namespace Isswp101\ShoppingCart;

use Isswp101\ShoppingCart\Contracts\ICart;
use Isswp101\ShoppingCart\Contracts\IRepository;
use Isswp101\ShoppingCart\Exceptions\CartItemNotFoundException;
use Isswp101\ShoppingCart\Exceptions\IllegalQuantityException;

class Cart implements ICart
{
    private $repository;

    public function __construct(IRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function validateQty($qty)
    {
        if ($qty == 0) {
            throw new IllegalQuantityException();
        }
    }

    public function add($productID, $qty, $price, array $options = [], array $discounts = [])
    {
        $this->validateQty($qty);
        $item = new CartItem($productID, $qty, $price, $options, $discounts);
        if ($existingItem = $this->repository->get($item->getHashedID())) {
            $item->setQty($existingItem->getQty());
        }
        $this->repository->save($item);
        return $item;
    }

    public function update($id, $qty)
    {
        $this->validateQty($qty);
        $item = $this->repository->get($id);
        if (!$item) {
            throw new CartItemNotFoundException();
        }
        $item->setQty($qty);
        $this->repository->save($item);
        return $item;
    }

    public function delete($id)
    {
        $this->repository->delete($id);
    }

    public function clear()
    {
        $this->repository->delete();
    }

    public function total()
    {
        $total = 0;
        foreach ($this->repository->all() as $item) {
            $total += $item->getTotalPrice() * $item->getQty();
        }
        return $total;
    }
}