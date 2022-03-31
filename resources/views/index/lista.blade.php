@extends('plantilla')

@section('contenidoPrincipal')
    <div class="row">
        <div class="col-12 text-center">
            <img src="/img/banner2.jpg" class="w-100" />
        </div>

    </div>


    <div class="container">
        @if (count($elementos) > 0)
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 mt-4">
                    @if ($idCategoria != '')
                        <form action="{{ route('porCategoria', $idCategoria) }}" method="get"
                            onsubmit="return showLoad()">

                            <div class="input-group mb-3">
                                <input name="buscarpor" class="form-control" type="text" placeholder="Buscar ..."
                                    aria-label="Search">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                                        class="bi bi-search"></i></button>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('buscador') }}" method="get" onsubmit="return showLoad()">

                            <div class="input-group mb-3">
                                <input name="buscarpor" class="form-control" type="text" placeholder="Buscar ..."
                                    aria-label="Search">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                                        class="bi bi-search"></i></button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
            <div class="row mb-5">

                @foreach ($elementos as $elemento)
                    <div class="col-md-12 px-md-4 mt-3">
                        <div class="row caja productos px-3 py-3">
                            <div class="col-7 col-md-10">
                                <a href="{{ route('detalleElemento', $elemento->idElemento) }}" class="mt-3">
                                    <h4 class="bold mt-3">{{ $elemento->nombreElemento }}</h4>
                                </a>
                                @if ($elemento->precioElemento == '0.00')
                                    <h4>Gratis</h4>
                                @else
                                    <h4>$ {{ $elemento->precioElemento }}</h4>
                                @endif
                            </div>
                            <div class="col-5 col-md-2 align-self-center">
                                <img src="{{ '/' . $elemento->imagenElemento->urlImagen }}" class="rounded"
                                    alt="{{ $elemento->imagenElemento->nombreImagen }}" style="width: 130px" />
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @endif
        @if (count($elementos) == 0)
            @if (session('usuarioConectado') && session('usuarioConectado')['tipoEmprendedor'] == 'emprendedor')
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8 text-center caja-vacia p-5">
                        <h4><i class="bi bi-clipboard-x icon-rojo"></i></h4>
                        <p>Aún no tienes artículos registrados</p>
                        <a href="{{ route('viewCrearElemento') }}" class=""><i
                                class="bi bi-plus-circle"></i>
                            Nuevo artículo</a>
                    </div>
                </div>
            @endif
        @endif

    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/index/index.js') }}"></script>
@endsection
