<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthenticationController;
use \App\Http\Controllers\RegistrationController;
use \App\Http\Controllers\DashboardController;
use \App\Http\Controllers\HistoryController;

Route::get('/', function () {
    return view('index');
});

Route::post('/',[RegistrationController::class,'indexPost'])->name('index');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/dashboard', DashboardController::class);
    Route::get('/setting', [AuthenticationController::class, 'setting'])->name('setting');
    Route::resource('/registrations', RegistrationController::class);
    Route::resource('/history', HistoryController::class);
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
    Route::post('/changePassword', [AuthenticationController::class, 'changePassword'])->name('changePassword');
});