<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    private $stat = 13;

    public function index()
    {
        $pembayaranSewa = DB::select('CALL viewAll_pembayaranSewa()');

        return view('admin.TagihanDanPembayaran.Pembayaran.index', compact('pembayaranSewa'));

    }

    public function uploadBukti(){
        return view('admin.TagihanDanPembayaran.Pembayaran.uploadBukti');
    }

    public function storeBukti(){
        return view('admin.TagihanDanPembayaran.Pembayaran.uploadBukti');
    }

    public function detail($id)
    {
        
    }
}