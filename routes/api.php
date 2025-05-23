<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AssetRentalMobileController;
use App\Http\Controllers\api\OnlinePaymentController;
use App\Http\Controllers\api\AuthenticateController;

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

Route::post('/access-token-tapatupa', [AuthenticateController::class, 'login']);

// Route API untuk user
Route::post("/login-mobile", [AssetRentalMobileController::class, 'login'])->name('AssetRentalMobile.login');
Route::post("/register-mobile", [AssetRentalMobileController::class, 'register'])->name('AssetRentalMobile.register');

/*Route::middleware(['jwt.client'])->get('/secret-data', function () {
    return response()->json(['message' => 'Ini data rahasia!']);
});*/

Route::group(['middleware' => ['jwt.client', 'cek_login:Bank Sumut']], function () {
    // Route API untuk inquiry pajak
    Route::post("/inquiry-pajak", [OnlinePaymentController::class, 'inquiryPajak'])->name('OnlinePayment.inquiryPajak');
    Route::post("/payment-pajak", [OnlinePaymentController::class, 'paymentPajak'])->name('OnlinePayment.paymentPajak');

});

Route::group(['middleware' => ['jwt.client', 'cek_login:User']], function () {
    // Route API untuk Objek Retribusi
    Route::get("/objek-retribusi-mobile", [AssetRentalMobileController::class, 'objekRetribusi'])->name('AssetRentalMobile.objekRetribusi');
    Route::get("/objek-retribusi-mobile/detail/{id}", [AssetRentalMobileController::class, 'objekRetribusiDetail'])->name('AssetRentalMobile.objekRetribusiDetail');

    // Route API untuk Permohonan Sewa
    Route::get("/permohonan-mobile/{id}", [AssetRentalMobileController::class, 'permohonanIndex'])->name('AssetRentalMobile.permohonanIndex');
    Route::post("/permohonan-mobile/simpan", [AssetRentalMobileController::class, 'permohonanStore'])->name('AssetRentalMobile.permohonanStore');


    // Route API untuk Tarif Objek Retribusi
    Route::get("/objek-retribusi-mobile/tarif", [AssetRentalMobileController::class, 'tarifObjekRetribusi'])->name('AssetRentalMobile.tarifObjekRetribusi');
    Route::get("/objek-retribusi-mobile/detail-tarif/{id}", [AssetRentalMobileController::class, 'detailTarifObjekRetribusi'])->name('AssetRentalMobile.detailTarifObjekRetribusi');

    // Route API untuk Perjanjian
    Route::get("/perjanjian-mobile/{id}", [AssetRentalMobileController::class, 'perjanjianSewa'])->name('AssetRentalMobile.perjanjianSewa');
    Route::get("/perjanjian-mobile/detail/{id}", [AssetRentalMobileController::class, 'perjanjianSewaDetail'])->name('AssetRentalMobile.perjanjianSewaDetail');

    // Route API Untuk Tagihan
    Route::get("/tagihan-mobile/{id}", [AssetRentalMobileController::class, 'tagihanSewa'])->name('AssetRentalMobile.tagihanSewa');
    Route::get("/tagihan-mobile/detail/{id}", [AssetRentalMobileController::class, 'detailTagihanSewa'])->name('AssetRentalMobile.detailTagihanSewa');
    Route::post("/tagihan-mobile/checkout", [AssetRentalMobileController::class, 'checkout'])->name('AssetRentalMobile.checkout');
    Route::get("/tagihan-mobile/singleCheckout/{idP}/{idT}", [AssetRentalMobileController::class, 'singleCheckout'])->name('AssetRentalMobile.singleCheckout');

    // Route API Untuk Pembayaran
    Route::get("/pembayaran-mobile/{id}", [AssetRentalMobileController::class, 'pembayaranSewa'])->name('AssetRentalMobile.pembayaranSewa');
    Route::post("/pembayaran-mobile/upload-bukti", [AssetRentalMobileController::class, 'storeBukti'])->name('AssetRentalMobile.storeBukti');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

});

// Route API untuk semua combobox
Route::get("/combo-jenis-permohonan", [AssetRentalMobileController::class, 'cboJenisPermohonan'])->name('AssetRentalMobile.cboJenisPermohonan');
Route::get("/combo-wajib-retribusi", [AssetRentalMobileController::class, 'cboWajibRetribusi'])->name('AssetRentalMobile.cboWajibRetribusi');
Route::get("/combo-objek-retribusi", [AssetRentalMobileController::class, 'cboObjekRetribusi'])->name('AssetRentalMobile.cboObjekRetribusi');
Route::get("/combo-peruntukan-sewa", [AssetRentalMobileController::class, 'cboPeruntukanSewa'])->name('AssetRentalMobile.cboPeruntukanSewa');
Route::get("/combo-perioditas", [AssetRentalMobileController::class, 'cboPerioditas'])->name('AssetRentalMobile.cboPerioditas');
Route::get("/combo-satuan", [AssetRentalMobileController::class, 'cboSatuan'])->name('AssetRentalMobile.cboSatuan');
Route::get("/combo-dokumen-kelengkapan", [AssetRentalMobileController::class, 'cboDokumenKelengkapan'])->name('AssetRentalMobile.cboDokumenKelengkapan');


// Route API untuk inquiry pajak
//Route::post("/inquiry-pajak", [OnlinePaymentController::class, 'inquiryPajak'])->name('OnlinePayment.inquiryPajak');
//Route::post("/payment-pajak", [OnlinePaymentController::class, 'paymentPajak'])->name('OnlinePayment.paymentPajak');

//Route API untuk VA
Route::get("/get-access-token", [OnlinePaymentController::class, 'getAccessToken'])->name('OnlinePayment.getAccessToken');
Route::post("/get-service-signature", [OnlinePaymentController::class, 'getServiceSignature'])->name('OnlinePayment.getServiceSignature');
Route::post("/access-token", [OnlinePaymentController::class, 'accessToken'])->name('OnlinePayment.accessToken');
Route::post("/create-VA", [OnlinePaymentController::class, 'createVA'])->name('OnlinePayment.createVA');
Route::post("/update-VA", [OnlinePaymentController::class, 'updateVA'])->name('OnlinePayment.updateVA');
Route::post("/inquiry-VA", [OnlinePaymentController::class, 'inquiryVA'])->name('OnlinePayment.inquiryVA');
