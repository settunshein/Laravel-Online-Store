<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\View\Composers\ProductComposer;
use Illuminate\Support\ServiceProvider;
use App\View\Composers\CategoryComposer;

class ViewServiceProvider extends ServiceProvider
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
        $route = Route::current();

        // Share All Categories
        View::composer('layouts.frontend.partials.category-list', function($view){
            $view->with('categories', Category::withCount('products')->get());
        });

        // Share All Products
        View::composer('layouts.frontend.partials.product-list', function($view){
            $view->with('products', Product::latest()->get());
        });

        // Share Single Product
        View::composer('layouts.frontend.partials.product-details', function($view){
            $route = Route::current();
            $view->with('product', Product::where('slug', $route->parameter('slug'))->first());
        });
    }
}
