<?php

namespace App\Providers;

use App\Http\Services\AdminDataService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
           $view->with([
               'authUser'=> AdminDataService::authUser()
           ]);
        });
    }
}
