<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/program-studi', \App\Http\Controllers\ProgramStudiController::class);
Route::get('/sekolah', [
    App\Http\Controllers\SekolahController::class,
    'index'
]);

Route::get('/fetch-sekolah', [
    App\Http\Controllers\SekolahController::class,
    'fetchSekolah'
]);
