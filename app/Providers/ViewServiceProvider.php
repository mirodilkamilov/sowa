<?php

namespace App\Providers;

use App\Http\ViewComposers\CompanyContactsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        View::composer('home.index', CompanyContactsComposer::class);
        View::composer('projects.index', CompanyContactsComposer::class);
        View::composer('about.index', CompanyContactsComposer::class);
    }
}
