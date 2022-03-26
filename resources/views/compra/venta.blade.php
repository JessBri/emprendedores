@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <h2 class="text-center mt-5 title">Resumen de ventas</h2>
        @if (count($compras) > 0)
            <div id="compras" hidden>{{ $compras }}</div>
            <div class="row justify-content-center mt-4">
                @php
                    $suma = 0;
                    $cantidad = 0;
                @endphp
                <div class="col-7">
                    <div class="row">
                        @foreach ($compras as $compra)
                            <div class="col-md-12 px-4 mt-3">
                                <div class="row caja productos px-3 py-3">
                                    <div class="col-9">
                                        <h4 class="bold mt-3 text-azul">{{ $compra->elementos->nombreElemento }}</h4>
                                        @if ($compra->elementos->precioElemento == '0.00')
                                            <h4>Gratis</h4>
                                        @else
                                            <h4>$ {{ $compra->elementos->precioElemento }}</h4>
                                        @endif
                                        <p class="mb-0 mt-2">Cantidad: <b>{{ $compra->cantidadCompra }}</b></p>
                                        <p class="mb-0">Fecha de venta: <b>{{ $compra->created_at }}</b></p>
                                        <p>Comprador: <b>{{ $compra->idEmprendedor->nombreEmprendedor }}
                                                {{ $compra->idEmprendedor->apellidoEmprendedor }}</b></p>
                                        <h5 class="badge badge-success" style="font-size: 18px">Total:
                                            <b>${{ $compra->elementos->precioElemento * $compra->cantidadCompra }}</b>
                                        </h5>
                                        @php
                                            $suma += $compra->elementos->precioElemento * $compra->cantidadCompra;
                                            $cantidad += $compra->cantidadCompra;
                                        @endphp
                                    </div>
                                    <div class="col-3">
                                        <img src="{{ $compra->elementos->imagenElemento->urlImagen }}"
                                            class="rounded"
                                            alt="{{ $compra->elementos->imagenElemento->nombreImagen }}"
                                            style="width: 130px" />
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-5 px-4 mt-3 ">
                    <div class="contaniner alert alert-success p-5">
                        <div class="row pb-4">
                            <div class="col-7">
                                <h5>Número de ventas:</h5>
                            </div>
                            <div class="col-3 text-right">
                                <h5><span class="bold">{{ count($compras) }}</span></h5>
                            </div>
                        </div>
                        <div class="row border-bottom pb-4">
                            <div class="col-7">
                                <h5>Unidades vendidad:</h5>
                            </div>
                            <div class="col-3 text-right">
                                <h5><span class="bold">{{ $cantidad }}</span></h5>
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-5">
                                <h5>Total:</h5>
                            </div>
                            <div class="col-5 text-right">
                                <h4><span class="bold icon-rojo">${{ $suma }}</span></h4>
                            </div>

                        </div>

                    </div>
                    {{-- <div class="chart-container">
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div> --}}

                </div>

            </div>
        @else
            <div class="row justify-content-center mt-5">
                <div class="col-md-8 text-center caja-vacia p-5">
                    <h4><i class="bi bi-clipboard-x"></i></h4>
                    <p>Aún no has realizado ninguna venta</p>
                </div>
            </div>
        @endif
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/index/venta.js') }}"></script>
@endsection
