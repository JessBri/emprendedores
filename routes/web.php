<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoriaControlador;
use App\Http\Controllers\ImagenControlador;
use App\Http\Controllers\EmprendedorControlador;
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

Route::post('/emprendedor/nuevo', [
    EmprendedorControlador::class,
    'nuevoEmprendedor'
])->name('nuevoEmprendedor');

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

Route::get('enviar', ['as' => 'enviar', function () {

    //Str::random(10);

    $data = [   'link' => 'http://127.0.0.1:8000/password/'.Str::random(10),
                'codigo' => Str::random(10),
                'nombre' => 'Jessica Arciniega'
            ];
    Mail::send('emails.notificacion', $data, function ($message) {
        $message->from('emprendedor.uisrael@gmail.com', 'Proyecto Emprendedores');
        $message->to('luis.borja1722@gmail.com')->subject('Recuperación de contraseña');
    });
    return "Se envío el email";
}]);

Route::get('/password/{codigo}', [Controller::class, 'prueba'])->name('prueba');
