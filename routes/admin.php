<?php

//use App\Http\Controllers\admin\BidangPendidikanController;

use App\Http\Controllers\admin\DokumenKelengkapanController;
use App\Http\Controllers\admin\JabatanBidangController;
use App\Http\Controllers\admin\JangkaWaktuSewaController;
use App\Http\Controllers\admin\JenisDokumenController;
use App\Http\Controllers\admin\JenisJangkaWaktuController;
use App\Http\Controllers\admin\JenisKegiatanController;
use App\Http\Controllers\admin\JenisPermohonanController;
use App\Http\Controllers\admin\JenisStatusController;
use App\Http\Controllers\admin\LokasiObjekRetribusiController;
use App\Http\Controllers\admin\PekerjaanController;
use App\Http\Controllers\admin\StatusController;
use App\Http\Controllers\admin\ObjekRetribusiController;
use App\Http\Controllers\admin\PegawaiController;
use App\Http\Controllers\admin\PeruntukanSewaController;
use App\Http\Controllers\admin\WajibRetribusiController;
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

// Route untuk Objek Retribusi
Route::get("/objek-retribusi", [ObjekRetribusiController::class, 'index'])->name('ObjekRetribusi.index');
Route::get("/objek-retribusi/tambah", [ObjekRetribusiController::class, 'create'])->name('ObjekRetribusi.create');
Route::post("/objek-retribusi/simpan", [ObjekRetribusiController::class, 'store'])->name('ObjekRetribusi.store');
Route::get("/objek-retribusi/ubah/{id}", [ObjekRetribusiController::class, 'edit'])->name('ObjekRetribusi.edit');
Route::post("/objek-retribusi/update/{id}", [ObjekRetribusiController::class, 'update'])->name('ObjekRetribusi.update');
Route::get("/objek-retribusi/detail", [ObjekRetribusiController::class, 'detail'])->name('ObjekRetribusi.detail');
Route::delete("/objek-retribusi/hapus", [ObjekRetribusiController::class, 'delete'])->name('ObjekRetribusi.delete');

// Route untuk Jenis Jangka Waktu
Route::get("/jenis-jangka-waktu", [JenisJangkaWaktuController::class, 'index'])->name('jenisJangkaWaktu.index');
Route::get("/jenis-jangka-waktu/tambah", [JenisJangkaWaktuController::class, 'create'])->name('JenisJangkaWaktu.create');
Route::post("/jenis-jangka-waktu/simpan", [JenisJangkaWaktuController::class, 'store'])->name('JenisJangkaWaktu.store');
Route::get("/jenis-jangka-waktu/ubah/{id}", [JenisJangkaWaktuController::class, 'edit'])->name('JenisJangkaWaktu.edit');
Route::post("/jenis-jangka-waktu/update/{id}", [JenisJangkaWaktuController::class, 'update'])->name('JenisJangkaWaktu.update');
Route::delete("/jenis-jangka-waktu/hapus", [JenisJangkaWaktuController::class, 'delete'])->name('JenisJangkaWaktu.delete');
Route::get("/jenis-jangka-waktu/detail", [JenisJangkaWaktuController::class, 'detail'])->name('JenisJangkaWaktu.detail');

// Route untuk Jangka Waktu Sewa
Route::get("/jangka-waktu-sewa", [JangkaWaktuSewaController::class, 'index'])->name('JangkaWaktuSewa.index');
Route::get("/jangka-waktu-sewa/tambah", [JangkaWaktuSewaController::class, 'create'])->name('JangkaWaktuSewa.create');
Route::post("/jangka-waktu-sewa/simpan", [JangkaWaktuSewaController::class, 'store'])->name('JangkaWaktuSewa.store');
Route::get("/jangka-waktu-sewa/ubah/{id}", [JangkaWaktuSewaController::class, 'edit'])->name('JangkaWaktuSewa.edit');
Route::post("/jangka-waktu-sewa/update/{id}", [JangkaWaktuSewaController::class, 'update'])->name('JangkaWaktuSewa.update');
Route::delete("/jangka-waktu-sewa/hapus", [JangkaWaktuSewaController::class, 'delete'])->name('JangkaWaktuSewa.delete');
Route::get("/jangka-waktu-sewa/detail", [JangkaWaktuSewaController::class, 'detail'])->name('JangkaWaktuSewa.detail');

// Route untuk Jenis Permohonan
Route::get("/jenis-permohonan", [JenisPermohonanController::class, 'index'])->name('JenisPermohonan.index');
Route::get("/jenis-permohonan/tambah", [JenisPermohonanController::class, 'create'])->name('JenisPermohonan.create');
Route::post("/jenis-permohonan/simpan", [JenisPermohonanController::class, 'store'])->name('JenisPermohonan.store');
Route::get("/jenis-permohonan/ubah/{id}", [JenisPermohonanController::class, 'edit'])->name('JenisPermohonan.edit');
Route::post("/jenis-permohonan/update/{id}", [JenisPermohonanController::class, 'update'])->name('JenisPermohonan.update');
Route::delete("/jenis-permohonan/hapus", [JenisPermohonanController::class, 'delete'])->name('JenisPermohonan.delete');
Route::get("/jenis-permohonan/detail", [JenisPermohonanController::class, 'detail'])->name('JenisPermohonan.detail');

// Route untuk Peruntukan Sewa
Route::get("/peruntukan-sewa", [PeruntukanSewaController::class, 'index'])->name('PeruntukanSewa.index');
Route::get("/peruntukan-sewa/tambah", [PeruntukanSewaController::class, 'create'])->name('PeruntukanSewa.create');
Route::post("/peruntukan-sewa/simpan", [PeruntukanSewaController::class, 'store'])->name('PeruntukanSewa.store');
Route::get("/peruntukan-sewa/ubah/{id}", [PeruntukanSewaController::class, 'edit'])->name('PeruntukanSewa.edit');
Route::post("/peruntukan-sewa/update/{id}", [PeruntukanSewaController::class, 'update'])->name('PeruntukanSewa.update');
Route::delete("/peruntukan-sewa/hapus", [PeruntukanSewaController::class, 'delete'])->name('PeruntukanSewa.delete');
Route::get("/peruntukan-sewa/detail", [PeruntukanSewaController::class, 'detail'])->name('PeruntukanSewa.detail');

// Route untuk Jenis Dokumen
Route::get("/jenis-dokumen", [JenisDokumenController::class, 'index'])->name('JenisDokumen.index');
Route::get("/jenis-dokumen/tambah", [JenisDokumenController::class, 'create'])->name('JenisDokumen.create');
Route::post("/jenis-dokumen/simpan", [JenisDokumenController::class, 'store'])->name('JenisDokumen.store');
Route::get("/jenis-dokumen/ubah/{id}", [JenisDokumenController::class, 'edit'])->name('JenisDokumen.edit');
Route::post("/jenis-dokumen/update/{id}", [JenisDokumenController::class, 'update'])->name('JenisDokumen.update');
Route::delete("/jenis-dokumen/hapus", [JenisDokumenController::class, 'delete'])->name('JenisDokumen.delete');
Route::get("/jenis-dokumen/detail", [JenisDokumenController::class, 'detail'])->name('JenisDokumen.detail');

// Route untuk Dokumen Kelengkapan
Route::get("/dokumen-kelengkapan", [DokumenKelengkapanController::class, 'index'])->name('DokumenKelengkapan.index');
Route::get("/dokumen-kelengkapan/tambah", [DokumenKelengkapanController::class, 'create'])->name('DokumenKelengkapan.create');
Route::post("/dokumen-kelengkapan/simpan", [DokumenKelengkapanController::class, 'store'])->name('DokumenKelengkapan.store');
Route::get("/dokumen-kelengkapan/ubah/{id}", [DokumenKelengkapanController::class, 'edit'])->name('DokumenKelengkapan.edit');
Route::post("/dokumen-kelengkapan/update/{id}", [DokumenKelengkapanController::class, 'update'])->name('DokumenKelengkapan.update');
Route::delete("/dokumen-kelengkapan/hapus", [DokumenKelengkapanController::class, 'delete'])->name('DokumenKelengkapan.delete');
Route::get("/dokumen-kelengkapan/detail", [DokumenKelengkapanController::class, 'detail'])->name('DokumenKelengkapan.detail');

// Route untuk Jabatan Bidang
Route::get("/jabatan-bidang", [JabatanBidangController::class, 'index'])->name('JabatanBidang.index');
Route::get("/jabatan-bidang/tambah", [JabatanBidangController::class, 'create'])->name('JabatanBidang.create');
Route::post("/jabatan-bidang/simpan", [JabatanBidangController::class, 'store'])->name('JabatanBidang.store');
Route::get("/jabatan-bidang/ubah/{id}", [JabatanBidangController::class, 'edit'])->name('JabatanBidang.edit');
Route::post("/jabatan-bidang/update/{id}", [JabatanBidangController::class, 'update'])->name('JabatanBidang.update');
Route::delete("/jabatan-bidang/hapus", [JabatanBidangController::class, 'delete'])->name('JabatanBidang.delete');
Route::get("/jabatan-bidang/detail", [JabatanBidangController::class, 'detail'])->name('JabatanBidang.detail');

// Route untuk Pegawai
Route::get("/pegawai", [PegawaiController::class, 'index'])->name('Pegawai.index');
Route::get("/pegawai/tambah", [PegawaiController::class, 'create'])->name('Pegawai.create');
Route::post("/pegawai/simpan", [PegawaiController::class, 'store'])->name('Pegawai.store');
Route::get("/pegawai/ubah/{id}", [PegawaiController::class, 'edit'])->name('Pegawai.edit');
Route::post("/pegawai/update/{id}", [PegawaiController::class, 'update'])->name('Pegawai.update');
Route::delete("/pegawai/hapus", [PegawaiController::class, 'delete'])->name('Pegawai.delete');
Route::get("/pegawai/detail", [PegawaiController::class, 'detail'])->name('Pegawai.detail');
