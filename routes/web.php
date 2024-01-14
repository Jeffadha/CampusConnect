<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\UserController;
use App\Models\Pengumuman;

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
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Admin
Route::get('/admin', [AdminController::class, 'index'])->middleware('userAccess:admin');
Route::resource('/admin/users', UserController::class)->middleware('userAccess:admin');
Route::resource('/admin/pengumuman', PengumumanController::class)->middleware('userAccess:admin');
Route::resource('/admin/akademik', AkademikController::class)->middleware('userAccess:admin');

//Dosen
Route::get('/dosen', [DosenController::class, 'index'])->middleware('userAccess:dosen');
Route::get('/list-jawaban/{id_tugas}', [TugasController::class, 'list_jawaban'])->middleware('userAccess:dosen')->name('list.jawaban');
Route::resource('/dosen/tugas', TugasController::class)->middleware('userAccess:dosen');
Route::put('/jawaban-nilai/{id}', [TugasController::class, 'nilai'])->name('jawaban.nilai')->middleware('userAccess:dosen');

//Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->middleware('userAccess:mahasiswa');
Route::get('/tugas-mahasiswa', [TugasController::class, 'tugas_mahasiswa'])->middleware('userAccess:mahasiswa')->name('tugasMahasiswa');
Route::get('/detail-tugas/{detail}', [TugasController::class, 'detail_tugas'])->name('tugas.detail')->middleware('userAccess:mahasiswa');
Route::post('/jawaban-store', [TugasController::class, 'simpan_jawaban'])->name('jawaban.store')->middleware('userAccess:mahasiswa');
Route::delete('/jawaban-destroy/{id}', [TugasController::class, 'delete_jawaban'])->name('jawaban.destroy')->middleware('userAccess:mahasiswa');
Route::get('/jawaban-edit/{id}', [TugasController::class, 'edit_jawaban'])->name('jawaban.edit')->middleware('userAccess:mahasiswa');
Route::put('/jawaban-update/{id}', [TugasController::class, 'update_jawaban'])->name('jawaban.update')->middleware('userAccess:mahasiswa');


// pengumuman
Route::get('/pengumuman', [PengumumanController::class, 'list_pengumuman'])->middleware('auth')->name('pengumuman.list');
Route::get('/pengumuman/{id}/detail', [PengumumanController::class, 'detail_pengumuman'])->middleware('auth')->name('pengumuman.detail');

// akademik
Route::get('/akademik', [AkademikController::class, 'list_akademik'])->middleware('auth')->name('akademik.list');


// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('home');