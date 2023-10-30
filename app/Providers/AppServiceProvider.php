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
        //
        // env('DB_DATABASE', 'default_value_if_not_found');
        // admin
        // Admin123]


        view()->composer('*', function ($view) {
            $view->with('servername', env('DB_HOST'));
            $view->with('database', env('DB_DATABASE'));
            $view->with('username', env('DB_USERNAME'));
            $view->with('password',  env('DB_PASSWORD'));
            $view->with('prefix',  env('PREFIX'));
        });

 
        //        view()->composer('*', function ($view) {
        //     $view->with('servername', "127.0.0.1");
        //     $view->with('database', "u615610596_durable_articl");
        //     $view->with('username', "u615610596_admin");
        //     $view->with('password',  "jIVPsF*9");
        //     $view->with('prefix',  "kp_");
        // });
    }
} 
