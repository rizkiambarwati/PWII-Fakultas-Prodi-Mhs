<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodi = Prodi::all();
        return view("prodi.index")->with("prodi", $prodi);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        return  view("prodi.create")->with("fakultas", $fakultas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validasi = $request->validate([
            "nama" => "required|unique:prodis", "fakultas_id" => "required"  //nama tabel
        ]);


       //simpan data ke tabel fakultas
       Prodi::create($validasi);
       return redirect("prodi")->with("success","Data Program Studi Berhasil Disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        //
    }
}
