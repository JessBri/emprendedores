@extends('plantilla')

@section('contenidoPrincipal')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center my-4">Lista de direcciones</h4>
            </div>
            <div class="col-md-12">
                <a href="{{ route('viewCrearDireccion') }}" class="mb-4 float-right pr-5"><i class="bi bi-plus-circle"></i>
                    Nueva dirección</a>
            </div>
            <div class="col-12">
                <div style="display: none">{{ $cont = 0 }}</div>
                @if (count($direcciones) > 0)
                    {{-- <div class="container">
                <div class="row">
                    @foreach ($direcciones as $direccion)
                    <div class="col-6">
                        <div class="align-items-baseline  mx-auto pt-2 w-100" style="height: auto; min-height: 106px; border: 1px solid red;
    border-radius: 4px;">
                        <div class="d-flex mt-2 pl-3">
                            <p>{{$direccion->nombreDireccion}}</p>
                            <div class="position-absolute cursor-pointer" style="right:50px;">
                                <i class="bi bi-pencil-fill"></i>
                            </div>
                            <div class="position-absolute cursor-pointer" style="right:25px;">
                                <i class="bi bi-trash3-fill"></i>
                            </div>
                        </div>
                        <p class="mb-0 font-size-13 text-azuloscuro-movistar text-left px-3">
                            {{$direccion->direccionDireccion}}
                        </p>
                        <p class="mb-0 font-size-13 text-azuloscuro-movistar text-left px-3">
                            {{$direccion->telefonoDireccion}}
                        </p>
                        <p class="font-size-13 text-gris-movistar-4 text-left px-3">{{ $direccion->ciudades->provincias->nombreProvincia }} -
                            {{ $direccion->ciudades->nombreCiudad }}</p>
                    </div>
                    </div>
                    @endforeach
                </div>
             </div> --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Ciudad</th>
                                <th scope="col">Provincia</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($direcciones as $direccion)
                                <tr>
                                    <th scope="row">{{ ++$cont }}</th>
                                    <td>{{ $direccion->direccionDireccion }}</td>
                                    <td>{{ $direccion->telefonoDireccion }}</td>
                                    <td>{{ $direccion->ciudades->nombreCiudad }}</td>
                                    <td>{{ $direccion->ciudades->provincias->nombreProvincia }}</td>
                                    <td><a href="{{ route('viewEditarDireccion', $direccion->idDireccion) }}"
                                            class=""><i class="bi bi-pencil-fill"></i></a>
                                        <a class="borrarDireccion">
                                            <p class="idDireccion" hidden>{{ $direccion->idDireccion }}</p>
                                            <p class="nombreDireccion" hidden>{{ $direccion->nombreDireccion }}</p>
                                            <i class="bi bi-trash3-fill"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                @if (count($direcciones) == 0)
                    <h5>
                        <center>No existen direcciones registradas</center>
                    </h5>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/direccion/direccion.js') }}"></script>
@endsection
