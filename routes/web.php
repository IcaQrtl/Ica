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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin
Route::get('/dataakun', [App\Http\Controllers\dataakunController::class, 'index'])->name('dataakun')->middleware('is_admin');
Route::post('/dataakun', [App\Http\Controllers\dataakunController::class, 'store'])->name('create.dataakun')->middleware('is_admin');
Route::get('/dataakun/edit/{id}', [App\Http\Controllers\dataakunController::class, 'edit'])->name('edit.dataakun')->middleware('is_admin');
Route::post('/dataakun/update', [App\Http\Controllers\dataakunController::class, 'update'])->name('update.dataakun')->middleware('is_admin');
Route::delete('/dataakun/delete/{id}', [App\Http\Controllers\dataakunController::class, 'delete'])->name('delete.dataakun')->middleware('is_admin');

Route::get('/datasiswa', [App\Http\Controllers\datasiswaController::class, 'index'])->name('datasiswa')->middleware('is_admin');
Route::post('/datasiswa', [App\Http\Controllers\datasiswaController::class, 'store'])->name('create.store')->middleware('is_admin');
Route::get('/datasiswa/edit/{id}', [App\Http\Controllers\datasiswaController::class, 'edit'])->name('edit.datasiswa')->middleware('is_admin');
Route::post('/datasiswa/update', [App\Http\Controllers\datasiswaController::class, 'update'])->name('update.datasiswa')->middleware('is_admin');
Route::delete('/datasiswa/delete/{id}', [App\Http\Controllers\datasiswaController::class, 'delete'])->name('delete.datasiswa')->middleware('is_admin');

Route::get('/dataguru', [App\Http\Controllers\dataguruController::class, 'index'])->name('dataguru')->middleware('is_admin');
Route::post('/dataguru', [App\Http\Controllers\dataguruController::class, 'store'])->name('create.dataguru')->middleware('is_admin');
Route::get('/dataguru/edit/{id}', [App\Http\Controllers\dataguruController::class, 'edit'])->name('edit.dataguru')->middleware('is_admin');
Route::post('/dataguru/update', [App\Http\Controllers\dataguruController::class, 'update'])->name('update.dataguru')->middleware('is_admin');
Route::delete('/dataguru/delete/{id}', [App\Http\Controllers\dataguruController::class, 'delete'])->name('delete.dataguru')->middleware('is_admin');

Route::get('/datakelas', [App\Http\Controllers\datakelasController::class, 'index'])->name('datakelas')->middleware('is_admin');
Route::post('/datakelas', [App\Http\Controllers\datakelasController::class, 'store'])->name('create.datakelas')->middleware('is_admin');
Route::get('/datakelas/edit/{id}', [App\Http\Controllers\datakelasController::class, 'edit'])->name('edit.datakelas')->middleware('is_admin');
Route::post('/datakelas/update', [App\Http\Controllers\datakelasController::class, 'update'])->name('update.datakelas')->middleware('is_admin');
Route::delete('/datakelas/delete/{id}', [App\Http\Controllers\datakelasController::class, 'delete'])->name('delete.datakelas')->middleware('is_admin');

Route::get('/matapelajaran', [App\Http\Controllers\matapelajaranController::class, 'index'])->name('matapelajaran')->middleware('is_admin');
Route::post('/matapelajaran', [App\Http\Controllers\matapelajaranController::class, 'store'])->name('create.matapelajaran')->middleware('is_admin');
Route::get('/matapelajaran/edit/{id}', [App\Http\Controllers\matapelajaranController::class, 'edit'])->name('edit.matapelajaran')->middleware('is_admin');
Route::post('/matapelajaran/update', [App\Http\Controllers\matapelajaranController::class, 'update'])->name('update.matapelajaran')->middleware('is_admin');
Route::delete('/matapelajaran/delete/{id}', [App\Http\Controllers\matapelajaranController::class, 'delete'])->name('delete.matapelajaran')->middleware('is_admin');

Route::get('/jadwal', [App\Http\Controllers\jadwalController::class, 'index'])->name('jadwal')->middleware('is_admin');
Route::post('/jadwal', [App\Http\Controllers\jadwalController::class, 'store'])->name('create.jadwal')->middleware('is_admin');

//Guru
Route::get('/datanilai', [App\Http\Controllers\nilaiController::class, 'index'])->name('datanilai')->middleware('is_guru');
Route::post('/datanilai', [App\Http\Controllers\nilaiController::class, 'store'])->name('create.datanilai')->middleware('is_guru');
Route::get('/datanilai/edit/{id}', [App\Http\Controllers\nilaiController::class, 'edit'])->name('edit.datanilai')->middleware('is_guru');
Route::post('/datanilai/update', [App\Http\Controllers\nilaiController::class, 'update'])->name('update.datanilai')->middleware('is_guru');
Route::delete('/datanilai/delete/{id}', [App\Http\Controllers\nilaiController::class, 'delete'])->name('delete.datanilai')->middleware('is_guru');

Route::get('/dataabsen', [App\Http\Controllers\absenController::class, 'index'])->name('dataabsen')->middleware('is_guru');
Route::post('/dataabsen', [App\Http\Controllers\absenController::class, 'update'])->name('update.dataabsen')->middleware('is_guru');
Route::get('/dataabsen/edit/{id}', [App\Http\Controllers\absenController::class, 'edit'])->name('edit.dataabsen')->middleware('is_guru');
Route::post('/dataabsen/update', [App\Http\Controllers\absenController::class, 'update'])->name('update.dataabsen')->middleware('is_guru');
Route::delete('/dataabsen/delete/{id}', [App\Http\Controllers\absenController::class, 'delete'])->name('delete.dataabsen')->middleware('is_guru');

Route::get('/dataabsen', [App\Http\Controllers\absenController::class, 'index'])->name('dataabsen')->middleware('is_guru');
Route::get('/dataabsen/edit/{id}', [App\Http\Controllers\absenController::class, 'edit'])->name('edit.dataabsen')->middleware('is_guru');
Route::post('/dataabsen/update', [App\Http\Controllers\absenController::class, 'update'])->name('update.dataabsen')->middleware('is_guru');
Route::delete('/dataabsen/delete/{id}', [App\Http\Controllers\absenController::class, 'delete'])->name('delete.dataabsen')->middleware('is_guru');

//Wali Kelas
Route::get('/walikelas', [App\Http\Controllers\walikelasController::class, 'index'])->name('walikelas')->middleware('is_guru');

//Siswa
Route::get('/datanilai/siswa', [App\Http\Controllers\nilaiController::class, 'nilai_siswa'])->name('datanilai.siswa')->middleware('is_siswa');
Route::get('/download/siswa', [App\Http\Controllers\jadwalController::class, 'jadwal_siswa'])->name('datanilai.siswa')->middleware('is_siswa');
Route::get('/download/{filename}', [App\Http\Controllers\jadwalController::class, 'download'])->name('file.download')->middleware('is_siswa');
