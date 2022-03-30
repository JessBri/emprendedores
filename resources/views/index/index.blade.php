@extends('plantilla')

@section('contenidoPrincipal')
    <div class="row">
        <div class="col-12 text-center">
            <img src="img/banner2.jpg" class="w-100" />
        </div>

    </div>
    <div class="row justify-content-center sectionCategoria">
        <div class="col-12 col-md-8 mt-4">
            <form action="{{ route('buscador') }}" method="get" onsubmit="return showLoad()">

                <div class="input-group mb-3">
                    <input name="buscarpor" class="form-control" type="text" placeholder="Buscar productos, servicios ..."
                        aria-label="Search">
                    <button class="btn btn-secondary" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center pb-5 sectionCategoria">
        <div class="col-md-9">
            <h4 class="title text-center my-5">Selecciona una categoria</h4>
            <div class="row">
                @foreach ($categorias as $categoria)
                    <a class="col-2 caja categorias text-center" style="width:170px; height:170px;"
                        href="{{ route('porCategoria', $categoria->idCategoria) }}">
                        <div class="my-4">
                            @php
                                $imagen = '/img/' . $categoria->nombreCategoria . '.svg';
                            @endphp
                            <img class="mt-2" src="{{ $imagen }}" width="48px" height="48px" />
                            <p class="mt-3">{{ $categoria->nombreCategoria }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row justify-content-center py-5">
        <div class="col-5 text-center px-5">
            <h3 class="my-3">Emprendedores</h3>
            <h5 class="mt'2">Emprendedores es una aplicación web en la que puedes vender y comprar los productos y
                servicios que necesites.
            </h5>
            <h5>Aquí puedes ver el total de los artículos que tenemos actualmente
            </h5>
            <i class="bi bi-arrow-right text-azul" style="font-size: 40px"></i>
        </div>
        <div class="col-5 text-center">
            <div class="chart-container">
                <canvas id="oilChart" class="mx-auto"></canvas>
            </div>
        </div>
    </div>

    @if (session('usuarioConectado') && session('usuarioConectado')['tipoEmprendedor'] == 'emprendedor')
        <div id="contProductos" hidden>{{ count($contProductos) }}</div>
        <div id="contServicios" hidden>{{ count($contServicios) }}</div>
        <div id="contEventos" hidden>{{ count($contEventos) }}</div>
    @else
        <div id="contProductos" hidden>{{ $contProductos }}</div>
        <div id="contServicios" hidden>{{ $contServicios }}</div>
        <div id="contEventos" hidden>{{ $contEventos }}</div>
    @endif




    <div class="row justify-content-center py-5 sectionCategoria">
        <div class="col-3 info-slide text-center">
            <div class="img-container"><img
                    src="https://http2.mlstatic.com/resources/frontend/homes-korriban/assets/images/ecosystem/buy-heart.svg"
                    class="img-container" alt="Compra sin moverte"></div>
            <h2 class="my-3">Compra sin moverte</h2>
            <p><span>Encuentra lo que necesitas, y coordina el pago y la entrega con el vendedor. Es fácil y rápido.
                    ¡Todos podemos hacerlo!</span></p>
        </div>
        <div class="col-3 info-slide text-center">
            <div class="img-container"><img
                    src="https://http2.mlstatic.com/resources/frontend/homes-korriban/assets/images/ecosystem/shipping.svg"
                    class="img-container" alt="Recibe tu producto"></div>
            <h2 class="my-3">Recibe tu producto</h2>
            <p><span>Acuerda la entrega de tu compra con el vendedor. Puedes recibirlo en tu casa, en la oficina o
                    retirarlo. ¡Tú decides qué prefieres!</span></p>
        </div>
        <div class="col-3 info-slide text-center">
            <div class="img-container"><img
                    src="https://http2.mlstatic.com/resources/frontend/homes-korriban/assets/images/ecosystem/free-sell.svg"
                    class="img-container" alt="Vende 100% gratis"></div>
            <h2 class="my-3">Vende 100% gratis</h2>
            <p><span>Piensa qué te gustaría vender, publícalo y gana dinero sin gastar ni un centavo. Tendrás
                    publicaciones gratuitas ilimitadas para todo tipo de productos. ¡Anímate!</span></p>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/index/index.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
@endsection
