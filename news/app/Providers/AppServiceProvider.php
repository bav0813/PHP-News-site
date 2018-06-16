<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Colors;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $colors = Colors::find(1);

        View::share('colors', $colors);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
