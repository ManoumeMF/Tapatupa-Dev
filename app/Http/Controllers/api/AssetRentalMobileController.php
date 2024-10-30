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
}