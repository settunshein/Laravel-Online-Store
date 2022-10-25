<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController')->name('dashboard');

// User Module
Route::get('get-all-users', 'UserController@getUserList');
Route::resource('user', 'UserController')->only(['index', 'show', 'destroy']);

// Employee Module
Route::get('get-all-employees', 'EmployeeController@getEmployeeList');
Route::resource('employee', 'EmployeeController');

// Category Module
Route::get('get-all-categories', 'CategoryController@getCategoryList');
Route::resource('category', 'CategoryController');

// Product Module
Route::get('get-all-products', 'ProductController@getProductList');
Route::resource('product', 'ProductController');

// Role and Permission Module
Route::get('get-all-roles', 'RoleController@getRoleList');
Route::resource('role', 'RoleController');

// Order Module
Route::get('get-all-orders', 'OrderController@getOrderList');
Route::post('update-order-status', 'OrderController@updateOrderStatus');
Route::resource('order', 'OrderController');

// Profile Module
Route::controller('ProfileController')->group(function(){
    Route::get('profile',       'showProfilePage')->name('profile.index');
    Route::get('profile/edit',  'showEditProfilePage')->name('profile.edit');
    Route::post('profile/edit', 'submitEditProfilePage')->name('profile.update');
});

// Password Module
Route::controller('PasswordController')->group(function(){
    Route::get('password',  'showEditPasswordPage')->name('password.edit');
    Route::post('password', 'submitEditPasswordPage')->name('password.update');
});

// Whistlist Module
// Review & Rating Module
// Graph ( Monthly Sales Volume - Bar Chart / Best Selling Products - Pie Chart )