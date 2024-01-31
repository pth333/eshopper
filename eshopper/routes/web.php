<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/homepage',[HomeController::class,'index'])->name('home');
Route::get('/login',[AdminUserController::class,'loginUsers'])->name('login');

Route::post('/login',[
    'as' => 'login.store',
    'uses' => 'App\Http\Controllers\AdminUserController@postLoginUsers'
]);

Route::get('category/{slug}/{id}',[
    'as' => 'category.product',
    'uses' => 'App\Http\Controllers\CategoryController@index'
]);

Route::get('/cart',[CartController::class,'index'])->name('cart');

Route::get('product/add-to-cart/{id}',[CartController::class,'AddToCart'])->name('addToCart');
Route::get('product/update-cart',[CartController::class,'updateCart'])->name('updateCart');
Route::get('product/delete-cart',[CartController::class,'deleteCart'])->name('deleteCart');
