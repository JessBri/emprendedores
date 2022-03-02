@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="row col-md-12">
            @if (count($elementos) > 0 )
                @foreach ($elementos as $elemento)
                    <div class="col-md-4 caja">
                        <div class="card">
                            <img src="{{ $elemento->imagenElemento->urlImagen }}" class="card-img-top"
                                alt="{{ $elemento->imagenElemento->nombreImagen }}" />
                            <div class="card-body">
                                <h5 class="card-title">{{ $elemento->nombreElemento }}</h5>
                                <p class="card-text">
                                    {{ $elemento->descripcionElemento }}
                                </p>
                                <p class="card-text">
                                <h4>$ {{ $elemento->precioElemento }}</h4>
                                </p>
                                <a href="{{ route('detalleElemento', $elemento->idElemento) }}"
                                    class="btn btn-primary btn-block"><i class="bi bi-bag-plus"></i> Ver más</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            @if (count($elementos) == 0 && session('usuarioConectado')['tipoEmprendedor'] == 'emprendedor' )
            <div class="row justify-content-center mt-5">
                <div class="col-md-8 text-center caja-vacia p-5">
                    <h4><i class="bi bi-clipboard-x"></i></h4>
                    <p>Aún no tienes artículos registrados</p>
                </div>
            </div>
        @endif
        </div>
    </div>
@endsection
