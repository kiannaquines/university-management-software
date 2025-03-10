<?php

namespace App\Infrastructure\Providers;

use App\Domains\College\Interfaces\ICollegeRepository;
use App\Domains\College\Repositories\CollegeRepository;
use App\Domains\Core\Interface\IRepositoryBase;
use App\Domains\Core\Repository\RepositoryBase;
use App\Domains\Student\Interfaces\IStudentRepository;

use App\Domains\Student\Repositories\StudentRepository;
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
        $this->app->scoped(IRepositoryBase::class, RepositoryBase::class);
        $this->app->scoped(ICollegeRepository::class, CollegeRepository::class);
        $this->app->scoped(IStudentRepository::class, StudentRepository::class);
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
