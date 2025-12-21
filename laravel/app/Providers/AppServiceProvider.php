<?php

namespace App\Providers;

use App\Repository\FileTaskRepository;
use App\Repository\MySqlTaskRepository;
use App\Repository\TaskRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $repositoryType = config('repository.type', 'mysql');
        
        if ($repositoryType === 'file') {
            $this->app->singleton(TaskRepositoryInterface::class, function ($app) {
                $storagePath = config('repository.storage.file');
                return new FileTaskRepository($storagePath);
            });
        } else {
            $this->app->singleton(TaskRepositoryInterface::class, function ($app) {
                return new MySqlTaskRepository();
            });
        }
    }

    public function boot(): void
    {
    }
}
