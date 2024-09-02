<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = DB::select('CALL viewAll_pegawai()');

        return view('admin.Master.Pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        $jabatanBidang = DB::select('CALL cbo_jabatanBidang()');  
        $provinsi = DB::select('CALL cbo_province()');

        return view('admin.Master.Pegawai.create', compact('jabatanBidang', 'provinsi'));

        //return view('admin.PengaturanDanKonfigurasi.Status.create');
    }

     // Mengambil data kota berdasarkan ID provinsi
     public function getCities($prov_id)
     {
         $cities = DB::select('CALL cbo_cities(?)', [$prov_id]);
         return response()->json(['cities' => $cities]);
     }
 
     // Mengambil data kecamatan berdasarkan ID kota
     public function getDistricts($city_id)
     {
         $districts = DB::select('CALL cbo_districts(?)', [$city_id]);
         return response()->json(['districts' => $districts]);
     }
 
     // Mengambil data kelurahan berdasarkan ID kecamatan
     public function getSubdistricts($dis_id)
     {
         $subdistricts = DB::select('CALL cbo_subdistricts(?)', [$dis_id]);
         return response()->json(['subdistricts' => $subdistricts]);
     }
}