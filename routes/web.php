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
Auth::routes();
Route::get('/', function () {
    return view('auth.login'); 
});
/* Route::get('/', 'HomeController@home');
 */

Route::get('/home', [HomeController::class, 'index'])->name('home');

/* USUARIO */
Route::get('/usuario', [UserController::class, 'index'])->name('user.index');
Route::get('/usuario/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update{id}', [UserController::class, 'update'])->name('user.update');

/* CONTRASEÑA */
Route::post('resetpass/{id}', [UserController::class, 'resetPassword'])->name('user.resetpass');
Route::post('updatepass', [UserController::class, 'updatepass'])->name('user.updatepass');
Route::get('profile',[HomeController::class, 'profile'])->name('profile');

/* MODULOS */
Route::get('/modulo1/form', [HomeController::class, 'modulo1_add'])->name('modulo1.add');
Route::get('/modulo1/lista', [HomeController::class, 'modulo1_show'])->name('modulo1.show');

Route::get('/modulo2/form', [HomeController::class, 'modulo2_add'])->name('modulo2.add');
Route::get('/modulo2/lista', [HomeController::class, 'modulo2_show'])->name('modulo2.show');

Route::get('/modulo3/form', [HomeController::class, 'modulo3_add'])->name('modulo3.add');
Route::get('/modulo3/lista', [HomeController::class, 'modulo3_show'])->name('modulo3.show');

Route::get('/modulo4/form', [HomeController::class, 'modulo4_add'])->name('modulo4.add');
Route::get('/modulo4/lista', [HomeController::class, 'modulo4_show'])->name('modulo4.show');

Route::get('/modulo5/form', [HomeController::class, 'modulo5_add'])->name('modulo5.add');
Route::get('/modulo5/lista', [HomeController::class, 'modulo5_show'])->name('modulo5.show');

/* PDF'S */
Route::get('pdf', [PdfController::class, 'index'])->name('pdf.index');
Route::get('pdf1', [PdfController::class, 'show'])->name('pdf.show');