<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/fakultas', function () {
//     return view('fakultas');
// });

//Contoh Authorization
//Admin
Route::middleware(['auth', 'checkRole:A'])->group(function() {
    Route::resource('fakultas', FakultasController::class);
    Route::resource('prodi',ProdiController::class);
    Route::resource('mahasiswa', MahasiswaController::class);

});

//User (hanya bisa melihat data fakultas)
Route::middleware(['auth', 'checkRole:U'])->group(function() {
    Route::get('fakultas', [FakultasController::class, 'index'])->name('fakultas.index');
});


// Route::get('/prodi', function () {
//     return view('prodi');
// });

// Route::get('/mahasiswa', function () {
//     // return view('mahasiswa.index'); //tersimpan dalam folder mahasiswa dimana ada file mahasiswa.index
//     $data = [
//         ["npm" => 2226250001, "nama" => "Ahmad"],
//         ["npm" => 2226250079, "nama" => "Rizki"],
//     ];
//     return view('mahasiswa.index')->with('mahasiswa', $data);
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['checkRole:A,U'])->name('home');
