@extends('plantilla')

@section('contenidoPrincipal')

    <div class="container">
        <div class="col-12 mt-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 px-5">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($imagenes as $key => $value)
                                @if ($key == 0)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                    </li>
                                @else
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"></li>
                                @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($imagenes as $key => $value)
                                @if ($key == 0)
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="{{ asset("$value->urlImagen") }}"
                                            alt="{{ $elemento->nombreElemento }}">
                                    </div>
                                @else
                                    <div class="carousel-item ">
                                        <img class="d-block w-100" src="{{ asset("$value->urlImagen") }}"
                                            alt="{{ $elemento->nombreElemento }}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="text-azul bold mt-4">{{ $elemento->nombreElemento }}</h3>
                    @if ($elemento->precioElemento == '0.00')
                        <h4 class="bold">Gratis</h4>
                    @else
                        <h4 class="bold">$ {{ $elemento->precioElemento }}</h4>
                    @endif
                    <p class="font-cursive"><i class="bi bi-bookmark"></i> {{ $categoria->nombreCategoria }}</p>
                    {{-- <p><b>Publicado por:</b> {{ $emprendedor->nombreEmprendedor }}
                        {{ $emprendedor->apellidoEmprendedor }}</p> --}}

                    <div class="mt-5">
                        <form id="formCompra" method="POST">
                            @csrf
                            <input type="text" class="form-control d-none" id="idElemento" name="idElemento"
                                value="{{ $elemento->idElemento }}">
                            <input type="text" class="form-control d-none" id="idEmprendedor" name="idEmprendedor"
                                value="{{ $emprendedor->idEmprendedor }}">
                            <label for="cantidadElemento">Cantidad
                                <span class="text-gris-3">({{ $elemento->cantidadElemento }}
                                    disponibles)</span></label>
                            <select class="form-control custom-select" name="cantidadCompra" id="cantidadCompra">
                                <option value="1" selected>1 unidad</option>
                                <option value="2">2 unidades</option>
                                <option value="3">3 unidades</option>
                                <option value="4">4 unidades</option>
                                <option value="5">5 unidades</option>
                                <option value="6">6 unidades</option>
                                <option value="7">Más de 6 unidades</option>
                            </select>
                            @if (session('usuarioConectado'))
                                @if (session('usuarioConectado')['tipoEmprendedor'] != 'emprendedor')
                                    <button type="submit" class="btn btn-success float-right px-5 mt-4" id="btnComprar">
                                        <h4 class="my-1"><i class="bi bi-cart-plus"></i>
                                            Comprar ahora</h4>
                                    </button>
                                @endif
                            @else
                                <button type="button" class="btn btn-success float-right px-5 mt-4" id="btnComprarSession">
                                    <h4 class="my-1"><i class="bi bi-cart-plus"></i>
                                        Comprar</h4>
                                </button>
                            @endif
                        </form>
                    </div>




                    <div class="mt-5">
                        @php
                            $promedio = collect($compras)->avg('calificacionCompra');
                        @endphp
                        <p class="mb-0 pt-5">Los usuarios han calificado a este producto:</p>
                        <div class="rating">
                            @if ($promedio == 5)
                                <input type="radio" name="rating" value="5" id="5" checked disabled><label for="5">☆</label>
                            @else
                                <input type="radio" name="rating" value="5" id="5" disabled><label for="5">☆</label>
                            @endif
                            @if ($promedio == 4)
                                <input type="radio" name="rating" value="4" id="4" checked disabled><label for="4">☆</label>
                            @else
                                <input type="radio" name="rating" value="4" id="4" disabled><label for="4">☆</label>
                            @endif
                            @if ($promedio == 3)
                                <input type="radio" name="rating" value="3" id="3" checked disabled><label for="3">☆</label>
                            @else
                                <input type="radio" name="rating" value="3" id="3" disabled><label for="3">☆</label>
                            @endif
                            @if ($promedio == 2)
                                <input type="radio" name="rating" value="2" id="2" checked disabled><label for="2">☆</label>
                            @else
                                <input type="radio" name="rating" value="2" id="2" disabled><label for="2">☆</label>
                            @endif
                            @if ($promedio == 1)
                                <input type="radio" name="rating" value="1" id="1" checked disabled><label for="1">☆</label>
                            @else
                                <input type="radio" name="rating" value="1" id="1" disabled><label for="1">☆</label>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <p class="my-4 text-center">{{ $elemento->descripcionElemento }}</p>

        </div>
        {{-- <div class="col-md-6">
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
        </div> --}}
    </div>
@section('scripts')
    <script src="{{ asset('js/imagen/lstImagen.js') }}"></script>
    <script src="{{ asset('js/imagen/compra.js') }}"></script>
@endsection
