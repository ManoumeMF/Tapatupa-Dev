<?php

//use App\Http\Controllers\admin\BidangPendidikanController;

use App\Http\Controllers\admin\JenisKegiatanController;
use App\Http\Controllers\admin\JenisRetribusiController;
use App\Http\Controllers\admin\JenisStatusController;
use App\Http\Controllers\admin\PekerjaanController;
use App\Http\Controllers\admin\StatusController;
//use Illuminate\Routing\Route;
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
});


// Route untuk Jenis Status
Route::get("/jenis-status", [JenisStatusController::class, 'index'])->name('JenisStatus.index');
Route::get("/jenis-status/tambah", [JenisStatusController::class, 'create'])->name('JenisStatus.create');
Route::post("/jenis-status/simpan", [JenisStatusController::class, 'store'])->name('JenisStatus.store');
Route::get("/jenis-status/ubah/{id}", [JenisStatusController::class, 'edit'])->name('JenisStatus.edit');
Route::post("/jenis-status/update/{id}", [JenisStatusController::class, 'update'])->name('JenisStatus.update');
Route::get("/jenis-status/detail", [JenisStatusController::class, 'detail'])->name('JenisStatus.detail');
Route::delete("/jenis-status/hapus", [JenisStatusController::class, 'delete'])->name('JenisStatus.delete');

//Route untuk Status
Route::get("/status", [StatusController::class, 'index'])->name('Status.index');
Route::get("/status/tambah", [StatusController::class, 'create'])->name('Status.create');
Route::post("/status/simpan", [StatusController::class, 'store'])->name('Status.store');
Route::get("/status/ubah/{id}", [StatusController::class, 'edit'])->name('Status.edit');
Route::post("/status/update/{id}", [StatusController::class, 'update'])->name('Status.update');
Route::get("/status/detail", [StatusController::class, 'detail'])->name('Status.detail');
Route::delete("/status/hapus", [StatusController::class, 'delete'])->name('Status.delete');
Route::post("/status/simpan-jenis-status", [StatusController::class, 'storeStatusType'])->name('Status.storeStatusType');
//Route::get("/status/combo-jenis-status", [StatusController::class, 'getComboJenisStatus'])->name('Status.getComboJenisStatus');

// Route untuk Jenis Pekerjaan
Route::get("/pekerjaan", [PekerjaanController::class, 'index'])->name('Pekerjaan.index');
Route::get("/pekerjaan/tambah", [PekerjaanController::class, 'create'])->name('Pekerjaan.create');
Route::post("/pekerjaan/simpan", [PekerjaanController::class, 'store'])->name('Pekerjaan.store');
Route::get("/pekerjaan/ubah/{id}", [PekerjaanController::class, 'edit'])->name('Pekerjaan.edit');
Route::post("/pekerjaan/update/{id}", [PekerjaanController::class, 'update'])->name('Pekerjaan.update');
Route::get("/pekerjaan/detail", [PekerjaanController::class, 'detail'])->name('Pekerjaan.detail');
Route::delete("/pekerjaan/hapus", [PekerjaanController::class, 'delete'])->name('Pekerjaan.delete');

// Route untuk Jenis Kegiatan
Route::get("/jenis-kegiatan", [JenisKegiatanController::class, 'index'])->name('JenisKegiatan.index');
Route::get("/jenis-kegiatan/tambah", [JenisKegiatanController::class, 'create'])->name('JenisKegiatan.create');
Route::post("/jenis-kegiatan/simpan", [JenisKegiatanController::class, 'store'])->name('JenisKegiatan.store');
Route::get("/jenis-kegiatan/ubah/{id}", [JenisKegiatanController::class, 'edit'])->name('JenisKegiatan.edit');
Route::post("/jenis-kegiatan/update/{id}", [JenisKegiatanController::class, 'update'])->name('JenisKegiatan.update');
Route::get("/jenis-kegiatan/detail", [JenisKegiatanController::class, 'detail'])->name('JenisKegiatan.detail');
Route::delete("/jenis-kegiatan/hapus", [JenisKegiatanController::class, 'delete'])->name('JenisKegiatan.delete');

// Route untuk Jenis Retribusi
Route::get("/jenis-retribusi", [JenisRetribusiController::class, 'index'])->name('JenisRetribusi.index');
Route::get("/jenis-retribusi/tambah", [JenisRetribusiController::class, 'create'])->name('JenisRetribusi.create');
Route::post("/jenis-retribusi/simpan", [JenisRetribusiController::class, 'store'])->name('JenisRetribusi.store');
Route::get("/jenis-retribusi/ubah/{id}", [JenisRetribusiController::class, 'edit'])->name('JenisRetribusi.edit');
Route::post("/jenis-retribusi/update/{id}", [JenisRetribusiController::class, 'update'])->name('JenisRetribusi.update');
Route::get("/jenis-retribusi/detail", [JenisRetribusiController::class, 'detail'])->name('JenisRetribusi.detail');
Route::delete("/jenis-retribusi/hapus", [JenisRetribusiController::class, 'delete'])->name('JenisRetribusi.delete');
