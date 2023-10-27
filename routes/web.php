<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConformidadObraController;
use App\Http\Controllers\HabilitacionUrbController;
use App\Http\Controllers\ConstanciaPosesionController;
use App\Http\Controllers\ParametrosUrbController;
use App\Http\Controllers\TrabViaPublicaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\PisoController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\HabilitationAdminController;


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
/* Route::get('/login', [HomeController::class, 'login'])->name('login'); */
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', [HomeController::class, 'index'])->name('home');

/* USUARIO */
Route::get('/usuario', [UserController::class, 'index'])->name('user.index');
Route::post('/usuario/create', [UserController::class, 'create'])->name('user.create');
Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');

Route::get('/seguimiento', [SeguimientoController::class, 'index'])->name('siguimiento.index');
/* Route::get('ubicacion', [UbicacionController::class, 'index'])->name('ubicacion.index'); */
/* Route::get('ubicacion/edit', [UbicacionController::class, 'edit'])->name('ubicacion.edit'); */

/* CONTRASEÑA */
Route::post('resetpass/{id}', [UserController::class, 'resetPassword'])->name('user.resetpass');
Route::post('updatepass', [UserController::class, 'updatepass'])->name('user.updatepass');
Route::get('profile',[HomeController::class, 'profile'])->name('profile');

/* MODULOS */
/* Route::get('/modulo1/lista', [ConformidadObraController::class, 'index'])->name('conformidad.index');
Route::get('/modulo1/form', [ConformidadObraController::class, 'create'])->name('conformidad.create');
Route::post('/conformidad/obra', [ConformidadObraController::class, 'store'])->name('conformidad.store');
Route::get('/modulo1/edit/{id}', [ConformidadObraController::class, 'edit'])->name('conformidad.edit');
Route::post('/modulo1/update/{id}', [ConformidadObraController::class, 'update'])->name('conformidad.update');
Route::delete('/modulo1/delete/{id}', [ConformidadObraController::class, 'destroy'])->name('conformidad.destroy'); */

/* Route::get('/modulo2/lista', [HabilitacionUrbController::class, 'index'])->name('habilitacion.index');
Route::get('/modulo2/form', [HabilitacionUrbController::class, 'create'])->name('habilitacion.create');
Route::post('/habilitacion/urb', [HabilitacionUrbController::class, 'store'])->name('habilitacion.store');
Route::get('/modulo2/edit/{id}', [HabilitacionUrbController::class, 'edit'])->name('habilitacion.edit');
Route::post('/modulo2/update/{id}', [HabilitacionUrbController::class, 'update'])->name('habilitacion.update');
Route::delete('/modulo2/delete/{id}', [HabilitacionUrbController::class, 'destroy'])->name('habilitacion.destroy'); */

Route::get('/modulo3/lista', [ConstanciaPosesionController::class, 'index'])->name('constancia.index');
Route::get('/modulo3/form', [ConstanciaPosesionController::class, 'create'])->name('constancia.create');
Route::post('/constancia/posesion', [ConstanciaPosesionController::class, 'store'])->name('constancia.store');
Route::get('/modulo3/edit/{id}', [ConstanciaPosesionController::class, 'edit'])->name('constancia.edit');
Route::post('/modulo3/update/{id}', [ConstanciaPosesionController::class, 'update'])->name('constancia.update');
Route::delete('/modulo3/delete/{id}', [ConstanciaPosesionController::class, 'destroy'])->name('constancia.destroy');

/* Route::get('/modulo4/lista', [ParametrosUrbController::class, 'index'])->name('parametro.index');
Route::get('/modulo4/form', [ParametrosUrbController::class, 'create'])->name('parametro.create');
Route::post('/parametro/urbano', [ParametrosUrbController::class, 'store'])->name('parametro.store');
Route::get('/modulo4/edit/{id}', [ParametrosUrbController::class, 'edit'])->name('parametro.edit');
Route::post('/modulo4/update/{id}', [ParametrosUrbController::class, 'update'])->name('parametro.update');
Route::delete('/modulo4/delete/{id}', [ParametrosUrbController::class, 'destroy'])->name('parametro.destroy'); */

/* Route::get('/modulo5/lista', [TrabViaPublicaController::class, 'index'])->name('via.pub.index');
Route::get('/modulo5/form', [TrabViaPublicaController::class, 'create'])->name('via.pub.create');
Route::post('/trab/viapublica', [TrabViaPublicaController::class, 'store'])->name('via.pub.store');
Route::get('/modulo5/edit/{id}', [TrabViaPublicaController::class, 'edit'])->name('via.pub.edit');
Route::post('/modulo5/update/{id}', [TrabViaPublicaController::class, 'update'])->name('via.pub.update');
Route::delete('/modulo5/delete/{id}', [TrabViaPublicaController::class, 'destroy'])->name('via.pub.destroy'); */

/* PDF'S */
Route::get('co/fpdf/{token}', [ConformidadObraController::class, 'pdf'])->name('pdf.co');
Route::get('hu/fpdf/{token}', [HabilitacionUrbController::class, 'pdf'])->name('pdf.hu');
Route::get('ConstanciaPosesion/{id}', [ConstanciaPosesionController::class, 'pdf'])->name('pdf.cp');

Route::get('controlEstImp', [HabilitationAdminController::class, 'index'])->name('administrador.index');
Route::post('unlockPrint/{id}', [HabilitationAdminController::class, 'unlockPrint'])->name('administrador.unlockprint');
Route::get('lockPrint/{id}', [HabilitationAdminController::class, 'lokckPrint'])->name('administrador.lockprint');
Route::post('disable/{id}', [HabilitationAdminController::class, 'disable'])->name('administrador.disable');
Route::get('disable/{id}', [ConstanciaPosesionController::class, 'disable'])->name('user.disable');
Route::post('enable/{id}', [HabilitationAdminController::class, 'enable'])->name('administrador.enable');

Route::get('pu/fpdf/{token}', [ParametrosUrbController::class, 'pdf'])->name('pdf.pu');
Route::get('tvp/fpdf/{token}', [TrabViaPublicaController::class, 'pdf'])->name('pdf.tvp');

Route::get('actualizar/pisos/{id}/{pisos}', [ConformidadObraController::class, 'actualizarPisos'])->name('actualizar.pisos');
/* Route::post('/actualizar/pisos/{id}/{pisos}', [ConformidadObraController::class, 'actualizarCantidadPisos'])->name('actualizar.pisos'); */
Route::get('licencias/getSunatDatos/{ruc}', [ParametrosUrbController::class, 'getSunatDatos'])->name('getSunatDatos');

/* UBICACION */
Route::get('ubicacion', [UbicacionController::class, 'index'])->name('ubicacion.index');
Route::post('ubicacion/create', [UbicacionController::class, 'store'])->name('ubicacion.store');
Route::post('ubicacion/update/{id}', [UbicacionController::class, 'update'])->name('ubicacion.update');
Route::delete('ubicacion/destroy/{id}', [UbicacionController::class, 'destroy'])->name('ubicacion.destroy');

Route::get('ubicacion/getSector/{zona}', [UbicacionController::class, 'getSector'])->name('getSector');