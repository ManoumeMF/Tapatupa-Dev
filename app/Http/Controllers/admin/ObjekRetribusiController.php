<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ObjekRetribusiController extends Controller
{
    public function index()
    {
        $objekRetribusi = DB::select('CALL viewAll_objekRetribusi()');

        return view('admin.Master.ObjekRetribusi.index', ['objekRetribusi' => $objekRetribusi]);

        //return view('admin.Master.ObjekRetribusi.index');

    }

    public function create()
    {
        $objectType = DB::select('CALL cbo_jenisObjekRetribusi()');
        $objectLocation = DB::select('CALL cbo_lokasiObjekRetribusi()');
        $province = DB::select('CALL cbo_province()');
        $kota = DB::select('CALL cbo_cities(' . 2 . ')');
        $kecamatan = DB::select('CALL cbo_districts(' . 28 . ')');
        $kelurahan = DB::select('CALL cbo_subdistricts(' . 358 . ')');
        $jangkaWaktu = DB::select('CALL cbo_jangkaWaktu()');

        return view('admin.Master.ObjekRetribusi.create', compact('objectType', 'objectLocation', 'province', 'kota', 'kecamatan', 'kelurahan', 'jangkaWaktu'));

        //return view('admin.PengaturanDanKonfigurasi.Status.create');
    }

    public function store(Request $request)
    {
        //$request->validate([
        //   'fileGambarDenahTanah' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        //]);

        //$denahTanah = time().'.'.$request->fileGambarDenahTanah->extension();  

        /*$denahTanah= '';

        if($request->file('fileGambarDenahTanah')){
            $file= $request->file('fileGambarDenahTanah');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images'), $filename);
            $denahTanah = $filename;
        }*/

        //$imageName = time().'_'.$request->image->extension(); 
        //$request->image->storeAs('images/objectRetribusi', $imageName);

        //$denahTanah = $request->file("fileGambarDenahTanah")->storeAs("public/images/objectRetribusi");
        //$fileName = str_replace("public/","storage/",$denahTanah);

        if ($request->hasFile('fileGambarDenahTanah')) {
            // $path = Storage::disk('local')->put($request->file('photo')->getClientOriginalName(),$request->file('photo')->get());
            $path = $request->file('fileGambarDenahTanah')->store('/images/objekRetribusi');
        }

        dd($path);

        $objekRetribusi = json_encode([
            'KodeObjekRetribusi' => $request->get('kodeObjekRetribusi'),
            'NoBangunan' => $request->get('nomorBangunan'),
            'ObjekRetribusi' => $request->get('namaObjekRetribusi'),
            'IdLokasiObjekRetribusi' => $request->get('lokasiObjekRetribusi'),
            'IdJenisObjekRetribusi' => $request->get('jenisObjekRetribusi'),
            'PanjangTanah' => $request->get('panjangTanah'),
            'LebarTanah' => $request->get('lebarTanah'),
            'LuasTanah' => $request->get('luasTanah'),
            'PanjangBangunan' => $request->get('panjangBangunan'),
            'LebarBangunan' => $request->get('lebarBangunan'),
            'LuasBangunan' => $request->get('luasBangunan'),
            'Subdis_Id' => $request->get('kelurahan'),
            'Alamat' => $request->get('alamatObjekRetribusi'),
            'Latitute' => $request->get('latitude'),
            'Longitude' => $request->get('longitudu'),
            'Keterangan' => $request->get('keterangan'),
            'JumlahLantai' => $request->get('jumlahLantai'),
            'GambarDenahTanah' => 3
        ]);

        //dd($objekRetribusi);

        //$request->fileGambarDenahTanah->move(public_path('images'), $denahTanah);

        $response = DB::statement('CALL insert_objekRetribusi(:dataObjekRetribusi)', ['dataObjekRetribusi' => $objekRetribusi]);

        if ($response) {
            return redirect()->route('ObjekRetribusi.index')->with('success', 'Objek Retribusi Berhasil Ditambahkan!');
        } else {
            return redirect()->route('ObjekRetribusi.create')->with('error', 'Objek Retribusi Gagal Disimpan!');
        }
    }

    public function edit($id)
    {
        $objectType = DB::select('CALL cbo_jenisObjekRetribusi()');
        $objectLocation = DB::select('CALL cbo_lokasiObjekRetribusi()');

        //$statusData = DB::select('CALL view_statusById(' . $id . ')');
        //$status = $statusData[0];

        /*if ($status) {
            return view('admin.PengaturanDanKonfigurasi.Status.edit', ['statusType' => $statusTypeCombo], ['status' => $status]);
         } else {
             return redirect()->route('Status.index')->with('error', 'Status Tidak Ditemukan!');
         }*/

        return view('admin.Master.ObjekRetribusi.edit', compact('objectType', 'objectLocation'));
    }


    public function update(Request $request, $id)
    {
        $Status = json_encode([
            'IdStatus' => $id,
            'IdJenisStatus' => $request->get('jenisStatus'),
            'Status' => $request->get('namaStatus'),
            'Keterangan' => $request->get('keterangan')
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
        $statusData = DB::select('CALL view_statusById(' . $request->get('idStatus') . ')');
        $statusTemp = $statusData[0];

        if ($statusTemp) {
            $id = $request->get('idStatus');

            $response = DB::statement('CALL delete_status(?)', [$id]);

            return response()->json([
                'status' => 200,
                'message' => 'Status Berhasil Dihapus!'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Status Tidak Ditemukan.'
            ]);
        }
    }

    public function detail(Request $request)
    {
        $id = $request->id;

        $statusData = DB::select('CALL view_statusById(' . $id . ')');
        $status = $statusData[0];

        //dd($fieldEducation);

        if ($status) {
            return response()->json([
                'status' => 200,
                'message' => $status
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Status Tidak Ditemukan.'
            ]);
        }
    }

    public function storeStatusType(Request $request)
    {

        $JenisStatus = json_encode([
            'JenisStatus' => $request->get('jenisStatusModal'),
            'Keterangan' => $request->get('jenisKeteranganModal')
        ]);

        //dd($JenisStatus);

        $response = DB::statement('CALL insert_jenisStatus(:dataJenisStatus)', ['dataJenisStatus' => $JenisStatus]);

        if ($response) {
            return response()->json([
                'status' => 200,
                'message' => 'Jenis Status Berhasil Ditambahkan.'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Jenis Status Gagal Ditambahkan.'
            ]);
        }
    }

    public function getComboJenisStatus()
    {
        $statusTypeCombo = DB::select('CALL cbo_JenisStatus()');

        return response()->json($statusTypeCombo);
    }
}