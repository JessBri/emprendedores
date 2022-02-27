@extends('plantilla')

@section('contenidoPrincipal')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br><br><br>
            <h5>Direcciones !!!!!!</h5>
            <br>
        </div>
        <div class="col-12">
            <div style="display: none">{{ $cont =0 }}</div>
             @if (count($direcciones) > 0)
             <div class="container">
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
                        <p class="font-size-13 text-gris-movistar-4 text-left px-3">{{ $direccion->ciudades->provincias->nombreProvincia }} -
                            {{ $direccion->ciudades->nombreCiudad }}</p>
                    </div>
                    </div>
                    @endforeach
                </div>
             </div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Correo electrónico</th>
                                <th scope="col">Ciudad</th>
                                <th scope="col">Provincia</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($direcciones as $direccion)
                                <tr>
                                    <th scope="row">{{ ++$cont }}</th>
                                    <td>{{ $direccion->direccionDireccion }}</td>
                                    <td>{{ $direccion->telefonoDireccion }}</td>
                                    <td>{{ $direccion->correoDireccion }}</td>
                                    <td>{{ $direccion->ciudades->nombreCiudad }}</td>
                                    <td>{{ $direccion->ciudades->provincias->nombreProvincia }}</td>
                                    <td><i class="bi bi-pencil-fill"></i>
                                        <i class="bi bi-trash3-fill"></i>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if (count($direcciones) == 0)
                        <h5><center>No existen direcciones registradas</center></h5>
                    @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/direccion/direccion.js') }}"></script>
@endsection
