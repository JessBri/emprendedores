@extends('plantilla')

@section('contenidoPrincipal')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center my-4">Lista de artículos para {{ $emprendedor->nombreEmprendedor }}
                    {{ $emprendedor->apellidoEmprendedor }}</h4>
            </div>
            <div class="col-md-12">
                <a href="{{ route('viewCrearElemento') }}" class="mb-4 float-right pr-5"><i class="bi bi-plus-circle"></i>
                    Nuevo artículo</a>
            </div>
            <div class="col-12">
                <div style="display: none">{{ $cont = 0 }}</div>
                @if (count($elementos) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Estado</th>
                                <th scope="col">F.Inicio</th>
                                <th scope="col">F.Fin</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Opción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($elementos as $elemento)
                                <tr>
                                    <th scope="row">{{ ++$cont }}</th>
                                    <td>{{ $elemento->nombreElemento }}</td>
                                    <td>{{ $elemento->descripcionElemento }}</td>
                                    <td>{{ $elemento->precioElemento }}</td>
                                    <td>
                                        @if ( $elemento->estadoElemento  == 1)
                                            Activo
                                        @else
                                            Inactivo
                                        @endif
                                    </td>
                                    <td>{{ $elemento->fechaInicioElemento }}</td>
                                    <td>{{ $elemento->fechaFinElemento }}</td>
                                    <td>{{ $elemento->categorias->nombreCategoria }}</td>
                                    <td>
                                        <a href="{{ route('imagenElemento', $elemento->idElemento) }}"
                                            class=""><i class="bi bi-zoom-in"></i></a>
                                        <a href="{{ route('viewEditarElemento', $elemento->idElemento) }}"
                                            class=""><i class="bi bi-pencil-fill"></i></a>
                                        <a href="#" class="borrarElemento">
                                            <p class="idElemento" hidden>{{ $elemento->idElemento }}</p>
                                            <p class="nombreElemento" hidden>{{ $elemento->nombreElemento }}</p>
                                            <i class="bi bi-trash3-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                @if (count($elementos) == 0)
                    <h5>
                        <center>No existen articulos registrados</center>
                    </h5>
                @endif
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script src="{{ asset('js/elemento/lstElemento.js') }}"></script>
@endsection
