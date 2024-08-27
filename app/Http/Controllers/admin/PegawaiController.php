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
        $province = DB::select('CALL cbo_province()');

        return view('admin.Master.Pegawai.create', compact('jabatanBidang', 'province'));

        //return view('admin.PengaturanDanKonfigurasi.Status.create');
    }

    public function getCities($prov_id)
    {
        $cities = DB::select('CALL getCities(?)', [$prov_id]);
        return response()->json(['cities' => $cities]);
    }

    // Mengambil kecamatan berdasarkan kota
    public function getDistricts($city_id)
    {
        $districts = DB::select('CALL getDistricts(?)', [$city_id]);
        return response()->json(['districts' => $districts]);
    }

    // Mengambil kelurahan berdasarkan kecamatan
    public function getSubdistricts($dis_id)
    {
        $subdistricts = DB::select('CALL getSubdistricts(?)', [$dis_id]);
        return response()->json(['subdistricts' => $subdistricts]);
    }
}