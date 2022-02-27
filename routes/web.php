<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoriaControlador;
use App\Http\Controllers\DireccionControlador;
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

Route::get('/', [Controller::class, 'index'])->name('index');

//Login

Route::get('/login', [Controller::class, 'login'])->name('iniciaSesion');

Route::get('/login/validar', [Controller::class, 'validaLogin'])->name(
    'validaLogin'
);

//Imagen

Route::get('/imagen', [ImagenControlador::class, 'imagen'])->name('imagen');
Route::get('/imagen/{elemento}', [
    ImagenControlador::class,
    'imagenElemento',
])->name('imagenElemento');
Route::post('/subeImagen', [ImagenControlador::class, 'subeImagen'])->name(
    'subeImagen'
);
Route::post('/eliminaImagen/{idImagen}{idElemento}', [
    ImagenControlador::class,
    'eliminaImagen',
])->name('eliminaImagen');

//Emprendedor

Route::get('/emprendedor/nuevo', [
    EmprendedorControlador::class,
    'creaEmprendedor',
])->name('creaEmprendedor');

//Categoria

Route::get('/categoria', [CategoriaControlador::class, 'categoria'])->name(
    'categoria'
);

Route::get('/categoria/crear', [
    CategoriaControlador::class,
    'crearCategoria',
])->name('crearCategoria');

Route::post('/categoria/validar', [
    CategoriaControlador::class,
    'validarCategoria',
])->name('validarCategoria');

Route::get('/categoria/editar/{categoria}', [
    CategoriaControlador::class,
    'viewEditarCategoria',
])->name('viewEditarCategoria');

Route::put('/categoria/edita/{idCategoria}', [
    CategoriaControlador::class,
    'editarCategoria',
])->name('editarCategoria');

Route::delete('/categoria/eliminar/{idCategoria}', [
    CategoriaControlador::class,
    'eliminarCategoria',
])->name('eliminarCategoria');

//Direcciones

Route::get('/direccion', [DireccionControlador::class, 'direccion'])->name(
    'direccion'
);

Route::get('/direccion/crear', [
    DireccionControlador::class,
    'viewCrearDireccion',
])->name('viewCrearDireccion');

Route::get('/direccion/ciudad/{idProvincia}', [
    DireccionControlador::class,
    'consultaCiudadesPorProvincia',
])->name('consultaCiudadesPorProvincia');

Route::post('/direccion/crear', [
    DireccionControlador::class,
    'crearDireccion',
])->name('crearDireccion');
