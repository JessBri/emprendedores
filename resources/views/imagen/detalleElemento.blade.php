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
            <p class="my-4 text-center">{{ $elemento->descripcionElemento }}</p>

        </div>
        <div class="col-md-6">
            <h5><b>Encuentranos en :</b></h5>
            @foreach ($direcciones as $key => $value)
                <div class="mb-3 pb-2 border-bottom">
                    <p class="mb-0"><i class="bi bi-shop"></i> <b>{{ $value->nombreDireccion }}</b></p>
                    <p class="mb-0">{{ $value->direccionDireccion }}</p>
                    <p class="mb-0"><i class="bi bi-telephone"></i> {{ $value->telefonoDireccion }}</p>
                    <p class="mb-0">{{ $value->idCiudad->idProvincia->nombreProvincia }} -
                        {{ $value->idCiudad->nombreCiudad }}</p>
                </div>
            @endforeach
        </div>
    </div>
@section('scripts')
    <script src="{{ asset('js/imagen/lstImagen.js') }}"></script>
@endsection
