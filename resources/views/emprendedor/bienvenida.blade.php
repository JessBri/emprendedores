@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="col-md-12">
            <h4><i class="bi bi-emoji-laughing"></i> Bienvenido {{ $emprendedor->nombreEmprendedor }} {{ $emprendedor->apellidoEmprendedor }} </h4>
            <br>
            <p>Su cuenta ha sido confirmada y activada con exito.</p>
        </div>
    </div>


