<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Cache\Events\CacheHit;
use Illuminate\Cache\Events\CacheMissed;
use Illuminate\Events\Dispatcher as EventsDispatcher;
use Illuminate\Support\Facades\Log;

class CacheSubscriber
{
    /**
     * Handle user CacheHit events.
     */
    public function handleCacheHit(CacheHit $event): void
    {
        Log::info("{$event->key} cache hit");
    }

    /**
     * Handle user CacheMissed events.
     */
    public function handleCacheMissed(CacheMissed $event): void
    {
        Log::info("{$event->key} cache miss");
    }

    /**
     * Register the listeners for the subscriber.
     */
    public function subscribe(EventsDispatcher $events): array
    {
        return [
            CacheHit::class => 'handleCacheHit',
            CacheMissed::class => 'handleCacheMissed',
        ];
    }
}
