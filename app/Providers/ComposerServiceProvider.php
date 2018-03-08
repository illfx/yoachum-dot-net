<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        View::composer(
//            'partials.nav', 'App\Http\ViewComposers\NavComposer'
//        );


        view()->composer('bootstrap-4.header', 'App\Http\Composers\HeaderComposer');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
