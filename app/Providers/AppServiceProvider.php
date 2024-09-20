<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\CastCategory;
use App\Models\PlanCategory;
use Illuminate\Contracts\View\View;
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
        view()->composer('*', function ($view) {
            // $view->with('blogs', Blog::all());
            // $view->with('castProfile', CastCategory::all());
            $view->with('planList', PlanCategory::all());
        });
    }
}
