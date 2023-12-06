<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/', [AuthController::class, 'autenticated']);
Route::get('/logout', [AuthController::class, 'logout']);
//Admin
Route::get('/admin', [AdminController::class,'index'])->middleware('userAccess:admin');
Route::resource('/admin/users', UserController::class)->middleware('userAccess:admin');

//Dosen
Route::get('/dosen', [DosenController::class,'index'])->middleware('userAccess:dosen');

//Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class,'index'])->middleware('userAccess:mahasiswa');
