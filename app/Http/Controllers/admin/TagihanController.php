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

    public function detail(Request $request, $id)
    {      
        //$tagihanData = DB::select('CALL view_tagihanByIdPerjanjian('  . $id . ')');

        //dd($fieldEducation);

        return view('admin.TagihanDanPembayaran.Tagihan.detail');
    }

}