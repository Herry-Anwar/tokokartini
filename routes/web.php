<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataThingController;
use App\Http\Controllers\NamaThingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\TambahSalesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/',function(){
    return redirect ('/sign-in');
});

Route::get('/sign-in',[AuthController::class,'getLogin'])->name('sign-in');
Route::post('/sign-in',[AuthController::class,'postLogin']);
Route::get('/daftar',[AuthController::class,'getRegister'])->name('daftar');
Route::post('/daftar',[AuthController::class,'postRegister']);
Route::get('/keluar',[AuthController::class,'logout'])->name('keluar');
Route::group(['middleware'=>'auth'],function(){
    Route::get('/home',[DashboardController::class,'index'])
        ->name('dashboard');
    Route::resource('/barang',NamaThingController::class);
    Route::resource('/data',DataThingController::class);
    Route::resource('/penjualan',PenjualanController::class);
    Route::resource('/pembelian',PembelianController::class);
    Route::resource('/users',UserController::class);
    Route::get('/cetaklaporan',[PembelianController::class,'cetakLaporan'])->name('cetaklaporan');
    Route::get('/cetakLaporanBarangMasuk/{tglawal}/{tglakhir}',[PembelianController::class,'cetakLaporanBarangMasuk'])->name('cetakLaporanBarangMasuk');
    Route::get('/cetaklaporanbarangkeluar',[PenjualanController::class,'cetakLaporan'])->name('LaporanBarangKeluar');
    Route::get('/cetakLaporanBarangKeluar/{tglawal}/{tglakhir}',[PenjualanController::class,'cetakLaporanBarangKeluar'])->name('cetakLaporanBarangKeluar');


});


Auth::routes(['verify'=>true]);

// Route::get('/', [HomeController::class,'index']);
