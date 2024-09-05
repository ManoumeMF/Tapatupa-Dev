<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ObjekRetribusiController extends Controller
{
    public function index()
    {
        $objekRetribusi = DB::select('CALL viewAll_objekRetribusi()');

        return view('admin.Master.ObjekRetribusi.index', compact('objekRetribusi'));

    }

    public function create()
    {
        $objectType = DB::select('CALL cbo_jenisObjekRetribusi()');
        $objectLocation = DB::select('CALL cbo_lokasiObjekRetribusi()');
        $province = DB::select('CALL cbo_province()');

        return view('admin.Master.ObjekRetribusi.create', compact('objectType', 'objectLocation', 'province'));
    }

    public function store(Request $request)
    {
               
        $uploadedFile = $request->file('fileGambarDenahTanah');
        $photo = $request->get('kodeObjekRetribusi') . "-Denah Tanah-" . time() . "." . $uploadedFile->getClientOriginalExtension();
        $photoPath = Storage::disk('public')->putFileAs("images/objekRetribusi", $uploadedFile, $photo);

        //dd($photoPath);

        $namaFoto = $request->input('namaFoto');
        $fileFoto = $request->file('fileFoto');
        $keteranganFoto = $request->input('keteranganFoto');

        $detailobjekRetribusi = [];

        for ($count = 0; $count < collect($namaFoto)->count(); $count++) {
            $uploadedFileFoto = $fileFoto[$count];
            $fotoObjek = $count . "-" . $request->get('kodeObjekRetribusi') . time() . "." . $uploadedFileFoto->getClientOriginalExtension();
            $fotoObjekPath = Storage::disk('public')->putFileAs("images/objekRetribusi/fotoObjekRetribusi", $uploadedFileFoto, $fotoObjek);

            $detailobjekRetribusi[] = [
                'NamaFoto' => $namaFoto[$count],
                'FileFoto' => $fotoObjekPath,
                'KeteranganFoto' => $keteranganFoto[$count],
            ];
        }

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
            'Kapasitas' => $request->get('kapasitas'),
            'GambarDenahTanah' => $photoPath, 
            'FotoObjekRetribusi' => $detailobjekRetribusi
        ]);

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
        $objekRetribusiData = DB::select('CALL view_objekRetribusiById(' . $request->get('idObjekRetribusi') . ')');
        $objekRetribusiTemp = $objekRetribusiData[0];

        //dd($objekRetribusiTemp);

        if ($objekRetribusiTemp) {
            $id = $request->get('idObjekRetribusi');

            $response = DB::statement('CALL delete_objekRetribusi(?)', [$id]);

            return response()->json([
                'status' => 200,
                'message' => 'Objek Retribusi Berhasil Dihapus!'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Objek Retribusi Tidak Ditemukan.'
            ]);
        }
    }

    public function detail($id)
    {

        $objekRetribusiData = DB::select('CALL view_objekRetribusiById(' . $id . ')');
        $objekRetribusi = $objekRetribusiData[0];

        $fotoObjek = DB::select('CALL view_photoObjekRetribusiById(' . $id . ')');

        //dd($fieldEducation);

        return view('admin.Master.ObjekRetribusi.detail', compact('objekRetribusi', 'fotoObjek'));
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

    public function tarif()
    {
        $tarifRetribusi = DB::select('CALL viewAll_tarifObjekRetribusi()');

        return view('admin.Master.ObjekRetribusi.tarifObjek', compact('tarifRetribusi'));

        //return view('admin.Master.ObjekRetribusi.index');

    }

    public function createTarif()
    {
        $objekRetribusi = DB::select('CALL cbo_objekRetribusi()'); 
        $jangkaWaktu = DB::select('CALL cbo_jenisJangkaWaktu()');

        return view('admin.Master.ObjekRetribusi.tambahTarif', compact('objekRetribusi', 'jangkaWaktu'));

        //return view('admin.PengaturanDanKonfigurasi.Status.create');
    }

    public function detailObjekToTarif(Request $request){
        $id = $request->idObjek;

        $objekData = DB::select('CALL view_objekRetribusiById(' . $id . ')');
        $objekRetribusi = $objekData[0];

        if ($objekRetribusi) {
            return response()->json([
                'status' => 200,
                'objekRetribusi' => $objekRetribusi
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Objek Retribusi Tidak Ditemukan.'
            ]);
        }
    }

    public function storeTarif(Request $request){

        $uploadedFile = $request->file('filePenilaian');
        $filePenilaian = $request->get('objekRetribusi') . "-Dokumen Penilaian Tarif-" . time() . "." . $uploadedFile->getClientOriginalExtension();
        $filePath = Storage::disk('public')->putFileAs("documents/tarifObjekRetribusi", $uploadedFile, $filePenilaian);

        $tarifObjekRetribusi = json_encode([
            'IdObjekRetribusi' => $request->get('objekRetribusi'),
            'IdJenisJangkaWaktu' => $request->get('jangkaWaktu'),
            'TanggalDinilai' => $request->get('tanggalDinilai'),
            'NamaPenilai' => $request->get('namaPenilai'),
            'NominalTarif' => $request->get('tarifObjek'),
            'Keterangan' => $request->get('keterangan'),
            'FileHasilPenilaian' => $filePath
        ]);

        //dd($objekRetribusi);

        //$request->fileGambarDenahTanah->move(public_path('images'), $denahTanah);

        $response = DB::statement('CALL insert_tarifObjekRetribusi(:dataTarifObjekRetribusi)', ['dataTarifObjekRetribusi' => $tarifObjekRetribusi]);

        if ($response) {
            return redirect()->route('ObjekRetribusi.tarif')->with('success', 'Tarif Objek Retribusi Berhasil Ditambahkan!');
        } else {
            return redirect()->route('ObjekRetribusi.createTarif')->with('error', 'Tarif Objek Retribusi Gagal Disimpan!');
        }
    }

    public function detailTarif(Request $request){
        $id = $request->idTarif;

        $tarifObjekData = DB::select('CALL view_TarifObjekRetribusiById(' . $id . ')');
        $tarifObjek = $tarifObjekData[0];

        if ($tarifObjek) {
            return response()->json([
                'status' => 200,
                'tarifObjek' => $tarifObjek
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Tarif Objek Retribusi Tidak Ditemukan.'
            ]);
        }
    }

    public function deleteTarif(Request $request)
    {
        $tarifData = DB::select('CALL view_TarifObjekRetribusiById(' . $request->get('idTarif') . ')');
        $tarifTemp = $tarifData[0];

        if ($tarifTemp) {
            $id = $request->get('idTarif');

            $response = DB::statement('CALL delete_tarifObjekRetribusi(?)', [$id]);

            return response()->json([
                'status' => 200,
                'message' => 'Tarif Objek Retribusi Berhasil Dihapus!'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Tarif Objek Retribusi Tidak Ditemukan.'
            ]);
        }
    }
}