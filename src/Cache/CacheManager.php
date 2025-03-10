<?php

namespace Skinnyshugo\LynxFramework\Cache;

use Illuminate\Contracts\Cache\Repository as CacheRepository;

class CacheManager
{
    protected $cache;

    public function __construct(CacheRepository $cache)
    {
        $this->cache = $cache;
    }

    public function remember($key, $ttl, callable $callback)
    {
        return $this->cache->remember($key, $ttl, $callback);
    }
}
