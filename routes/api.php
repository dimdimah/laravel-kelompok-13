<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiMatakuliah295Controller;
use App\Http\Controllers\ApiNilai296Controller;

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

Route::get('/matakuliah', [ApiMatakuliah295Controller::class, 'index']);
Route::post('/matakuliah', [ApiMatakuliah295Controller::class, 'store']);
Route::get('/matakuliah/{id}', [ApiMatakuliah295Controller::class, 'show']);
Route::put('/matakuliah/{id}', [ApiMatakuliah295Controller::class, 'update']);
Route::delete('/matakuliah/{id}', [ApiMatakuliah295Controller::class, 'destroy']);

Route::get('/nilai', [ApiNilai296Controller::class, 'index']);
Route::post('/nilai', [ApiNilai296Controller::class, 'store']);
Route::get('/nilai/{id}', [ApiNilai296Controller::class, 'show']);
Route::put('/nilai/{id}', [ApiNilai296Controller::class, 'update']);
Route::delete('/nilai/{id}', [ApiNilai296Controller::class, 'destroy']);
