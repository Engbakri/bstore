<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;

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

        $cartItems = \Cart::getContent();
        $ads = Slider::all();
        $products = Product::all();
        $categories = Category::root()->get();

        View::share('cartItems',$cartItems);  
        View::share('categories',$categories);
        View::share('products',$products);
        View::share('ads',$ads);
        
    }
}
