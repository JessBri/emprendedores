@extends('plantilla')

@section('contenidoPrincipal')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br><br><br>
                <h5>Lista de Ciudades</h5>
                <br>
                <a href="{{ route('viewCrearCiudad') }}" class="mb-4 float-right pr-5"><i class="bi bi-plus-circle"></i>
                    Nueva</a>
            </div>
            <div class="col-12">
                <div style="display: none">{{ $cont = 0 }}</div>
                @if (count($ciudades) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Provincia</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ciudades as $ciudad)
                                <tr>
                                    <th scope="row">{{ ++$cont }}</th>
                                    <td>{{ $ciudad->nombreCiudad }}</td>
                                    <td>{{ $ciudad->provincias->nombreProvincia }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('viewEditarCiudad', $ciudad->idCiudad) }}"
                                                class=""><i class="bi bi-pencil-fill"></i></a>
                                            <a class="borrarCiudad">
                                                <p class="idCiudad" hidden>{{ $ciudad->idCiudad }}</p>
                                                <p class="nombreCiudad" hidden>{{ $ciudad->nombreCiudad }}</p>
                                                <i class="bi bi-trash3-fill"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                @if (count($ciudades) == 0)
                    <h5>
                        <center>No existen ciudades registradas</center>
                    </h5>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/ciudad/ciudad.js') }}"></script>
@endsection
