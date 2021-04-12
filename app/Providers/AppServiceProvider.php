<?php

namespace App\Providers;

use App\Models\Admin\Region;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer(['auth.register'], function($view) {

            $regions = Region::getAllRegions();
//dd($regions);
            $view->with('regions', $regions);
        });
    }
}
