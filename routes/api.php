<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FakultasController;
use App\Http\Controllers\API\MahasiswaController;
use App\Http\Controllers\API\ProdiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//REGISTER
Route::post('register', [AuthController::class, 'register']);

//LOGIN
Route::post('login', [AuthController::class, 'login']);

//MIDDLEWARE
//Route::middleware('auth:sanctum')->get('fakultas', [FakultasController::class, 'index']);

Route::middleware(['auth:sanctum', 'ability:read-fakultas'])->get('fakultas', [FakultasController::class, 'index']);
Route::middleware(['auth:sanctum', 'ability:create-fakultas'])->post('fakultas', [FakultasController::class, 'store']);
Route::middleware(['auth:sanctum', 'ability:update-fakultas'])->patch('fakultas/{id}', [FakultasController::class, 'update']);
Route::middleware(['auth:sanctum', 'ability:delete-fakultas'])->delete('fakultas/{id}', [FakultasController::class, 'destroy']);

//GET
// Route::get('fakultas', [FakultasController::class, 'index']);
// Route::get('prodi', [ProdiController::class, 'index']);
// Route::get('mahasiswa', [MahasiswaController::class, 'index']);

// //POST
// Route::post('fakultas', [FakultasController::class, 'store']);
// Route::post('prodi', [ProdiController::class, 'store']);
// Route::post('mahasiswa', [MahasiswaController::class, 'store']);

// //PATCH (UPDATE)
// Route::patch('fakultas/{id}', [FakultasController::class, 'update']);
// Route::patch('prodi/{id}', [FakultasController::class, 'update']);

// //DELETE
// Route::delete('fakultas/{id}', [FakultasController::class, 'destroy']);
// Route::delete('prodi/{id}', [FakultasController::class, 'destroy']);
