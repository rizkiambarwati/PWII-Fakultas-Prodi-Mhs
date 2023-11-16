<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fakultas = Fakultas::all();
        return view("fakultas.index")->with("fakultas", $fakultas);
        //dd($fakultas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view("fakultas.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request);
       // validasi data input
        $validasi = $request->validate([
            "nama" => "required|unique:fakultas"
        ]);
       //simpan data ke tabel fakultas
       Fakultas::create($validasi);

       return redirect("fakultas")->with("success", "Data Fakultas Berhasil Disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fakultas $fakultas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fakultas $fakultas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fakultas $fakultas)
    {
        //
    }
}
