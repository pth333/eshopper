<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchAjaxController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login',[AdminController::class],'loginAdmin');
// Route::post('/login',[AdminController::class],'postLoginAdmin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Coupon
Route::get('/', [CouponController::class, 'index'])->name('coupon.index');
Route::get('/create', [CouponController::class, 'create'])->name('coupon.create');
Route::post('/store', [CouponController::class, 'store'])->name('coupon.store');
Route::delete('/destroy/{id}',[CouponController::class, 'destroy'])->name('coupon.destroy');

// TÌm kiếm
Route::get('/search', [SearchAjaxController::class, 'searchAjax'])->name('searchAjax');


require __DIR__ . '/auth.php';
