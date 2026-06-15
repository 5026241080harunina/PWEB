<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\PegawaiDBController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LatihanEASController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\TagihanController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('halo', function () {
	return "<h1> Halo, Selamat datang</h1> di tutorial laravel www.malasngoding.com";
});

Route::get('blog', function () {
	return view('blog');
});

Route::get('pert5', function () {
	return view('pertemuan5');
});

Route::get('dosen', [DosenController::class, 'index']);
Route::get('biodata', [DosenController::class, 'biodata']);

//route CRUD
Route::get('/pegawai', [PegawaiDBController::class, 'index']);
Route::get('/pegawai/tambah', [PegawaiDBController::class, 'tambah']);
Route::post('/pegawai/store', [PegawaiDBController::class, 'store']);
Route::get('/pegawai/edit/{id}', [PegawaiDBController::class, 'edit']);
Route::post('/pegawai/update', [PegawaiDBController::class, 'update']);
Route::get('/pegawai/hapus/{id}', [PegawaiDBController::class, 'hapus']);
Route::get('/pegawai/cari', [PegawaiDBController::class, 'cari']);


//route CRUD siswa
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/{nrp}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/{nrp}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{nrp}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

//route CRUD latihan
Route::get('/latihan', [PegawaiDBController::class, 'index']);
Route::get('/latihan/tambah', [PegawaiDBController::class, 'tambah']);
Route::post('/latihan/store', [PegawaiDBController::class, 'store']);
Route::get('/latihan/edit/{id}', [PegawaiDBController::class, 'edit']);
Route::post('/latihan/update', [PegawaiDBController::class, 'update']);
Route::get('/latihan/hapus/{id}', [PegawaiDBController::class, 'hapus']);
Route::get('/latihan/cari', [PegawaiDBController::class, 'cari']);

//route praeas mobil
Route::get('/mobil', [ MobilController::class, 'index'])->name('mobil.index');
Route::get('/mobil/tambah', [ MobilController::class, 'create'])->name('mobil.create');
Route::post('/mobil/store', [ MobilController::class, 'store'])->name('mobil.store');
Route::get('/mobil/edit/{id}', [ MobilController::class, 'edit'])->name('mobil.edit');
Route::put('/mobil/update', [ MobilController::class, 'update'])->name('mobil.update');
Route::get('/mobil/hapus/{id}', [ MobilController::class, 'hapus'])->name('mobil.destroy');

//route EAS tagihan
Route::get('/eas', [ TagihanController::class, 'index'])->name('tagihan.index');
Route::get('/eas/tambah', [ TagihanController::class, 'create'])->name('tagihan.create');
Route::post('/eas/store', [ TagihanController::class, 'store'])->name('tagihan.store');
Route::get('/eas/edit/{id}', [ TagihanController::class, 'edit'])->name('tagihan.edit');
Route::put('/eas/update', [ TagihanController::class, 'update'])->name('tagihan.update');
Route::get('/eas/hapus/{id}', [ TagihanController::class, 'hapus'])->name('tagihan.destroy');
Route::get('/latihan/cari', [PegawaiDBController::class, 'cari']);
