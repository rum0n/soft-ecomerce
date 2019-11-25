<?php

namespace App\Providers;

use App\Category;
use App\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view::composer('frontEnd.inc.header',function($v){
            $categories = Category::where('publicationStatus',1)->get();
            $v->with('all_categories',$categories);
        });
//
//        view::composer('frontEnd.home.homeContent',function($p){
//            $products = Product::where('pbStatus',1)->inRandomOrder()->take(8)->get();
//            $p->with('products',$products);
//        });

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
