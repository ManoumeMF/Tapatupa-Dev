<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class WajibRetribusiController extends Controller
{
    public function index()
    {
        $wajibRetribusi = DB::select('CALL viewAll_wajibRetribusi()');  

        return view('admin.Master.WajibRetribusi.index', compact('wajibRetribusi'));

        //return view('admin.PengaturanDanKonfigurasi.JenisStatus.index');
        
    }

    public function create()
    {
        $pekerjaan = DB::select('CALL cbo_pekerjaan()');
        $provinsi = DB::select('CALL cbo_province()');

        return view('admin.Master.WajibRetribusi.create', compact('pekerjaan','provinsi'));

        //return view('admin.PengaturanDanKonfigurasi.Status.create');
    }

    public function getCities($provinsiId)
{
    $cities = DB::table('cities')
                ->where('prov_id', $provinsiId)
                ->get(['city_id', 'city_name']);
    return response()->json($cities);
}

public function getDistricts($kabupatenId)
{
    $districts = DB::table('districts')
                   ->where('city_id', $kabupatenId)
                   ->get(['dis_id', 'dis_name']);
    return response()->json($districts);
}

public function getSubdistricts($kecamatanId)
{
    $subdistricts = DB::table('subdistricts')
                      ->where('dis_id', $kecamatanId)
                      ->get(['subdis_id', 'subdis_name']);
    return response()->json($subdistricts);
}

}