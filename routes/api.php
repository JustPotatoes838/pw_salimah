<?php

use App\Http\Controllers\Api\BeritaController;
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

Route::get('berita',[BeritaController::class, 'index']);
Route::get('berita/{id}',[BeritaController::class, 'show']);
Route::post('berita',[BeritaController::class, 'store']);
Route::put('berita/{id}',[BeritaController::class, 'update']);
Route::delete('berita/{id}',[BeritaController::class, 'destroy']);