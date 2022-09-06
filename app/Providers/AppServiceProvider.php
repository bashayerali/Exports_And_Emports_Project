<?php

namespace App\Providers;

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
        view()->composer('layouts.adminLayout', function ($view) {
            $view->with('departments', \App\Models\Department::all());
        });
        view()->composer('layouts.employeeLayout', function ($view) {
            $view->with('departments', \App\Models\Department::all());
        });

        
    }
}
