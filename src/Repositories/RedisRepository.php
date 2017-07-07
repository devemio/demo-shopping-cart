<?php namespace Isswp101\ShoppingCart\Repositories;

use Isswp101\ShoppingCart\Contracts\ICartItem;
use Isswp101\ShoppingCart\Contracts\IRepository;
use Isswp101\ShoppingCart\Contracts\IUser;
use Predis\Client;

class RedisRepository implements IRepository
{
    private $user;
    private $client;

    public function __construct(IUser $user, Client $client)
    {
        $this->user = $user;
        $this->client = $client;
    }

    public function has($id)
    {
        return $this->get($id) != null;
    }

    public function get($id)
    {
        $item = unserialize($this->client->get($this->getKey($id)));
        return $item === false ? null : $item;
    }

    public function all()
    {
        $items = [];
        $keys = $this->client->keys($this->getKey(null));
        foreach ($keys as $key) {
            $items[] = unserialize($this->client->get($key));
        }
        return $items;
    }

    public function save(ICartItem $item)
    {
        $key = $this->getKey($item->getHashedID());
        $this->client->set($key, serialize($item));
        return $item;
    }

    public function delete($id = null)
    {
        $key = $this->getKey($id);
        $keys = $this->client->keys($key);
        if ($keys) {
            $this->client->del($keys);
        }
    }

    protected function getKey($id)
    {
        return 'cart:' . $this->user->getID() . ':' . ($id == null ? '*' : $id);
    }
}