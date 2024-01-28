<?php

namespace App\Services;

// use Illuminate\Support\Facades\Cache;

use App\Contracts\CounterContract;
use Illuminate\Contracts\Cache\Factory as Cache;
use Illuminate\Contracts\Session\Session;

class Counter implements CounterContract
{
    private $session;
    private $cache;
    private $timeout;
    private $supportsTags;

    public function __construct(Session $session, Cache $cache, Int $timeout)
    {
        $this->session = $session;
        $this->cache = $cache;
        $this->timeout = $timeout;
        $this->supportsTags = method_exists($cache, 'tags');
    }

    public function increment(String $key, array $tags = null): int
    {
        $sessionId = $this->session->getId();
        $counterKey = "{$key}-counter";
        $usersKey = "{$key}-users";

        $cache = $this->supportsTags && null != $tags
            ? $this->cache->tags($tags) : $this->cache;

        $users = $cache->get($usersKey, []);
        $usersUpdate = [];
        $difference = 0;
        $now = now();
        $counter = 0;

        foreach ($users as $session => $lastVisit) {
            if ($now->diffInMinutes($lastVisit) >= $this->timeout) {
                $difference--;
            } else {
                $usersUpdate[$session] = $lastVisit;
            }
        }

        if (
            !array_key_exists($sessionId, $users)
            || $now->diffInMinutes($users[$sessionId]) >= $this->timeout
        ) {
            $difference++;
        }

        $usersUpdate[$sessionId] = $now;
        $cache->forever($usersKey, $usersUpdate);
        if (!$cache->has($counterKey)) {
            $cache->forever($counterKey, 1);;
        } else {
            $cache->increment($counterKey, $difference);
        }

        $counter = $cache->get($counterKey);
        return $counter;
    }
}
