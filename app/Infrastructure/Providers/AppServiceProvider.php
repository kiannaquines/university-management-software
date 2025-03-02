<?php

namespace App\Infrastructure\Providers;

use App\Domains\Student\Interfaces\StudentRepositoryInterface;
use App\Domains\Student\Interfaces\StudentServiceInterface;
use App\Domains\Student\Repositories\StudentRepository;
use App\Domains\Student\Services\StudentService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StudentServiceInterface::class, StudentService::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
