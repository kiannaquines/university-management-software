<?php

namespace App\Infrastructure\Providers;

use App\Domains\College\Interfaces\ICollegeRepository;
use App\Domains\Core\Interface\IRepositoryBase;
use App\Domains\Student\Interfaces\IStudentRepository;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

use Dedoc\Scramble\Scramble;
use Dedoc\Scramble\Support\Generator\OpenApi;
use Dedoc\Scramble\Support\Generator\SecurityScheme;


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
        $this->app->bind(IRepositoryBase::class, IRepositoryBase::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Vite::prefetch(concurrency: 3);
        Scramble::configure()
            ->withDocumentTransformers(function (OpenApi $openApi) {
                $openApi->secure(
                    SecurityScheme::http('bearer', 'JWT')
                );
            });

    }
}
