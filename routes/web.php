<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ThanksController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\SearchController;
use App\Http\Livewire\FavoriteComponent;




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
Route::get('/search',  [SearchController::class, 'search']);
Route::post('/search',  [SearchController::class, 'search']);

require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth'], function () {

    // お気に入り
    Route::post('/{shop}/favorite', [FavoriteComponent::class, 'favorite'])->name('favorite');
    Route::post('/{shop}/favorite_delete', [FavoriteComponent::class, 'favorite_delete'])->name('favorite_delete');

    // 予約
    Route::get('/reservation',  [ReservationController::class, 'reservation'])->name('reservation');
    Route::post('/reservation',  [ReservationController::class, 'reservation'])->name('reservation');

    // マイページ
    Route::get('/mypage',  [MypageController::class, 'mypage']);
    Route::post('/reservation_delete',  [MypageController::class, 'reservation_delete'])->name('reservation_delete');
    Route::post('/{shop}/favorite/mypage_favorite_delete', [MypageController::class, 'mypage_favorite_delete'])->name('mypage_favorite_delete');


});


