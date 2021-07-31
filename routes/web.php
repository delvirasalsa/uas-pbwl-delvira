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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/album',App\Http\Controllers\albumController::class);
Route::resource('/artist',App\Http\Controllers\artistController::class);
Route::resource('/played',App\Http\Controllers\playedController::class);
Route::resource('/track',App\Http\Controllers\trackController::class);
