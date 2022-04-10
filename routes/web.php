<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrasiPasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\JenisPemeriksaanController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\DataPasienController;
use App\Http\Controllers\TindakanPasienController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\GolonganObatController;
use App\Http\Controllers\SatuanObatController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequestCeklabController;

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
        Route::get('master/data-dokter', [DokterController::class, 'index']);
        Route::get('master/data-dokter/get_data', [DokterController::class, 'get_data']);
        Route::post('master/data-dokter/simpan', [DokterController::class, 'simpan']);
        Route::get('master/data-dokter/edit/{id}', [DokterController::class, 'edit']);
        Route::get('master/data-dokter/hapus/{id}', [DokterController::class, 'hapus']);
        Route::get('master/data-unit', [UnitController::class, 'index']);
        Route::get('master/data-unit/get_data', [UnitController::class, 'get_data']);
        Route::post('master/data-unit/simpan', [UnitController::class, 'simpan']);
        Route::get('master/data-unit/edit/{id}', [UnitController::class, 'edit']);
        Route::get('master/data-unit/hapus/{id}', [UnitController::class, 'hapus']);
        Route::get('master/data-jenis-pemeriksaan', [JenisPemeriksaanController::class, 'index']);
        Route::get('master/data-jenis-pemeriksaan/get_data', [JenisPemeriksaanController::class, 'get_data']);
        Route::post('master/data-jenis-pemeriksaan/simpan', [JenisPemeriksaanController::class, 'simpan']);
        Route::get('master/data-jenis-pemeriksaan/edit/{id}', [JenisPemeriksaanController::class, 'edit']);
        Route::get('master/data-jenis-pemeriksaan/hapus/{id}', [JenisPemeriksaanController::class, 'hapus']);
        Route::get('master/data-pemeriksaan', [PemeriksaanController::class, 'index']);
        Route::get('master/data-pemeriksaan/get_data', [PemeriksaanController::class, 'get_data']);
        Route::post('master/data-pemeriksaan/simpan', [PemeriksaanController::class, 'simpan']);
        Route::get('master/data-pemeriksaan/edit/{id}', [PemeriksaanController::class, 'edit']);
        Route::get('master/data-pemeriksaan/hapus/{id}', [PemeriksaanController::class, 'hapus']);
        Route::get('master/data-diagnosa', [DiagnosaController::class, 'index']);
        Route::get('master/data-diagnosa/get_data', [DiagnosaController::class, 'get_data']);
        Route::post('master/data-diagnosa/simpan', [DiagnosaController::class, 'simpan']);
        Route::get('master/data-diagnosa/edit/{id}', [DiagnosaController::class, 'edit']);
        Route::get('master/data-diagnosa/hapus/{id}', [DiagnosaController::class, 'hapus']);
        Route::get('master/golongan-obat', [GolonganObatController::class, 'index']);
        Route::get('master/golongan-obat/get_data', [GolonganObatController::class, 'get_data']);
        Route::post('master/golongan-obat/simpan', [GolonganObatController::class, 'simpan']);
        Route::get('master/golongan-obat/edit/{id}', [GolonganObatController::class, 'edit']);
        Route::get('master/golongan-obat/hapus{id}', [GolonganObatController::class, 'hapus']);
        Route::get('master/satuan-obat', [SatuanObatController::class, 'index']);
        Route::get('master/satuan-obat/get_data', [SatuanObatController::class, 'get_data']);
        Route::post('master/satuan-obat/simpan', [SatuanObatController::class, 'simpan']);
        Route::get('master/satuan-obat/edit/{id}', [SatuanObatController::class, 'edit']);
        Route::get('master/satuan-obat/hapus{id}', [SatuanObatController::class, 'hapus']);
        Route::get('master/data-obat', [ObatController::class, 'index']);
        Route::get('master/data-obat/get_data', [ObatController::class, 'get_data']);
        Route::post('master/data-obat/simpan', [ObatController::class, 'simpan']);
        Route::get('master/data-obat/edit/{id}', [ObatController::class, 'edit']);
        Route::get('master/data-obat/hapus/{id}', [ObatController::class, 'hapus']);
        Route::get('pasien/data-pasien', [DataPasienController::class, 'index']);
        Route::get('pasien/data-pasien/get_data', [DataPasienController::class, 'get_data']);
        Route::post('pasien/data-pasien/simpan', [DataPasienController::class, 'simpan']);
        Route::get('pasien/data-pasien/edit/{id}', [DataPasienController::class, 'edit']);
        Route::get('pasien/data-pasien/hapus/{id}', [DataPasienController::class, 'hapus']);
        Route::get('pasien/data-pasien/lihatriwayat/{id}', [DataPasienController::class, 'lihatriwayat']);
        Route::get('pasien/data-pasien/get_data_riwayat/{id}', [DataPasienController::class, 'get_data_riwayat']);
        Route::get('pasien/registrasi-pasien', [RegistrasiPasienController::class, 'index']);
        Route::get('pasien/registrasi-pasien/get_data', [RegistrasiPasienController::class, 'get_data']);
        Route::post('pasien/registrasi-pasien/simpan', [RegistrasiPasienController::class, 'simpan']);
        Route::get('pasien/registrasi-pasien/edit/{id}', [RegistrasiPasienController::class, 'edit']);
        Route::get('pasien/registrasi-pasien/get_norekammedis/{id}', [RegistrasiPasienController::class, 'get_norekammedis']);
        Route::get('pasien/registrasi-pasien/hapus/{id}', [RegistrasiPasienController::class, 'hapus']);
        Route::get('tindakan/tindakan-pasien', [TindakanPasienController::class, 'index']);
        Route::get('tindakan/tindakan-pasien/get_data', [TindakanPasienController::class, 'get_data']);
        Route::get('tindakan/tindakan-pasien/get_data_pasien/{id}', [TindakanPasienController::class, 'get_data_pasien']);
        Route::post('tindakan/tindakan-pasien/simpan', [TindakanPasienController::class, 'simpan']);
        Route::get('tindakan/tindakan-pasien/edit/{id}', [TindakanPasienController::class, 'edit']);
        Route::get('tindakan/tindakan-pasien/hapus/{id}', [TindakanPasienController::class, 'hapus']);
        Route::get('tindakan/tindakan-pasien/rujuk/{id}', [TindakanPasienController::class, 'rujuk']);
        Route::get('tindakan/tindakan-pasien/editrujuk/{id}', [TindakanPasienController::class, 'editrujuk']);
        Route::post('tindakan/tindakan-pasien/simpanrujuk', [TindakanPasienController::class, 'simpanrujuk']);
        Route::get('tindakan/tindakan-pasien/get_data_lab/{id}', [TindakanPasienController::class, 'get_data_lab']);
        Route::get('tindakan/tindakan-pasien/lab/{id}', [TindakanPasienController::class, 'lab']);
        Route::get('tindakan/tindakan-pasien/editlab/{id}', [TindakanPasienController::class, 'editlab']);
        Route::post('tindakan/tindakan-pasien/simpanlab', [TindakanPasienController::class, 'simpanlab']);
        Route::get('tindakan/medical-record', [MedicalRecordController::class, 'index']);
        Route::get('tindakan/medical-record/get_data', [MedicalRecordController::class, 'get_data']);
        Route::post('tindakan/medical-record/simpan', [MedicalRecordController::class, 'simpan']);
        Route::get('tindakan/medical-record/edit/{id}', [MedicalRecordController::class, 'edit']);
        Route::get('tindakan/medical-record/hapus/{id}', [MedicalRecordController::class, 'hapus']);
        Route::get('tindakan/medical-record/hapus/{id}', [MedicalRecordController::class, 'hapus']);
        Route::get('laporan/laporan', [LaporanController::class, 'index']);
        Route::get('master/data-user', [UserController::class, 'index']);
        Route::get('master/data-user/get_data', [UserController::class, 'get_data']);
        Route::post('master/data-user/simpan', [UserController::class, 'simpan']);
        Route::get('master/data-user/edit/{id}', [UserController::class, 'edit']);
        Route::get('master/data-user/hapus/{id}', [UserController::class, 'hapus']);
        Route::get('tindakan/request-ceklab', [RequestCeklabController::class, 'index']);
        Route::get('tindakan/request-ceklab/get_data', [RequestCeklabController::class, 'get_data']);
        Route::post('tindakan/request-ceklab/simpan', [RequestCeklabController::class, 'simpan']);
        Route::get('tindakan/request-ceklab/edit/{id}', [RequestCeklabController::class, 'edit']);
        Route::get('tindakan/request-ceklab/hapus/{id}', [RequestCeklabController::class, 'hapus']);
        Route::get('tindakan/request-ceklab/get_norekammedis/{id}', [RequestCeklabController::class, 'get_norekammedis']);

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
