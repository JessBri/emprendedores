@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br><br><br>
                <h5>Lista de Provincias</h5>
                <br>
                <a href="{{ route('viewCrearProvincia') }}" class="mb-4 float-right pr-5"><i class="bi bi-plus-circle"></i>
                    Nueva</a>
            </div>
            <div class="col-10">
                <div style="display: none">{{ $cont = 0 }}</div>
                @if (count($provincias) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($provincias as $provincia)
                                <tr>
                                    <th scope="row">{{ ++$cont }}</th>
                                    <td>{{ $provincia->nombreProvincia }}</td>
                                    <td><a href="{{ route('viewEditarProvincia', $provincia->idProvincia) }}"
                                            class=""><i class="bi bi-pencil-fill"></i></a>
                                        <a class="borrarProvincia">
                                            <p class="idProvincia" hidden>{{ $provincia->idProvincia }}</p>
                                            <p class="nombreProvincia" hidden>{{ $provincia->nombreProvincia }}</p>
                                            <i class="bi bi-trash3-fill"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                @if (count($provincias) == 0)
                    <h5>
                        <center>No existen provincias registradas</center>
                    </h5>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/provincia/provincia.js') }}"></script>
@endsection
