<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



// Auth Routes
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');


// Admin Auth Routes
Route::controller('Auth\AdminLoginController')->group(function(){
    Route::group(['as'=>'admin.', 'prefix'=>'admin'], function(){
        Route::get('/login',  'showLoginForm');
        Route::post('/login', 'login')->name('login');
        Route::get('/logout', 'logout')->name('logout');
    });
});


Route::view('/', 'frontend.index')->name('home');
Route::view('/product/{slug}', 'frontend.details')->name('product.details');
Route::namespace('Frontend')->group(function(){
    // Cart Module
    Route::get('cart/delete/{cart?}', 'CartController@delete')->name('cart.delete');
    Route::resource('cart', 'CartController')->only(['index', 'store', 'update']);

    // Checkout
    Route::controller('CheckoutController')->group(function(){
        Route::get('/checkout',  'showCheckoutView')->name('checkout.show');
        Route::post('/checkout', 'submitCheckoutView')->name('checkout.submit');
    });
});


/* Testing Routes */
Route::get('pluck-admin-role', function(){
    dd( App\Models\Role::where('name', 'admin')->pluck('name')->first() );
});

Route::get('clear-cart', function(){
    session()->forget('cart');
});

Route::get('get-rand', function(){
    dd(\App\Traits\GenerateOrderCode::generateRandomCode());
});