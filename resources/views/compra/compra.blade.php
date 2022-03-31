@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <h2 class="text-center mt-5 title">Mis compras</h2>
        @if (count($compras) > 0)
            <div class="row justify-content-center">

                @foreach ($compras as $compra)
                    <div class="col-12 col-md-10 px-4 mt-3">
                        <div class="row caja productos px-3 py-3">
                            <div class="col-7 col-md-9">
                                <a href="{{ route('detalleCompra', $compra->idCompra) }}" class="mt-3">
                                    <h4 class="bold mt-3">{{ $compra->elementos->nombreElemento }}</h4>
                                </a>
                                @if ($compra->elementos->precioElemento == '0.00')
                                    <h4>Gratis</h4>
                                @else
                                    <h4>$ {{ $compra->elementos->precioElemento }}</h4>
                                @endif
                                <p class="mb-0 mt-2">Cantidad: <b>{{ $compra->cantidadCompra }}</b></p>
                                <p>Fecha de compra: <b>{{ $compra->created_at }}</b></p>
                            </div>
                            <div class="col-5 col-md-3 align-self-center">
                                <img src="{{ $compra->elementos->imagenElemento->urlImagen }}" class="rounded"
                                    alt="{{ $compra->elementos->imagenElemento->nombreImagen }}" style="width: 130px" />
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @else
        @endif
    </div>
@endsection
