<?php

namespace App\Infrastructure\Providers;

use App\Domains\College\Interfaces\CollegeRepositoryInterface;
use App\Domains\College\Repositories\CollegeRepository;
use App\Domains\Student\Interfaces\StudentRepositoryInterface;
use App\Domains\Student\Repositories\StudentRepository;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CollegeRepositoryInterface::class, CollegeRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
