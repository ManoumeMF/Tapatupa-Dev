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

    public function detail(Request $request)
    {      
        $id = $request->idPegawai;

        $pegawaiData = DB::select('CALL view_pegawaiById('  . $id . ')');
        $pegawai = $pegawaiData[0];


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

    public function delete(Request $request)
    {
        $pegawaiData = DB::select('CALL view_pegawaiById(' . $request -> get('idPegawai') . ')');
        $pegawaiTemp = $pegawaiData[0];

            if ($pegawaiData) {
                $id = $request -> get('idPegawai');

                $response = DB::statement('CALL delete_pegawai(?)', [$id]);
                
                return response()->json([
                    'status' => 200,
                    'message'=> 'Data Pegawai Berhasil Dihapus!'
                ]);
            }else{
                return response()->json([
                    'status'=> 404,
                    'message' => 'Data Pegawai Tidak Ditemukan.'
                ]);
            }
    }

    public function edit($id)
    {      
        $jabatanBidang = DB::select('CALL cbo_jabatanBidang()');  
        $province = DB::select('CALL cbo_province()');
        $golonganPangkat = DB::select('CALL cbo_golonganPangkat()');

        $pegawaiData = DB::select('CALL view_pegawaiById(' . $id . ')');
        $pegawai = $pegawaiData[0];

        $kota =  DB::select('CALL cbo_cities('  . $pegawai->prov_id . ')');  
        $kecamatan =  DB::select('CALL cbo_districts('  . $pegawai->city_id . ')');
        $kelurahan =  DB::select('CALL cbo_subdistricts('  . $pegawai->dis_id . ')');  

        if ($pegawai) {
            return view('admin.Master.Pegawai.edit', compact('jabatanBidang', 'province', 'golonganPangkat', 'pegawai', 'kota', 'kecamatan', 'kelurahan'));
         } else {
             return redirect()->route('Pegawai.index')->with('error', 'Pegawai Tidak Ditemukan!');
         }

    }
}