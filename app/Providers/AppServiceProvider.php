<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

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
      /* View::composer('backend.parcials.header', function ($view){
           $avatar = auth()->user()->avatar;
           $view->with('avatar', $avatar);
       });*/
    }
}
