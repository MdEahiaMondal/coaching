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
           $user = auth()->user();
           $header = HeaderFooter::first();
           $view->with([
               'user'=>$user,
               'header'=>$header,
           ]);
       });

        View::composer('backend.parcials.footer', function ($view){
            $footer = HeaderFooter::first();
            $view->with('footer', $footer);
        });

    }
}
