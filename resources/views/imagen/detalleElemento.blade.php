@extends('plantilla')

@section('contenidoPrincipal')

    <div class="container">
        <div class="col-md-12">
            <br>
            <center>
                <h3>{{ $elemento->nombreElemento }} - $ {{ $elemento->precioElemento }}</h3>
            </center>
            <br>
        </div>
    </div>
    <div class="container">
        <div class="card-columns">
            @foreach ($imagenes as $key => $value)
            <div class="card">
                <a href="{{ asset("$value->urlImagen") }}" title="{{ $elemento->nombreElemento }}">
                    <img class="card-img img-fluid" src="{{ asset("$value->urlImagen") }}" alt="Card image">
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <div class="col-md-12">
            <br>
            <center>
                <p>{{ $elemento->descripcionElemento }}</p>
            </center>
            <br>
            <p>Direccion donde encontrar</p>
            @foreach ($direcciones as $key => $value)
            <p>
                {{ $value->nombreDireccion}}
                <br>
                {{ $value->direccionDireccion}}
                <br>
                {{ $value->telefonoDireccion}}
                <br>
                {{ $value->idCiudad->idProvincia->nombreProvincia }} - {{ $value->idCiudad->nombreCiudad }}
            </p>
            @endforeach
        </div>
    </div>
@section('scripts')
    <script src="{{ asset('js/imagen/lstImagen.js') }}"></script>
@endsection
