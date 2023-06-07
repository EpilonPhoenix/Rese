<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Models\User;


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

Route::middleware('auth')->group(function () {
    Route::get('/booking/{shop_id}',[App\Http\Controllers\ReserveController::class, 'book']);
});
Route::middleware('auth')->group(function () {
    Route::post('/booking/{shop_id}',[App\Http\Controllers\ReserveController::class, 'book_post']);
});
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
#ユーザー権限の変更
Route::middleware('auth')->group(function () {
    Route::post('/user/roleup', [App\Http\Controllers\UserController::class, 'ToShopOwner']);
});
Route::middleware('auth')->group(function () {
    Route::post('/user/roledown', [App\Http\Controllers\UserController::class, 'ToUser']);
});
Route::middleware('auth')->group(function () {
    Route::post('/user/delete', [App\Http\Controllers\UserController::class, 'delete']);
});
#メール認証
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

#お知らせメール送信
Route::middleware('auth')->group(function () {
    Route::post('/mail/send', [App\Http\Controllers\MailController::class, 'send']);
});
Route::middleware('auth')->group(function () {
    Route::get('/mail/{id}', [App\Http\Controllers\MailController::class, 'index']);
});

Route::middleware('auth')->group(function () {
    Route::get('/checkin/{id}', [App\Http\Livewire\Attendance\Attendancesqrcd::class, 'render']);
});

#Casher
Route::middleware('auth')->group(function () {
    Route::get('/purchase/thankyou', [App\Http\Controllers\CasherController::class, 'post'])->name('paid');
});

Route::middleware('auth')->group(function () {
    Route::get('/purchase/{id}', [App\Http\Controllers\CasherController::class, 'index']);
});
Route::middleware('auth')->group(function () {
    Route::post('/purchase', [App\Http\Controllers\CasherController::class, 'post'])->name('purchase.post');
});



Route::get('/dev', [App\Http\Livewire\Attendance\Attendancesqrcd::class, 'render']);
