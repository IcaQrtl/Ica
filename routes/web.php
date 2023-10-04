<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\datasiswaController;
use App\Http\Controller\dataguruController;
use App\Http\Controller\datakelasController;
use App\Http\Controller\matapelajaranController;

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

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/datasiswa', [App\Http\Controllers\datasiswaController::class, 'index'])->name('datasiswa');
Route::post('/datasiswa', [App\Http\Controllers\datasiswaController::class, 'store'])->name('create.store');

Route::get('/dataguru', [App\Http\Controllers\dataguruController::class, 'index'])->name('dataguru');
Route::post('/dataguru', [App\Http\Controllers\dataguruController::class, 'dataguru'])->name('create.dataguru');

Route::get('/datakelas', [App\Http\Controllers\datakelasController::class, 'index'])->name('datakelas');
Route::post('/datakelas', [App\Http\Controllers\datakelasController::class, 'datakelas'])->name('create.datakelas');

Route::get('/matapelajaran', [App\Http\Controllers\matapelajaranController::class, 'index'])->name('matapelajaran');
Route::post('/matapelajaran', [App\Http\Controllers\matapelajaranController::class, 'matapelajaran'])->name('create.matapelajaran');