<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\CustomRegisteredUserController;


Route::get('/', [ContactController::class, 'index'])->name('contacts.index');
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);
//登録、ログイン、管理画面系
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    //削除
    Route::delete('/delete', [ContactController::class, 'destroy']);
    //ログアウト
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
});
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest')->name('login');
Route::get('/register', [RegisteredUserController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [CustomRegisteredUserController::class, 'store'])->middleware('guest');
//検索
Route::get('/search', [AdminController::class, 'search']);
//リセット
Route::get('/reset', [AdminController::class, 'reset']);
//エクスポート
Route::post('/export', [AdminController::class, 'export'])->middleware('auth')->name('admin.export');
