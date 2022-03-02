@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="row col-md-12">
            <div class="btn-group btn-block" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-secondary">{{ $contProductos }} Producto(s)</button>
                <button type="button" class="btn btn-secondary">{{ $contServicios }} Servicio(s)</button>
                <button type="button" class="btn btn-secondary">{{ $contEventos }} Evento(s)</button>
            </div>
        </div>
        <br>
        <div class="row col-md-12">
            @if (count($elementos) > 0)
                @foreach ($elementos as $elemento)
                    <div class="col-md-4 caja">
                        <div class="card">
                            <img src="{{ $elemento->imagenElemento->urlImagen }}" class="card-img-top"
                                alt="{{ $elemento->imagenElemento->nombreImagen }}" />
                            <div class="card-body">
                                <h5 class="card-title">{{ $elemento->nombreElemento }}</h5>
                                <p class="card-text">
                                    {{ $elemento->descripcionElemento }}
                                    <span><b>Categoría:</b> {{ $elemento->idCategoria->nombreCategoria }}</span>
                                    <br>
                                    <span><b>Tipo:</b>
                                        @if ($elemento->tipoElemento == 'producto')
                                            Evento
                                        @elseif ($elemento->tipoElemento == 'servicio')
                                            Servicio
                                        @elseif ($elemento->tipoElemento == 'evento')
                                            Evento
                                        @endif
                                    </span>
                                </p>
                                <p class="card-text">
                                    <center>
                                        <h4>$ {{ $elemento->precioElemento }}</h4>
                                    </center>
                                </p>
                                <a href="{{ route('detalleElemento', $elemento->idElemento) }}"
                                    class="btn btn-primary btn-block"><i class="bi bi-bag-plus"></i> Ver más</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
        @if (count($elementos) == 0 && session('usuarioConectado')['tipoEmprendedor'] == 'emprendedor')
            <div class="row justify-content-center mt-5">
                <div class="col-md-8 text-center caja-vacia p-5">
                    <h4><i class="bi bi-clipboard-x"></i></h4>
                    <p>Aún no tienes artículos registrados</p>
                    <a href="{{ route('viewCrearElemento') }}" class=""><i class="bi bi-plus-circle"></i>
                        Nueva artículo</a>
                </div>
            </div>
        @endif
        @if (count($elementos) == 0 && !session('usuarioConectado'))
            <div class="row justify-content-center mt-5">
                <div class="col-md-8 text-center caja-vacia p-5">
                </div>
            </div>
        @endif
    </div>
@endsection
