@extends('plantilla')

@section('contenidoPrincipal')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4 class="text-center my-4 title">Lista de direcciones</h4>
            </div>
            <div class="col-12">
                <div style="display: none">{{ $cont = 0 }}</div>
                @if (count($direcciones) > 0)
                    <a href="{{ route('viewCrearDireccion') }}" class="mb-4 float-right pr-5"><i
                            class="bi bi-plus-circle"></i>
                        Nueva dirección</a>
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
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8 text-center caja-vacia p-5">
                            <h4><i class="bi bi-clipboard-x"></i></h4>
                            <p>Aún no tienes direcciones registradas</p>
                            <a href="{{ route('viewCrearDireccion') }}" class=""><i
                                    class="bi bi-plus-circle"></i>
                                Nueva dirección</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/direccion/direccion.js') }}"></script>
@endsection
