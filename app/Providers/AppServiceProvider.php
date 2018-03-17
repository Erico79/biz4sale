<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer(['layouts.partials.back.sidebar', 'layouts.partials.back.nav'], function ($view) {
            $menu = config('menu.admin');

            $view->with('user', auth()->user())
                ->with('menu', $menu)
                ->with('current_route', Route::current());

        });
    }
}
