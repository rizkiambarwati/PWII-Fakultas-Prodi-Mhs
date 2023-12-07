<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function __construct()
    {
        $this -> middleware (['checkRole:A'])
        -> except('index');
    }
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
    public function edit($id)
    {
        //dd($fakultas);
        $fakultas = Fakultas::find($id);
        return view('fakultas.edit')->with('fakultas', $fakultas);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validasi =  $request->validate([
            "nama" => "required"
        ]);
        Fakultas::find($id)->update($validasi);

        return redirect('fakultas')->with('success', 'Data Fakultas Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fakultas = Fakultas::find($id);
        //dd($fakultas);
        $fakultas->delete();
        return redirect('fakultas')->with('success', 'Data Fakultas Berhasil Dihapus');
    }
}
