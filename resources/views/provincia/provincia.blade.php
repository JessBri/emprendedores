@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4 class="text-center my-4">Lista de Provincias</h4>
            </div>
            <div class="col-8">
                <div style="display: none">{{ $cont = 0 }}</div>
                @if (count($provincias) > 0)
                    <a href="{{ route('viewCrearProvincia') }}" class="mb-4 float-right pr-5"><i
                            class="bi bi-plus-circle"></i>
                        Nueva</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col"></th>
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
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-10 text-center caja-vacia p-5">
                            <h4><i class="bi bi-clipboard-x"></i></h4>
                            <p>Aún no tienes provincias registradas</p>
                            <a href="{{ route('viewCrearProvincia') }}" class=""><i
                                    class="bi bi-plus-circle"></i>
                                Nueva provincia</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/provincia/provincia.js') }}"></script>
@endsection
