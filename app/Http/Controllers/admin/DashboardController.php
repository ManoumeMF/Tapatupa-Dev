<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve data to widget on dasboard page
        $permohonanBaruTemp = DB::select('CALL view_permohonanBaru()');
        $permohonanBaru = $permohonanBaruTemp[0];

        $permohonanDisetujuiTemp = DB::select('CALL view_permohonanDisetujui()');
        $permohonanDisetujui = $permohonanDisetujuiTemp[0];

        $tagihanJatuhTempoTemp = DB::select('CALL view_jumlahDataTagihanJatuhTempo()');
        $tagihanJatuhTempo = $tagihanJatuhTempoTemp[0];

        $tagihanMenunggakTemp = DB::select('CALL view_jumlahDataTagihanMenunggak()');
        $tagihanMenunggak = $tagihanMenunggakTemp[0];

        return view('admin.Dashboard.index', compact('permohonanBaru', 'permohonanDisetujui', 'tagihanJatuhTempo', 'tagihanMenunggak'));
        //return view('admin.PengaturanDanKonfigurasi.Bidang.index', ['bidang' => $bidang]);
    }

    public function permohonanBaru()
    {
        $permohonanBaru = DB::select('CALL viewAll_PermohonanBaru()');

        return view('admin.Dashboard.permohonanBaru', compact('permohonanBaru'));

    }

    public function permohonanDisetujui()
    {
        $permohonanDisetujui = DB::select('CALL viewAll_permohonanDisetujui()');

        return view('admin.Dashboard.permohonanDisetujui', compact('permohonanDisetujui'));

    }

    public function tagihanJatuhTempo()
    {
        $tagihanJatuhTempo = DB::select('CALL viewAll_tagihanJatuhTempo()');

        return view('admin.Dashboard.tagihanJatuhTempo', compact('tagihanJatuhTempo'));

    }
}
