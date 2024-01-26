<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\UmrohController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\PendaftarController;

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



Route::get('/', [FrontController::class, 'beranda'])->name('home.beranda');
Route::get('/daftar-paket', [FrontController::class, 'paket'])->name('home.paket');
Route::get('/pendaftaran', [FrontController::class, 'pendaftaran'])->name('home.pendaftran');
Route::post('/pendaftaran', [FrontController::class, 'store'])->name('home.store');
Route::get('/image', [FrontController::class, 'galeri'])->name('home.galeri');
Route::get('/contact', [FrontController::class, 'contact'])->name('home.contact');
Route::get('/cekdata', [FrontController::class, 'index'])->name('home.index');




Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [UmrohController::class, 'math'])->name('umroh.dashboard');
    Route::get('/umroh', [UmrohController::class, 'index'])->name('umroh.index');
    Route::get('/umroh/create', [UmrohController::class, 'create'])->name('umroh.create');
    Route::post('/umroh/store', [UmrohController::class, 'store'])->name('umroh.store');
    Route::get('/umroh/cetak', [UmrohController::class, 'cetak'])->name('umroh.cetak');
    Route::get('/umroh/edit/{id}', [UmrohController::class, 'edit'])->name('umroh.edit');
    Route::put('/umroh/update/{id}', [UmrohController::class, 'update'])->name('umroh.update');
    Route::get('/umroh/view/{id}', [UmrohController::class, 'view'])->name('umroh.view');
    Route::delete('/umroh/delete/{id}', [UmrohController::class, 'delete'])->name('umroh.delete');


    // Paket
    Route::get('/paket', [PaketController::class, 'index'])->name('paket.index');
    Route::get('/paket/create', [PaketController::class, 'create'])->name('paket.create');
    Route::post('/paket/store', [PaketController::class, 'store'])->name('paket.store');
    Route::get('/paket/edit/{id}', [PaketController::class, 'edit'])->name('paket.edit');
    Route::put('/paket/update/{id}', [PaketController::class, 'update'])->name('paket.update');
    Route::delete('/paket/delete/{id}', [PaketController::class, 'delete'])->name('paket.delete');



    // Galeri
    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
    Route::post('/galeri/store', [GaleriController::class, 'store'])->name('galeri.store');
    Route::delete('/galeri/delete/{id}', [GaleriController::class, 'delete'])->name('galeri.delete');


    // User
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

    // Pendaftran
    Route::get('/pendaftar', [PendaftarController::class, 'index'])->name('pendaftar.index');
    Route::get('/pendaftar/cetak', [PendaftarController::class, 'cetak'])->name('pendaftar.cetak');
    Route::get('/pendaftar/view/{id}', [PendaftarController::class, 'view'])->name('pendaftar.view');
    Route::delete('/pendaftar/delete/{id}', [PendaftarController::class, 'delete'])->name('pendaftar.delete');
    
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
