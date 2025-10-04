<?php

namespace App\Providers;

use App\Http\View\CategoryComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('navbar',CategoryComposer::class);
        View::composer('products.products',CategoryComposer::class);
    }
}
