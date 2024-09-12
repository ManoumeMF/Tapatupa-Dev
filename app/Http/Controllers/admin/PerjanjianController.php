<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class PerjanjianController extends Controller
{
    public function index()
    {
        //$objekRetribusi = DB::select('CALL viewAll_objekRetribusi()'); 

        //return view('admin.Master.ObjekRetribusi.index', compact(''));

        return view('admin.SewaAset.Perjanjian.index');
        
    }

    public function create()
    {
        $permohonanSewa = DB::select('CALL cbo_permohonanPerjanjianSewa()'); 
        //$wajibRetribusi = DB::select('CALL cbo_wajibRetribusi()'); 
        //$objekRetribusi = DB::select('CALL cbo_objekRetribusi()'); 
       // $jangkaWaktu = DB::select('CALL cbo_jangkaWaktu()'); 
        //$peruntukanSewa = DB::select('CALL cbo_peruntukanSewa()'); 

        //return view('admin.SewaAset.Permohonan.create', compact('jenisPermohonan', 'wajibRetribusi', 'objekRetribusi', 'jangkaWaktu', 'peruntukanSewa'));

        return view('admin.SewaAset.Perjanjian.create', compact('permohonanSewa'));
    }

    public function detailPermohonanToPerjanjian(Request $request){
        $id = $request->idPermohonan;

        //dd($id);

        $permohonanData = DB::select('CALL view_detailPermohonanToPerjanjianById(' . $id . ')');
        $permohonanSewa = $permohonanData[0];

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

    public function store(Request $request)
    {

        $Status = json_encode([
            'JenisStatus' => $request->get('jenisStatus'),
            'Status' => $request->get('namaStatus'),
            'Keterangan'  => $request->get('keterangan')
        ]);
    
            $response = DB::statement('CALL insert_status(:dataStatus)', ['dataStatus' => $Status]);

            if ($response) {
                return redirect()->route('Status.index')->with('success', 'Status Berhasil Ditambahkan!');
            } else {
                return redirect()->route('Status.create')->with('error', 'Status Gagal Disimpan!');
            }
    }

    public function edit($id)
    {      
        $perkerjaan = DB::select('CALL cbo_pekerjaan()'); 

        //$statusData = DB::select('CALL view_statusById(' . $id . ')');
        //$status = $statusData[0];

        /*if ($status) {
            return view('admin.PengaturanDanKonfigurasi.Status.edit', ['statusType' => $statusTypeCombo], ['status' => $status]);
         } else {
             return redirect()->route('Status.index')->with('error', 'Status Tidak Ditemukan!');
         }*/

         return view('admin.Master.WajibRetribusi.edit', compact('perkerjaan'));
    }


    public function update(Request $request, $id)
    {
        $Status = json_encode([
            'IdStatus' => $id,
            'IdJenisStatus' => $request -> get('jenisStatus'),
            'Status' => $request->get('namaStatus'),
            'Keterangan'  => $request->get('keterangan')
        ]);

        //dd($Status);

            $statusData = DB::select('CALL view_statusById(' . $id . ')');
            $statusTemp = $statusData[0];
            
        if ($statusTemp) {
            $response = DB::statement('CALL update_status(:dataStatus)', ['dataStatus' => $Status]);

            if ($response) {
                return redirect()->route('Status.index')->with('success', 'Status Berhasil Diubah!');
            } else {
                return redirect()->route('Status.edit', $id)->with('error', 'Status Gagal Diubah!');
            }

         } else {
             return redirect()->route('Status.index')->with('error', 'Status Tidak Ditemukan!');
         }     
    }

    public function delete(Request $request)
    {
        $statusData = DB::select('CALL view_statusById(' . $request -> get('idStatus') . ')');
        $statusTemp = $statusData[0];

            if ($statusTemp) {
                $id = $request -> get('idStatus');

                $response = DB::statement('CALL delete_status(?)', [$id]);
                
                return response()->json([
                    'status' => 200,
                    'message'=> 'Status Berhasil Dihapus!'
                ]);
            }else{
                return response()->json([
                    'status'=> 404,
                    'message' => 'Data Status Tidak Ditemukan.'
                ]);
            }
    }

    public function detail(Request $request)
    {      
        $id = $request->id;

        $statusData = DB::select('CALL view_statusById('  . $id . ')');
        $status = $statusData[0];

        //dd($fieldEducation);

        if ($status) {
            return response()->json([
                'status'=> 200,
                'status' => $status
            ]);
        }else{
            return response()->json([
                'status'=> 404,
                'message' => 'Data Status Tidak Ditemukan.'
            ]);
        }
    }

    public function storeStatusType(Request $request)
    {
        
            $JenisStatus = json_encode([
                'JenisStatus' => $request->get('jenisStatusModal'),
                'Keterangan'  => $request->get('jenisKeteranganModal')
            ]);

            //dd($JenisStatus);
    
            $response = DB::statement('CALL insert_jenisStatus(:dataJenisStatus)', ['dataJenisStatus' => $JenisStatus]);
        
            if ($response) {
                return response()->json([
                    'status' => 200,
                    'message'=> 'Jenis Status Berhasil Ditambahkan.'
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'message'=> 'Jenis Status Gagal Ditambahkan.'
                ]);
            }
    }

    public function getComboJenisStatus(){
        $statusTypeCombo = DB::select('CALL cbo_JenisStatus()');

        return response()->json($statusTypeCombo);
    }
}