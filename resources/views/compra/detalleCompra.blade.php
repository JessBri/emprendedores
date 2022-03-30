@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 px-5">
                <h3 class="text-center mt-4 title">Resumen de compra</h3>
                <div class="row mt-4">
                    <div class="col-6">
                        <h4 class="text-azul bold">{{ $compra->elementos->nombreElemento }}</h4>
                    </div>
                    <div class="col-6 text-right">
                        @if ($compra->elementos->precioElemento == '0.00')
                            <h4 class="bold">Gratis</h4>
                        @else
                            <h4 class="bold">$ {{ $compra->elementos->precioElemento }}</h4>
                        @endif
                    </div>
                    <div class="col-12">
                        <p class="mb-0 mt-2">Cantidad: <b>{{ $compra->cantidadCompra }}</b></p>
                        <p>Fecha de compra: <b>{{ $compra->created_at }}</b></p>
                    </div>

                </div>

                <div class="caja p-5">
                    <h4 class="bold text-center mb-4">Datos de contacto</h4>
                    <p><b>Publicado por:</b> {{ $vendedor->nombreEmprendedor }}
                        {{ $vendedor->apellidoEmprendedor }}</p>
                    <h5><b>Nuestros locales :</b></h5>
                    @foreach ($direcciones as $key => $value)
                        <div class="mb-3 pb-2 border-bottom">
                            <p class="mb-0"><i class="bi bi-shop"></i>
                                <b>{{ $value->nombreDireccion }}</b>
                            </p>
                            <p class="mb-0">{{ $value->direccionDireccion }}</p>
                            <p class="mb-0"><i class="bi bi-telephone"></i> {{ $value->telefonoDireccion }}
                            </p>
                            <p class="mb-0">{{ $value->idCiudad->idProvincia->nombreProvincia }} -
                                {{ $value->idCiudad->nombreCiudad }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="mb-5">
                    <p class="mb-0 pt-5 bold">Califica esta compra:</p>
                    <p id="idCompra" style="display: none">{{ $compra->idCompra }}</p>
                    <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio"
                            name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating"
                            value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1"
                            id="1"><label for="1">☆</label>
                    </div>
                    <center><button type="button" class="btn btn-success px-5 mt-3" id="btnCalificar">
                            Calificar
                        </button></center>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/imagen/compra.js') }}"></script>
@endsection
