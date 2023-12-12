<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProdiController extends Controller
{
    public function index() {
        $prodi = Prodi::with('fakultas')->get();
        return response()->json($prodi, Response::HTTP_OK);
    }

    public function store(Request $request) {
        $validate = $request->validate([
            'nama' => 'required|unique:prodis',
            'fakultas_id'=> 'required'
        ]);
        Prodi::create($validate);
        $response['success'] = true;
        $response['message'] = 'Prodi berhasil disimpan';
        return response()->json($response, Response::HTTP_CREATED);
    }
}
