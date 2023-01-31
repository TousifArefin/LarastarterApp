<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RoleController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::view('/dashboard', 'backend.dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['as' => 'app.', 'prefix' => 'app', 'middleware' => ['auth']], function () {
    // Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('roles', RoleController::class);
});
