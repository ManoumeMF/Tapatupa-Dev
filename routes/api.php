<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AssetRentalMobileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    
});

// Route API untuk Permohonan Sewa
Route::get("/permohonan-mobile/{id}", [AssetRentalMobileController::class, 'permohonanIndex'])->name('AssetRentalMobile.permohonanIndex');
Route::post("/permohonan-mobile/simpan", [AssetRentalMobileController::class, 'permohonanStore'])->name('AssetRentalMobile.permohonanStore');

// Route API untuk Objek Retribusi
Route::get("/objek-retribusi-mobile", [AssetRentalMobileController::class, 'objekRetribusi'])->name('AssetRentalMobile.objekRetribusi');
Route::get("/objek-retribusi-mobile/detail/{id}", [AssetRentalMobileController::class, 'objekRetribusiDetail'])->name('AssetRentalMobile.objekRetribusiDetail');

// Route API untuk Tarif Objek Retribusi
Route::get("/objek-retribusi-mobile/tarif", [AssetRentalMobileController::class, 'detailTarifObjekRetribusi'])->name('AssetRentalMobile.detailTarifObjekRetribusi');
Route::get("/objek-retribusi-mobile/detail-tarif/{id}", [AssetRentalMobileController::class, 'detailTarifObjekRetribusi'])->name('AssetRentalMobile.detailTarifObjekRetribusi');

// Route API untuk Perjanjian
Route::get("/perjanjian-mobile/{id}", [AssetRentalMobileController::class, 'perjanjianSewa'])->name('AssetRentalMobile.perjanjianSewa');
Route::get("/perjanjian-mobile/detail/{id}", [AssetRentalMobileController::class, 'perjanjianSewaDetail'])->name('AssetRentalMobile.perjanjianSewaDetail');
