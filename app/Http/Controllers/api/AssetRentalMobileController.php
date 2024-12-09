<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AssetRentalMobileController extends Controller
{
    private  $stat = 1;

    private $parentIdPermohonan = 1;

    public function cboJenisPermohonan(){
        $jenisPermohonan = DB::select('CALL cbo_jenisPermohonanByParentId(' . $this->parentIdPermohonan . ')');

        if ($jenisPermohonan) {
            return response()->json([
                'status' => 200,
                'jenisPermohonan' => $jenisPermohonan
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Permohonan Sewa Tidak Ditemukan.'
            ]);
        }
    }

    public function cboWajibRetribusi(){
        $wajibRetribusi = DB::select('CALL cbo_wajibRetribusi()');

        if ($wajibRetribusi) {
            return response()->json([
                'status' => 200,
                'wajibRetribusi' => $wajibRetribusi
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Wajib Retribusi Tidak Ditemukan.'
            ]);
        }
    }
    public function cboObjekRetribusi(){
        $objekRetribusi = DB::select('CALL cbo_objekRetribusi()');

        if ($objekRetribusi) {
            return response()->json([
                'status' => 200,
                'objekRetribusi' => $objekRetribusi
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Objek Retribusi Tidak Ditemukan.'
            ]);
        }
    }

    public function cboPeruntukanSewa(){
        $peruntukanSewa = DB::select('CALL cbo_peruntukanSewa()');

        if ($peruntukanSewa) {
            return response()->json([
                'status' => 200,
                'peruntukanSewa' => $peruntukanSewa
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Peruntukan Sewa Tidak Ditemukan.'
            ]);
        }
    }

    public function cboPerioditas(){
        $jangkaWaktu = DB::select('CALL cbo_jenisJangkaWaktu()');

        if ($jangkaWaktu) {
            return response()->json([
                'status' => 200,
                'jangkaWaktu' => $jangkaWaktu
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Perioditas Sewa Tidak Ditemukan.'
            ]);
        }
    }

    public function cboSatuan(){
        $satuan = DB::select('CALL cbo_satuan(' . 1 . ')');

        if ($satuan) {
            return response()->json([
                'status' => 200,
                'satuan' => $satuan
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Satuan Tidak Ditemukan.'
            ]);
        }
    }


    public function permohonanIndex($id)
    {
        $permohonanSewa = DB::select('CALL viewAll_permohonanSewaByIdWajibRetribusi(' . $id . ')'); 

        if ($permohonanSewa) {
            return response()->json([
                'status' => 200,
                'permohonanSewa' => $permohonanSewa
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Permohonan Sewa Tidak Ditemukan.'
            ]);
        }
        
    }

    public function permohonanStore(Request $request)
    {
        //dd($request->all());

        $jenisDokumen = $request->input('jenisDokumen');
        $fileDokumen = $request->file('fileDokumen');
        $keteranganDokumen = $request->input('keteranganDokumen');

        $dokumenKelengkapan = [];

        for ($count = 0; $count < collect($jenisDokumen)->count(); $count++) {
            $uploadedFileDokumen = $fileDokumen[$count];
            $dokumenPermohonan = $count . "-" . $request->get('nomorPermohonan') . time() . "." . $uploadedFileDokumen->getClientOriginalExtension();
            $dokumenPermohonanPath = Storage::disk('biznet')->putFileAs("documents/permohonanSewa", $uploadedFileDokumen, $dokumenPermohonan);

            $dokumenKelengkapan[] = [
                'JenisDokumen' => $jenisDokumen[$count],
                'FileDokumen' => $dokumenPermohonanPath,
                'KeteranganDokumen' => $keteranganDokumen[$count],
            ];
        }

        $Permohonan = json_encode([
            'JenisPermohonan' => $request->get('jenisPermohonan'),
            'NoSuratPermohonan' => $request->get('nomorPermohonan'),
            'WajibRetribusi' => $request->get('wajibRetribusi'),
            'ObjekRetribusi' => $request->get('objekRetribusi'),
            'JenisJangkaWaktu' => $request->get('perioditas'),
            'PeruntukanSewa' => $request->get('peruntukanSewa'),
            'LamaSewa' => $request->get('lamaSewa'),
            'Satuan' => $request->get('satuan'),
            'Status' => $this->stat,
            'Catatan' => $request->get('catatan'),
            'DibuatOleh' => '1',
            'DokumenKelengkapan' => $dokumenKelengkapan
        ]);

        //dd($Permohonan);
    
            $response = DB::statement('CALL insert_permohonanSewa(:dataPermohonan)', ['dataPermohonan' => $Permohonan]);

            if ($response) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Permohonan Sewa Berhasil Disimpan!'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Permohonan Sewa Gagal Disimpan!'
                ]);
            }
    }

    public function objekRetribusi()
    {
        $objekRetribusi = DB::select('CALL viewAll_objekRetribusi()');

        if ($objekRetribusi) {
            return response()->json([
                'status' => 200,
                'objekRetribusi' => $objekRetribusi
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Objek Retribusi Tidak Ditemukan.'
            ]);
        }

    }

    public function objekRetribusiDetail($id)
    {
        $objekRetribusiData = DB::select('CALL view_objekRetribusiById(' . $id . ')');

        $fotoObjek = DB::select('CALL view_photoObjekRetribusiById(' . $id . ')');

        if ($objekRetribusiData) {
            $objekRetribusi = $objekRetribusiData[0];

            return response()->json([
                'status' => 200,
                'objekRetribusi' => $objekRetribusi,
                'fotoObjek' => $fotoObjek
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Objek Retribusi Tidak Ditemukan.'
            ]);
        }
    }

    public function tarifObjekRetribusi()
    {
        $tarifRetribusi = DB::select('CALL viewAll_tarifObjekRetribusi()');

        if ($tarifRetribusi) {
            return response()->json([
                'status' => 200,
                'tarifRetribusi' => $tarifRetribusi
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Tarif Objek Retribusi Tidak Ditemukan.'
            ]);
        }

    }

    public function detailTarifObjekRetribusi($id)
    {
        $objekData = DB::select('CALL view_TarifObjekRetribusiById(' . $id . ')');
        
        //dd($objekData);
        if ($objekData) {
            $tarifObjekRetribusi = $objekData[0];

            return response()->json([
                'status' => 200,
                'tarifObjekRetribusi' => $tarifObjekRetribusi
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Tarif Objek Retribusi Tidak Ditemukan.'
            ]);
        }

    }

    public function perjanjianSewa($id)
    {
        $perjanjianSewa = DB::select('CALL viewAll_perjanjianSewaByIdWajibRetribusi(' . $id . ')'); 

        if ($perjanjianSewa) {
            return response()->json([
                'status' => 200,
                'perjanjianSewa' => $perjanjianSewa
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Perjanjian Sewa Tidak Ditemukan.'
            ]);
        }

    }

    public function perjanjianSewaDetail($id)
    {
        $perjanjianData = DB::select('CALL view_perjanjianSewaById('  . $id . ')');

        if ($perjanjianData) {
            $perjanjianSewa = $perjanjianData[0];

            return response()->json([
                'status' => 200,
                'perjanjianSewa' => $perjanjianSewa
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Perjanjian Sewa Tidak Ditemukan.'
            ]);
        }

    }

    public function tagihanSewa($id)
    {
        $tagihanSewa = DB::select('CALL view_tagihanByIdWajibRetribusi(' . $id . ')'); 

        if ($tagihanSewa) {
            return response()->json([
                'status' => 200,
                'tagihanSewa' => $tagihanSewa
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Tagihan Sewa Tidak Ditemukan.'
            ]);
        }

    }

    public function detailTagihanSewa($id)
    {
        $headTagihanDetailData = DB::select('CALL view_headTagihanByIdPerjanjian(' . $id . ')');
        $tagihanDetail = DB::select('CALL view_tagihanByIdPerjanjian(' . $id . ')');

        //dd($tagihanDetail);
        $detailTagihan = [];

        for ($count = 0; $count < collect($tagihanDetail)->count(); $count++) {

            if ($tagihanDetail[$count]->idStatus == 9) {
                $detailTagihan[] = [
                    'IdTagihan' => $tagihanDetail[$count]->idTagihanSewa
                ];
            }

        }

        $dataTagihan = json_encode([
            'IdPerjanjian' => $id,
            'DetailTagihan' => $detailTagihan
        ]);

        if ($headTagihanDetailData) {
            DB::statement('CALL update_tagihan(:dataTagihan)', ['dataTagihan' => $dataTagihan]);


            $tagihanDetail = DB::select('CALL view_tagihanByIdPerjanjian(' . $id . ')');
            $headTagihanDetail = $headTagihanDetailData[0];

            return response()->json([
                'status' => 200,
                'headTagihanDetail' => $headTagihanDetail,
                'tagihanDetail' => $tagihanDetail,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Tagihan Sewa Tidak Ditemukan.'
            ]);
        }

    }

    public function checkout(Request $request)
    {
        $idDibuatOleh = $request->get('DibuatOleh');
        $stats = $request->get('Status');
        $idTagihan = $request->input('idTagihan');

        $detailTagihan = [];

        for ($count = 0; $count < collect($idTagihan)->count(); $count++) {
            //dd($fileFoto[$count]);

            $detailTagihan[] = 
                intval($idTagihan[$count])
            ;
        }
        
        $dataTagihan = json_encode([
            'IdPerjanjian' => $request->get('idPerjanjian'),
            'DibuatOleh' => $idDibuatOleh,
            'Status' => $stats,
            'DetailTagihan' => $detailTagihan
        ]);


        $checkout = DB::select('CALL view_checkoutTagihanByid(:dataTagihan)', ['dataTagihan' => $dataTagihan]);
        $idPembayaran = $checkout[0];


        $headPembayaranData = DB::select('CALL view_pembayaranSewaById(' . $idPembayaran->idPembayaranSewa . ')');

       
        if ($headPembayaranData) {

            $headPembayaran = $headPembayaranData[0];
            $detailPembayaran = DB::select('CALL view_detailPembayaranByIdPembayaran(' . $idPembayaran->idPembayaranSewa . ')');

            return response()->json([
                'status' => 200,
                'headPembayaran' => $headPembayaran,
                'detailPembayaran' => $detailPembayaran,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Tagihan Sewa Tidak Ditemukan.'
            ]);
        }
    }

    public function singleCheckout($idP, $idT)
    {
        //dd($request->get('idPerjanjian'));

        $idPerjanjian = $idP;

        $idTagihan = $idT;

            $detailTagihan[] = 
                intval($idTagihan)
            ;

        //dd($detailTagihan);

        $dataTagihan = json_encode([
            'IdPerjanjian' => $idP,
            'DetailTagihan' => $detailTagihan
        ]);

        //dd($dataTagihan);

        $headTagihanDetailData = DB::select('CALL view_headTagihanByIdPerjanjian(' . $idPerjanjian . ')');

        

        //dd($dataTagihan);

       
        if ($headTagihanDetailData) {

            $checkoutDetail = DB::select('CALL view_checkoutTagihanByid(:dataTagihan)', ['dataTagihan' => $dataTagihan]);
            $headTagihanDetail = $headTagihanDetailData[0];

            return response()->json([
                'status' => 200,
                'headTagihanDetail' => $headTagihanDetail,
                'checkoutDetail' => $checkoutDetail,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Tagihan Sewa Tidak Ditemukan.'
            ]);
        }
    }
}