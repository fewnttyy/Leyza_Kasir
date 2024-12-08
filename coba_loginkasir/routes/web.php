<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DashboardController;


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
    return view('auth/register');
});

// login dan register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// barang
Route::middleware(['auth'])->group(function () {
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('barang', BarangController::class)
        ->except(['show']); 
});


// penjualan
Route::middleware(['auth'])->group(function () {
    Route::get('/penjualan', [PenjualanController::class, 'create'])->name('penjualan.create');
    Route::post('/penjualan', [PenjualanController::class, 'store'])->name('penjualan.store');
});
// report penjualan
Route::middleware(['auth'])->group(function () {
    Route::get('/transaksi', [PenjualanController::class, 'index'])->name('transaksi.index');
});
Route::get('/transaksi/report', [PenjualanController::class, 'generateReport'])->name('transaksi.report');

