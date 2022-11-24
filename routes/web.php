<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\InherictController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ArtikelController::class, 'tampil']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//auth 
Route::middleware('auth')->group(function(){


    Route::resource('kategori', KategoriController::class);
    Route::get('deletkategori/{kategori}', [KategoriController::class, 'destroy'])->name('deletkategori');
    Route::resource('artikel', ArtikelController::class);
    Route::get('deletartikel/{artikel}', [ArtikelController::class, 'destroy'])->name('deletartikel');
});

//auth untuk admin
Route::middleware(['auth', 'admin'])->group(function(){
    Route::resource('user', UserController::class);
    Route::get('deletuser/{id}', [UserController::class, 'destroy'])->name('deletuser');
    Route::get('bmi', [InherictController::class, 'bmi'])->name('bmi');
});




