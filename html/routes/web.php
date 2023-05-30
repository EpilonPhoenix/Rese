<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
#ホーム
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/', [App\Http\Controllers\HomeController::class, 'post']);
#予約
Route::middleware('auth')->group(function () {
    Route::get('/reserve/thankyou',[App\Http\Controllers\ReserveController::class, 'thankyou']);
});
Route::middleware('auth')->group(function () {
    Route::post('/reserve/delete',[App\Http\Controllers\ReserveController::class, 'delete']);
});
Route::get('/reserve/{id}',[App\Http\Controllers\ReserveController::class, 'index']);
Route::post('/reserve/{id}',[App\Http\Controllers\ReserveController::class, 'edit']);
Route::post('/reserve',[App\Http\Controllers\ReserveController::class, 'post']);
#ログイン関連
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::get('/register', [App\Http\Controllers\RegistrationController::class, 'index'])->name('register');
#マイページ
Route::middleware('auth')->group(function () {
    Route::get('/mypage', [App\Http\Controllers\MypageController::class, 'index'])->name('mypage');
});
#お気に入り
Route::middleware('auth')->group(function () {
    Route::post('/favorite', [App\Http\Controllers\FavoriteController::class, 'post']);
});
#レビュー投稿
Route::middleware('auth')->group(function () {
    Route::get('/review/thankyou',[App\Http\Controllers\ReviewController::class, 'thankyou']);
});
Route::middleware('auth')->group(function () {
    Route::get('/review/{id}',[App\Http\Controllers\ReviewController::class, 'index']);
});
Route::middleware('auth')->group(function () {
    Route::post('/review',[App\Http\Controllers\ReviewController::class, 'post']);
});
#店舗管理
Route::middleware('auth')->group(function () {
    Route::post('/shopmanage/delete', [App\Http\Controllers\ShopmanageController::class, 'delete']);
});
Route::middleware('auth')->group(function () {
    Route::get('/shopmanage/{id}', [App\Http\Controllers\ShopmanageController::class, 'index']);
});
Route::middleware('auth')->group(function () {
    Route::get('/shopmanage', [App\Http\Controllers\ShopmanageController::class, 'create'])->name('createShop');
});
Route::middleware('auth')->group(function () {
    Route::post('/shopmanage', [App\Http\Controllers\ShopmanageController::class, 'post']);
});



Route::get('/dev/{id}', [App\Http\Controllers\ShopmanageController::class, 'index']);
