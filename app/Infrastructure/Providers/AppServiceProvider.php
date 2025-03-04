<?php

namespace App\Infrastructure\Providers;

use App\Domains\College\Interfaces\ICollegeRepository;
use App\Domains\Core\Repository\IRepositoryBase;
use App\Domains\Student\Interfaces\IStudentRepository;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IRepositoryBase::class, IRepositoryBase::class);
        $this->app->bind(ICollegeRepository::class, ICollegeRepository::class);
        $this->app->bind(IStudentRepository::class, IStudentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
