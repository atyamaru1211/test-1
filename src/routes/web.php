<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;


Route::get('/', [ContactController::class, 'index'])->name('contacts.index');
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);
//登録、ログイン、管理画面系
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AuthController::class, 'index']);
});
