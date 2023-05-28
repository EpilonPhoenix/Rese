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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/', [App\Http\Controllers\HomeController::class, 'post']);

Route::get('/reserve/thankyou',[App\Http\Controllers\ReserveController::class, 'thankyou']);
Route::post('/reserve/delete',[App\Http\Controllers\ReserveController::class, 'delete']);
Route::get('/reserve/{id}',[App\Http\Controllers\ReserveController::class, 'index']);
Route::post('/reserve/{id}',[App\Http\Controllers\ReserveController::class, 'edit']);
Route::post('/reserve',[App\Http\Controllers\ReserveController::class, 'post']);

Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::get('/register', [App\Http\Controllers\RegistrationController::class, 'index'])->name('register');

Route::get('/mypage', [App\Http\Controllers\MypageController::class, 'index'])->name('mypage');

Route::post('/favorite', [App\Http\Controllers\FavoriteController::class, 'post']);

Route::get('/dev', [App\Http\Controllers\MypageController::class, 'index']);

