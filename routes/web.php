<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoriaControlador;
use App\Http\Controllers\DireccionControlador;
use App\Http\Controllers\ProvinciaControlador;
use App\Http\Controllers\CiudadControlador;
use App\Http\Controllers\ImagenControlador;
use App\Http\Controllers\EmprendedorControlador;
use App\Http\Controllers\ElementoControlador;
use App\Http\Controllers\CompraControlador;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

Route::get('/detalle/{idActiculo}', [
    Controller::class,
    'detalleElemento',
])->name('detalleElemento');

Route::get('/buscador', [Controller::class, 'buscador'])->name('buscador');
Route::get('/lista/{idCategoria}', [Controller::class, 'porCategoria'])->name(
    'porCategoria'
);

//Login

Route::get('/login', [Controller::class, 'login'])->name('iniciaSesion');

Route::post('/login', [Controller::class, 'logueaSistema'])->name(
    'logueaSistema'
);

Route::get('/login/validar', [Controller::class, 'validaLogin'])->name(
    'validaLogin'
);

Route::get('/cerrarsesion', [Controller::class, 'cerrarSesion'])->name(
    'cerrarSesion'
);

//Recuperacion

Route::post('/recuperaContrasena', [
    Controller::class,
    'recuperaContrasena',
])->name('recuperaContrasena');

Route::get('/password/{codigo}', [
    Controller::class,
    'restauraContrasena',
])->name('restauraContrasena');

Route::post('/password/{codigo}', [
    Controller::class,
    'cambiaNuevaContrasena',
])->name('cambiaNuevaContrasena');

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

//Compras

Route::get('/compra', [CompraControlador::class, 'compra'])->name('compra');

Route::get('/venta', [CompraControlador::class, 'venta'])->name('venta');

Route::post('/compra', [CompraControlador::class, 'crearCompra'])->name(
    'crearCompra'
);

Route::post('/compra/editar/{idCompra}', [
    CompraControlador::class,
    'editarCompra',
])->name('editarCompra');

Route::get('/compra/detalle/{idCompra}', [
    CompraControlador::class,
    'detalleCompra',
])->name('detalleCompra');

//Emprendedor

Route::get('/emprendedor/nuevo', [
    EmprendedorControlador::class,
    'creaEmprendedor',
])->name('creaEmprendedor');

Route::get('/comprador/nuevo', [
    EmprendedorControlador::class,
    'creaComprador',
])->name('creaComprador');

Route::post('/emprendedor/nuevo', [
    EmprendedorControlador::class,
    'nuevoEmprendedor',
])->name('nuevoEmprendedor');

Route::get('/emprendedor/{codigo}', [
    EmprendedorControlador::class,
    'confirmaEmprendedor',
])->name('confirmaEmprendedor');

Route::get('/emprendedor', [
    EmprendedorControlador::class,
    'perfilEmprendedor',
])->name('perfilEmprendedor');

Route::post('/emprendedor', [
    EmprendedorControlador::class,
    'editaEmprendedor',
])->name('editaEmprendedor');

Route::get('/cambiaContrasena', [
    EmprendedorControlador::class,
    'passwordEmprendedor',
])->name('passwordEmprendedor');

Route::post('/cambiaContrasena', [
    EmprendedorControlador::class,
    'editaPasswordEmprendedor',
])->name('editaPasswordEmprendedor');

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

Route::get('/direccion/editar/{idDireccion}', [
    DireccionControlador::class,
    'viewEditarDireccion',
])->name('viewEditarDireccion');

Route::put('/direccion/editar/{idDireccion}', [
    DireccionControlador::class,
    'editarDireccion',
])->name('editarDireccion');

Route::delete('/direccion/eliminar/{idDireccion}', [
    DireccionControlador::class,
    'eliminarDireccion',
])->name('eliminarDireccion');

//Provincia

Route::get('/provincia', [ProvinciaControlador::class, 'provincia'])->name(
    'provincia'
);

Route::get('/provincia/crear', [
    ProvinciaControlador::class,
    'viewCrearProvincia',
])->name('viewCrearProvincia');

Route::post('/provincia/crear', [
    ProvinciaControlador::class,
    'crearProvincia',
])->name('crearProvincia');

Route::get('/provincia/editar/{idProvincia}', [
    ProvinciaControlador::class,
    'viewEditarProvincia',
])->name('viewEditarProvincia');

Route::put('/provincia/editar/{idProvincia}', [
    ProvinciaControlador::class,
    'editarProvincia',
])->name('editarProvincia');

Route::delete('/provincia/eliminar/{idDireccion}', [
    ProvinciaControlador::class,
    'eliminarProvincia',
])->name('eliminarProvincia');

//Ciudad

Route::get('/ciudad', [CiudadControlador::class, 'ciudad'])->name('ciudad');

Route::get('/ciudad/crear', [
    CiudadControlador::class,
    'viewCrearCiudad',
])->name('viewCrearCiudad');

Route::post('/ciudad/crear', [CiudadControlador::class, 'crearCiudad'])->name(
    'crearCiudad'
);

Route::get('/ciudad/editar/{idCiudad}', [
    CiudadControlador::class,
    'viewEditarCiudad',
])->name('viewEditarCiudad');

Route::put('/ciudad/editar/{idCiudad}', [
    CiudadControlador::class,
    'editarCiudad',
])->name('editarCiudad');

Route::delete('/ciudad/eliminar/{idDireccion}', [
    CiudadControlador::class,
    'eliminarCiudad',
])->name('eliminarCiudad');

//Elemento

Route::get('/elemento', [ElementoControlador::class, 'elemento'])->name(
    'elemento'
);

Route::get('/elemento/crear', [
    ElementoControlador::class,
    'viewCrearElemento',
])->name('viewCrearElemento');

Route::post('/elemento/crear', [
    ElementoControlador::class,
    'nuevoElemento',
])->name('nuevoElemento');

Route::get('/elemento/editar/{idElemento}', [
    ElementoControlador::class,
    'viewEditarElemento',
])->name('viewEditarElemento');

Route::post('/elemento/editar/{idElemento}', [
    ElementoControlador::class,
    'editarElemento',
])->name('editarElemento');

Route::delete('/elemento/eliminar/{idElemento}', [
    ElementoControlador::class,
    'eliminarElemento',
])->name('eliminarElemento');
