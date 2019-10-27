<?php

namespace App\Providers;

use App\HeaderFooter;
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
       View::composer('backend.parcials.header', function ($view){
           $avatar = auth()->user()->avatar;
           $view->with('avatar', $avatar);
       });

        View::composer('backend.parcials.header', function ($view){
            $header = HeaderFooter::find(1);
            $view->with('header', $header);
        });


        View::composer('backend.parcials.footer', function ($view){
            $footer = HeaderFooter::find(1);
            $view->with('footer', $footer);
        });



    }
}
