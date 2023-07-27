<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('auth.login'); 
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/usuario', [UserController::class, 'index'])->name('usuario.index');
Route::post('/usuario/create', [UserController::class, 'create'])->name('user.create');
Route::post('/usuario/pass', [UserController::class, 'changepass'])->name('user.password');
Route::post('/userDelete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::post('/userEdit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::get('/modulo2', [HomeController::class, 'modulo2'])->name('modulo2');
Route::get('/modulo3', [HomeController::class, 'modulo3'])->name('modulo3');
Route::get('/modulo4', [HomeController::class, 'modulo4'])->name('modulo4');
Route::get('/modulo5', [HomeController::class, 'modulo5'])->name('modulo5');
Route::get('pdf', [PdfController::class, 'index'])->name('pdf');
Route::get('admin/settings', [HomeController::class, 'changepass'])->name('home.password');
