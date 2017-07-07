<?php namespace Isswp101\ShoppingCart\Repositories;

use Isswp101\ShoppingCart\Contracts\ICartItem;
use Isswp101\ShoppingCart\Contracts\IRepository;
use Isswp101\ShoppingCart\Contracts\IUser;

class MySQLRepository implements IRepository
{
    private $user;

    public function __construct(IUser $user)
    {
        $this->user = $user;
    }

    public function has($id)
    {
        // TODO: Implement has() method.
    }

    public function get($id)
    {
        // TODO: Implement get() method.
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function save(ICartItem $item)
    {
        return $item;
    }

    public function delete($id = null)
    {
        // TODO: Implement delete() method.
    }
}