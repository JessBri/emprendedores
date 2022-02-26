<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImagenControlador;
use App\Http\Controllers\EmprendedorControlador;
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

Route::get('/',[Controller::class, 'index'])->name('index');


//Login

Route::get('/login',[Controller::class, 'login'])->name('iniciaSesion');

Route::get('/login/validar',[Controller::class, 'validaLogin'])->name('validaLogin');


//Imagen

Route::get('/imagen',[ImagenControlador::class, 'imagen'])->name('imagen');
Route::get('/imagen/{elemento}',[ImagenControlador::class, 'imagenElemento'])->name('imagenElemento');
Route::post('/subeImagen',[ImagenControlador::class, 'subeImagen'])->name('subeImagen');
Route::post('/eliminaImagen/{idImagen}{idElemento}',[ImagenControlador::class, 'eliminaImagen'])->name('eliminaImagen');

//Emprendedor

Route::get('/emprendedor/nuevo',[EmprendedorControlador::class, 'creaEmprendedor'])->name('creaEmprendedor');

