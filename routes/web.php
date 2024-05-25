<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RequestSampleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HiLowController;
use App\Http\Controllers\PhotoController;

Route::get('/hello-world', fn () => view('hello_world'));
Route::get('/hello', fn () => view('hello', [
    'name' => '山田',
    'course' => 'Laravel'
]));

Route::get('/', fn () => view('index'));

Route::get('/curriculum', fn () => view('curriculum'));

// 世界の時間
Route::get('/world-time', [UtilityController::class, 'worldtime']);

// おみくじ
Route::get('/omikuji', [GameController::class, 'omikuji']);

// モンティ・ホール問題
Route::get('/monty-hall', [GameController::class, 'montyHall']);

// フォーム
Route::get('/form', [RequestSampleController::class, 'form']);
Route::get('/query-strings', [RequestSampleController::class, 'queryStrings']);
Route::get('/users/{id}', [RequestSampleController::class, 'profile'])->name('profile');
Route::get('/products/{category}/{year}', [RequestSampleController::class, 'productsArcive']);
Route::get('/route-link', [RequestSampleController::class, 'routeLink']);

// ログイン
Route::get('/login', [RequestSampleController::class, 'loginForm']);
Route::post('/login', [RequestSampleController::class, 'login'])->name('login');

Route::resource('/events', EventController::class)->only(['create', 'store']);

// ハイローゲーム
Route::get('/hi-low', [HiLowController::class, 'index'])->name('hi-low');
Route::post('/hi-low', [HiLowController::class, 'result']);

// ファイルアップロード
Route::get('/photos/create', [PhotoController::class, 'create'])->name('photos.create');
Route::resource('/photos', PhotoController::class)->only(['index', 'store', 'show', 'destroy']);

// 画像ダウンロード
Route::get('/photos/{photo}/download', [PhotoController::class, 'download'])->name('photos.download');
