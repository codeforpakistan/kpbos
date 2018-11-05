<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $menus=DB::Table('menus')->orderBy('id','ASC')->get();
        $publication_names=DB::Table('publications')->get();
        $allnews=DB::Table('news_and_events')->get();

        view()->share('menus', $menus);
        view()->share('publication_names', $publication_names);
        view()->share('allnews', $allnews);
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
