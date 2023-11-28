<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();
        $mahasiswa = Mahasiswa::all();
        $grafik_mhs = DB::select("SELECT prodis.nama, COUNT(*)as jumlah
       FROM prodis
       JOIN mahasiswas ON prodis.id = mahasiswas.prodi_id
       GROUP BY prodis.nama;");
        return view('home')
        ->with('fakultas', $fakultas)
        ->with('prodi', $prodi)
        ->with('mahasiswa', $mahasiswa)
        ->with('grafik_mhs', $grafik_mhs);
    }
}
