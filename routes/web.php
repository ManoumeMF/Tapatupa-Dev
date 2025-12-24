<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WajibRetribusiController;

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

Route::get('/home', function () {
    return view('home');
});

Route::get('login', 'App\Http\Controllers\auth\AuthController@index')->name('login');
Route::get('register', 'App\Http\Controllers\auth\AuthController@register')->name('register');
Route::post('proses_login', 'App\Http\Controllers\auth\AuthController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\auth\AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:User']], function () {
        Route::get("/dashboard", [WajibRetribusiController::class, 'dashboardUser'])->name('WajibRetribusi.dashboardUser');
        
        //Route untuk Objek Retribusi
        Route::get("/objek-retribusi", [WajibRetribusiController::class, 'objekRetribusi'])->name('WajibRetribusi.objekRetribusi');
        Route::get("/objek-retribusi/detail/{id}", [WajibRetribusiController::class, 'objekRetribusiDetail'])->name('WajibRetribusi.objekRetribusiDetail');
        Route::get("/objek-retribusi/tarif", [WajibRetribusiController::class, 'tarifObjekRetribusi'])->name('WajibRetribusi.tarifObjekRetribusi');
        Route::get("/objek-retribusi/detail-tarif", [WajibRetribusiController::class, 'detailTarif'])->name('WajibRetribusi.detailTarif');

        //Route untuk Permohonan Sewa
        Route::get("/permohonan-sewa", [WajibRetribusiController::class, 'permohonanSewa'])->name('WajibRetribusi.permohonanSewa');
        Route::get("/permohonan-sewa/tambah", [WajibRetribusiController::class, 'createPermohonanSewa'])->name('WajibRetribusi.createPermohonanSewa');
        Route::post("/permohonan-sewa/simpan", [WajibRetribusiController::class, 'storePermohonanSewa'])->name('WajibRetribusi.storePermohonanSewa');
        Route::get("/permohonan-sewa/detail/{id}", [WajibRetribusiController::class, 'detailPermohonanSewa'])->name('WajibRetribusi.detailPermohonanSewa');

    });
});