<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
use App\Cart;   
use Session;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */


    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('header',function($view){
            $loaisanpham = ProductType::all();

            // if(Session('cart')){
            //     $oldCart = Session::get('cart');
            //     $cart = new Cart($oldCart);
            // }
            $view->with('loaisanpham', $loaisanpham);

        });


        view()->composer('header',function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart' => Session::get('cart'),'product_cart' => $cart->items,'totalPrice' => $cart->totalPrice,'totalQty' => $cart->totalQty]);
            }
        });

        view()->composer('pages.checkout',function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart' => Session::get('cart'),'product_cart' => $cart->items,'totalPrice' => $cart->totalPrice,'totalQty' => $cart->totalQty]);
            }
        });


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
