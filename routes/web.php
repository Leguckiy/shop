<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin\ProductController as Product;
//use App\Http\Controllers\Admin\AdminController as Admin;

Route::group([
    'middleware' => 'auth',
    'namespace' => 'App\Http\Controllers\Admin',
    'prefix' => 'admin'
], function () {
    Route::get('/', [AdminController::class, 'dashbord']);

    Route::resource('product', 'ProductController');

    Route::resource('category', 'CategoryController');

    Route::resource('manufacturer', 'ManufacturerController');
});
//Route::resource('admin/product', 'App\Http\Controllers\Admin\ProductController');

require __DIR__ . '/auth.php';
//Route::get('admin/manufacturer', [App\Http\Controllers\Admin\ManufacturerController::class, 'index'])->name('admin.manufacturer.index');
