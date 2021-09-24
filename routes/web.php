<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendaftaranPasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\JenisPemeriksaanController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\ObatController;


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

//Route::get('/', function () {
    //return view('welcome');
//});

Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
 
Route::group(['middleware' => 'auth'], function () {
 
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('home/get_data', [HomeController::class, 'get_data']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('admin')->group(function () {
        Route::get('pendaftaranpasien', [PendaftaranPasienController::class, 'index']); 
        Route::get('pendaftaranpasien/get_data', [PendaftaranPasienController::class, 'get_data']);
        Route::get('master/data-dokter', [DokterController::class, 'index']);
        Route::get('master/data-dokter/get_data', [DokterController::class, 'get_data']);
        Route::get('master/data-unit', [UnitController::class, 'index']);
        Route::get('master/data-unit/get_data', [UnitController::class, 'get_data']);
        Route::get('master/data-jenis-pemeriksaan', [JenisPemeriksaanController::class, 'index']);
        Route::get('master/data-jenis-pemeriksaan/get_data', [JenisPemeriksaanController::class, 'get_data']);
        Route::get('master/data-pemeriksaan', [PemeriksaanController::class, 'index']);
        Route::get('master/data-pemeriksaan/get_data', [PemeriksaanController::class, 'get_data']);
        Route::get('master/data-diagnosa', [DiagnosaController::class, 'index']);
        Route::get('master/data-diagnosa/get_data', [DiagnosaController::class, 'get_data']);
        Route::get('master/data-obat', [ObatController::class, 'index']);
        Route::get('master/data-obat/get_data', [ObatController::class, 'get_data']);
    });
    Route::middleware(['admin_registrasi'])->group(function () {
        
    });
    Route::middleware(['admin_bagian_poli'])->group(function () {

    });
    Route::middleware(['admin_unit_penunjang'])->group(function () {

    });
    Route::middleware(['admin_farmasi_obat'])->group(function () {

    });
    Route::middleware(['admin_pembayaran'])->group(function () {

    });
    Route::middleware(['kepala_puskesmas'])->group(function () {

    });
 
});
