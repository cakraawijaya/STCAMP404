<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MenuController::class, 'home']);
Route::get('/data-siswa', [MenuController::class, 'datasiswa']);
Route::get('/info-kegiatan', [MenuController::class, 'infokegiatan']);
Route::get('/registrasi', [MenuController::class, 'regist']);
Route::get('/dashboard', [MenuController::class, 'dashboardaccount']);
Route::get('/data-siswa', [SiswaController::class, 'datasiswacamp404']);
Auth::routes();