<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\RequestController;

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

Route::get('login', function () {
    return view('login');
})->name('login');

Route::post('login', [LoginController::class, 'login'])->name('login');

Route::get('register', function () {
    return view('register');
})->name('register');

Route::post('register', [LoginController::class, 'register'])->name('register');

Route::post('logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');


Route::middleware(['auth', 'guru'])->group(function () {
Route::get('/indexguru', [GuruController::class,'index'])->name('dataguru');
Route::get('/profilguru', [GuruController::class,'profile'])->name('profilguru');
Route::get('/tambahdata', [GuruController::class,'create'])->name('tambahdata');
Route::post('/insertdataguru', [GuruController::class,'store'])->name('insertdataguru');
Route::get('/editdata/{id}', [GuruController::class,'edit'])->name('editdata');
Route::post('/updatedata/{id}', [GuruController::class, 'update'])->name('updatedata');
Route::get('/hapusdata/{id}', [GuruController::class,'destroy'])->name('hapusdata');
// Route::get('/databukupdf', [GuruController::class,'eksporpdf'])->name('databukupdf');
});

Route::middleware(['auth', 'murid'])->group(function () {

Route::get('/indexmurid', [MuridController::class,'index'])->name('datamurid');
Route::get('/profilmurid', [MuridController::class,'profile'])->name('profilmurid');
Route::get('/tambahdata', [MuridController::class,'create'])->name('tambahdata');
Route::post('/insertdata', [MuridController::class,'store'])->name('insertdata');
Route::get('/editdata/{id}', [MuridController::class,'edit'])->name('editdata');
Route::post('/updatedata/{id}', [MuridController::class, 'update'])->name('updatedata');
Route::get('/hapusdata/{id}', [MuridController::class,'destroy'])->name('hapusdata');
Route::post('/kirimrequest', [RequestController::class, 'kirimRequest'])->name('kirim.request');
// Route::get('/databukupdf', [GuruController::class,'eksporpdf'])->name('databukupdf');
});

Route::middleware(['auth', 'admin'])->group(function () {

Route::get('/index', [AdminController::class,'index'])->name('dataadmin');
Route::get('/tambahdata', [AdminController::class,'create'])->name('tambahdata');
Route::post('/insertdata', [AdminController::class,'store'])->name('insertdata');
Route::get('/editdata/{id}', [AdminController::class,'edit'])->name('editdata');
Route::post('/updatedata/{id}', [AdminController::class, 'update'])->name('updatedata');
Route::get('/hapusdata/{id}', [AdminController::class,'destroy'])->name('hapusdata');
// Route::get('/databukupdf', [GuruController::class,'eksporpdf'])->name('databukupdf');
});
