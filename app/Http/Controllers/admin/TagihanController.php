<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TagihanController extends Controller
{
    private  $stat = 6;

    public function index()
    {
        $tagihanSewa = DB::select('CALL view_tagihanAll()'); 

        return view('admin.TagihanDanPembayaran.Tagihan.index', compact('tagihanSewa'));
        
    }

    public function detail($id)
    {      
        $headTagihanDetailData = DB::select('CALL view_headTagihanByIdPerjanjian('  . $id . ')');
        $tagihanDetail = DB::select('CALL view_tagihanByIdPerjanjian('  . $id . ')');

        //dd($fieldEducation);

        if ($headTagihanDetailData) {
            
            $headTagihanDetail = $headTagihanDetailData[0];
    
            return view('admin.TagihanDanPembayaran.Tagihan.detail', compact('tagihanDetail', 'headTagihanDetail'));
        } else {
            return redirect()->route('Tagihan.detail', $id)->with('error', 'Data Tagihan Tidak Ditemukan!');
        }
    }

    public function checkout(Request $request)
    {      
        //dd($request->get('idPerjanjian'));

        $idPerjanjian = $request->get('idPerjanjian');

        $idTagihan = $request->input('idTagihan');

        $detailTagihan = [];

        for ($count = 0; $count < collect($idTagihan)->count(); $count++) {
            //dd($fileFoto[$count]);
            
            $detailTagihan[] = [
                'IdTagihan' => $idTagihan[$count]
            ];
        }

        $dataTagihan = json_encode([
            'IdPerjanjian' => $request->get('idPerjanjian'),
            'DetailTagihan' => $detailTagihan
        ]);



        $response = DB::statement('CALL update_tagihan(:dataTagihan)', ['dataTagihan' => $dataTagihan]);

        if ($response) {
            return redirect()->route('Tagihan.detail', $idPerjanjian)->with('success', 'Tagihan Berhasil Diupdate!');
        } else {
            return redirect()->route('Tagihan.detail', $idPerjanjian)->with('error', 'Tagihan Gagal Diupdate!');
        }
    }
}