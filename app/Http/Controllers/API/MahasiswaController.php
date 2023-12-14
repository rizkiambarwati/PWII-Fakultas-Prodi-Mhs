<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with('prodi.fakultas')->get();
        return response()->json($mahasiswa, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'npm' => 'required|unique:mahasiswas',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jk' => 'required',
            'prodi_id' => 'required',
            'foto' => 'required|image'
        ]);

        //ambil extensi file foto
        $ext = $request->foto->getClientOriginalExtension();
        //rename file
        $validate["foto"] = $request->npm . "." . $ext;
        //upload file foto
        $request->foto->move(public_path('images'), $validate["foto"]);

        Mahasiswa::create($validate);
        $response['success'] = true;
        $response['message'] = 'Mahasiswa Berhasil Disimpan';
        return response()->json($response, Response::HTTP_CREATED);
    }
}
