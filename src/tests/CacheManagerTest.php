<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Skinnyshugo\LynxFramework\Cache\CacheManager;
use Illuminate\Cache\ArrayStore;
use Illuminate\Cache\Repository;

class CacheManagerTest extends TestCase
{
    public function testCache()
    {
        $cache = new CacheManager(new Repository(new ArrayStore()));

        $result = $cache->remember('test_key', 60, function () {
            return 'cached_value';
        });

        $this->assertEquals('cached_value', $result);
    }
}
