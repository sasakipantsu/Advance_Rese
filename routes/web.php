<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ThanksController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\SearchController;



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


// 飲食店ページ
Route::get('/',  [ShopController::class, 'index']);
Route::get('/detail/{shop_id}',  [ShopController::class, 'detail']);
Route::post('/search',  [SearchController::class, 'search']);

// ログインページ
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::group(['middleware' => 'auth'], function () {

    // お気に入り
    Route::post('/{shop}/favorite', [FavoriteController::class, 'favorite'])->name('favorite');
    Route::post('/{shop}/favorite/delete', [FavoriteController::class, 'delete'])->name('favorite_delete');

    // 予約
    Route::post('/reservation',  [ReservationController::class, 'reservation'])->name('reservation');
    Route::post('/reservation/delete',  [ReservationController::class, 'delete'])->name('reservation_delete');

    // マイページ
    Route::get('/mypage',  [MypageController::class, 'mypage']);


// });


