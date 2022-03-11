<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    PelangganController,
    AdminController,
    KategoriController
};

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
    return view('auth/login');
})->name('login');

Route::get('/login  ', function () {
    return view('auth/login');
})->name('login2');

Route::get('/register', function () {
    return view('auth/register');
})->name('regis');

Route::post('/register', function () {
    return view('auth/register');
})->name('register');

Route::post('/login', [AuthController::class, "login"])->name('loginProses');

// Route::get('/', function () {
//     return view('isidashboard');
// })->name('dashboard');

// Route::get('/Kategori', function () {
//     return view('Kategori');
// })->name('Kategori');

// Kategori
// Route::get('/kategori', function () {
//     return view('kategori');
// })->name('kategori');

Route::get('/kategori', [KategoriController::class, "index"])->name('kategori');

Route::get('/addkategori', function () {
    return view('addkategori');
})->name('addkategori');

Route::post('/savekategori', [KategoriController::class, "store"])->name('savekategori');

Route::get('/editkategori/{id}', [KategoriController::class, "edit"])->name('editkategori');

Route::post('/updatekategori{id}', [KategoriController::class, "update"])->name('updatekategori');

Route::get('/deletekategori/{id}', [KategoriController::class, "destroy"])->name('deletekategori');

//  