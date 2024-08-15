<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatan = DB::select('CALL viewAll_jabatan()');
        return view('admin.PengaturanDanKonfigurasi.Jabatan.index', compact('jabatan'));
    }

    public function create()
    {
        return view('admin.PengaturanDanKonfigurasi.Jabatan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jabatan' => 'required|string|max:100',
            'keterangan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('Jabatan.create')
                ->withErrors($validator)
                ->withInput();
        }

        $dataJabatan = json_encode([
            'Jabatan' => $request->get('jabatan'),
            'Keterangan' => $request->get('keterangan')
        ]);

        $response = DB::statement('CALL insert_jabatan(:dataJabatan)', ['dataJabatan' => $dataJabatan]);

        if ($response) {
            return redirect()->route('Jabatan.index')->with('success', 'Jabatan Berhasil Ditambahkan!');
        } else {
            return redirect()->route('Jabatan.create')->with('error', 'Jabatan Gagal Disimpan!');
        }
    }

    public function edit($id)
    {
        $jabatanData = DB::select('CALL view_jabatan_ById(:id)', ['id' => $id]);
        $jabatan = $jabatanData[0] ?? null;

        if ($jabatan) {
            return view('admin.PengaturanDanKonfigurasi.Jabatan.edit', compact('jabatan'));
        } else {
            return redirect()->route('Jabatan.index')->with('error', 'Data Jabatan Tidak Ditemukan!');
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'jabatan' => 'required|string|max:100',
            'keterangan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('Jabatan.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $dataJabatan = json_encode([
            'IdJabatan' => $id,
            'Jabatan' => $request->get('jabatan'),
            'Keterangan' => $request->get('keterangan')
        ]);

        $response = DB::statement('CALL update_jabatan(:dataJabatan)', ['dataJabatan' => $dataJabatan]);

        if ($response) {
            return redirect()->route('Jabatan.index')->with('success', 'Jabatan Berhasil Diubah!');
        } else {
            return redirect()->route('Jabatan.edit', $id)->with('error', 'Jabatan Gagal Diubah!');
        }
    }

    public function delete(Request $request)
    {
        $jabatanData = DB::select('CALL view_jabatan_ById(' . $request -> get('idJabatan') . ')');
        $jabatanTemp = $jabatanData[0];

        if ($jabatanTemp) {
            $id = $request -> get('idJabatan');

            $response = DB::statement('CALL delete_jabatan(?)', [$id]);

            return response()->json([
                'status' => 200,
                'message'=> 'Jabatan Berhasil Dihapus!'
            ]);
        }else{
            return response()->json([
                'status'=> 404,
                'message' => 'Data Jabatan Tidak Ditemukan.'
            ]);
        }
    }

    public function detail(Request $request)
    {
        $id = $request->id;

        $jabatanData = DB::select('CALL view_jabatan_ById(' . $id . ')');
        $jabatan = $jabatanData[0];

        if ($jabatan) {
            return response()->json([
                'status' => 200,
                'jabatan' => $jabatan
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Jabatan Tidak Ditemukan.'
            ]);
        }
    }
}


