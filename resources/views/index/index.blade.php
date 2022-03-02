@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mt-4">
                <form action="{{ route('index') }}" method="get" onsubmit="return showLoad()">

                    <div class="input-group mb-3">
                        <input name="buscarpor" class="form-control mr-sm-2" type="text" placeholder="Buscar por nombre"
                            aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                                class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @if (count($elementos) > 0)
                @foreach ($elementos as $elemento)
                    <div class="col-md-6 px-4 mt-3">
                        <div class="row caja px-3 py-3">
                            <div class="col-7">
                                <h5 class="card-title mt-3">{{ $elemento->nombreElemento }}</h5>
                                <h4>$ {{ $elemento->precioElemento }}</h4>
                                <a href="{{ route('detalleElemento', $elemento->idElemento) }}"
                                    class="btn btn-primary btn-block mt-3"><i class="bi bi-bag-plus"></i> Ver más</a>
                            </div>
                            <div class="col-5">
                                <img src="{{ $elemento->imagenElemento->urlImagen }}" class="card-img-top"
                                    alt="{{ $elemento->imagenElemento->nombreImagen }}" />
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
