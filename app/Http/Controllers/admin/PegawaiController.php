<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
        $golonganPangkat = DB::select('CALL cbo_golonganPangkat()');

        return view('admin.Master.Pegawai.create', compact('jabatanBidang', 'province', 'golonganPangkat'));

        //return view('admin.PengaturanDanKonfigurasi.Status.create');
    }

    public function store(Request $request)
    {
        $uploadedFile = $request->file('photoPegawai');
        $photo = $request->get('namaPegawai') . " - " . time() . "." . $uploadedFile->getClientOriginalExtension();
        $photoPath = Storage::disk('public')->putFileAs("images/pegawai", $uploadedFile, $photo);

        $pegawai = json_encode([
            'NIP' => $request->get('nip'),
            'NamaPegawai' => $request->get('namaPegawai'),
            'GolonganPangkat'  => $request->get('golongan'),
            'IdJabatanBidang' => $request->get('jabatanBidang'),
            'SubdisId' => $request->get('kelurahan'),
            'Alamat'  => $request->get('alamat'),
            'NomorPonsel'  => $request->get('nomorPonsel'),
            'NomorWhatsapp' => $request->get('nomorWhatsapp'),
            'FileFoto'  => $photoPath
        ]);
    
            $response = DB::statement('CALL insert_pegawai(:dataPegawai)', ['dataPegawai' => $pegawai]);

            if ($response) {
                return redirect()->route('Pegawai.index')->with('success', 'Pegawai Berhasil Ditambahkan!');
            } else {
                return redirect()->route('Pegawai.create')->with('error', 'Pegawai Gagal Disimpan!');
            }
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

    public function detail(Request $request)
    {      
        $id = $request->idPegawai;

        $pegawaiData = DB::select('CALL view_pegawaiById('  . $id . ')');
        $pegawai = $pegawaiData[0];

        //dd($fieldEducation);

        if ($pegawai) {
            return response()->json([
                'status'=> 200,
                'pegawai' => $pegawai
            ]);
        }else{
            return response()->json([
                'status'=> 404,
                'message' => 'Data Pegawai Tidak Ditemukan.'
            ]);
        }
    }
}