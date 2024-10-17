<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\AdminMiddleware;


Route::get('/', function () {

    return view('auth.login');
});


 
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
         Route::get('/products', [ProductController::class, 'index'])->name('products');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
         Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        //  Route::match(['get', 'put'], '/products/destroy', [ProductController::class, 'destroy'])->name('products.destroy');
         Route::match(['get', 'put', 'delete'], '/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');



Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
