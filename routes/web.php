<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\KeluarController;
use App\Http\Controllers\SppdController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;


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

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'create'])->name('register.create');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/disposisi', function () {
    $data = ['type_menu' => 'disposisi'];
        //return view with data
    return view('pages.modules-datatables',$data);
})->name('disposisi');

Route::middleware(['auth', 'role:admin,operator'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard', ['type_menu' => 'dashboard']);
    })->name('dashboard');
    Route::resource('/surat-masuk', MasukController::class);
    Route::resource('/surat-keluar', KeluarController::class);
    Route::resource('/sppd', SppdController::class);
    Route::post('/sppd/create/check-unique', [SppdController::class, 'checkUnique'])->name('check-unique');
    Route::get('/sppd/create/sisa-anggaran/{id}', [SppdController::class, 'getSisaAnggaran'])->name('sisa-anggaran');
    Route::get('/sppd/print/{id}', [SppdController::class, 'printPDF'])->name('pdf.sppd');
});