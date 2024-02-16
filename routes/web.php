<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MengajarController;
use App\Http\Controllers\NilaiContoller;
use App\Http\Controllers\SiswaController;
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
})->name('welcome');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('/home', [IndexController::class, 'home'])->middleware('CheckUserRole')->name('home');
Route::resource('/mapel', MapelController::class)->middleware('CheckUserRole');
Route::resource('/kelas', KelasController::class)->middleware('CheckUserRole');
Route::resource('/guru', GuruController::class)->middleware('CheckUserRole');
Route::resource('/siswa', SiswaController::class)->middleware('CheckUserRole');
Route::resource('/mengajar', MengajarController::class)->middleware('CheckUserRole');

Route::get('/nilai/{mengajar}', [NilaiContoller::class, 'nilai_kelas_index'])->middleware('CheckUserRole')->name('nilai.kelas.index');
Route::get('/nilai/{mengajar}/create', [NilaiContoller::class, 'nilai_kelas_create'])->middleware('CheckUserRole')->name('nilai.kelas.create');
Route::get('/nilai/{mengajar}/{siswa}/edit', [NilaiContoller::class, 'nilai_kelas_edit'])->middleware('CheckUserRole')->name('nilai.kelas.edit');
Route::put('/nilai/{mengajar}', [NilaiContoller::class, 'nilai_kelas_update'])->middleware('CheckUserRole')->name('nilai.kelas.update');
Route::post('/nilai/{mengajar}', [NilaiContoller::class, 'nilai_kelas_store'])->middleware('CheckUserRole')->name('nilai.kelas.store');
Route::delete('/nilai/{mengajar}/{siswa}/', [NilaiContoller::class, 'nilai_kelas_destroy'])->middleware('CheckUserRole')->name('nilai.kelas.destroy');

Route::resource('/nilai', NilaiContoller::class)->middleware('CheckUserRole');
