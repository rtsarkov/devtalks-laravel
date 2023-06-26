<?php

namespace App\Providers;

use App\Http\Controllers\CacheEventController;
use App\Repositories\CacheEventRepository;
use App\Repositories\EventRepository;
use App\Repositories\EventRepositoryInterface;
use App\Repositories\TaskRepository;
use App\Repositories\TaskRepositoryInterface;
use App\Services\EventService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $binding = [
        TaskRepositoryInterface::class => TaskRepository::class
    ];

    protected array $singletons = [

    ];

    public function register(): void
    {

    }

    public function boot(): void
    {
    }
}
