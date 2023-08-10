<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Query\Builder;


// use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // Paginator::defaultView('katemiz');
        // Paginator::defaultSimpleView('simple-katemiz');

        Builder::macro('search', function ($field,$string) {

            return $string ? $this->where($field,'like','%'.$string.'%'): $this;

        });


    }
}
