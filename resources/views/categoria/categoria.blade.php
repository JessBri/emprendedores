@extends('plantilla')

@section('contenidoPrincipal')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4 class="text-center my-4 title">Lista de categorías</h4>
            </div>
            <div class="col-12 col-md-8">
                <div style="display: none">{{ $cont = 0 }}</div>
                @if (count($categorias) > 0)
                    <a href="{{ route('crearCategoria') }}" class="mb-4 float-right pr-5"><i class="bi bi-plus-circle"></i>
                        Nueva categoría</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <th scope="row">{{ ++$cont }}</th>
                                    <td>{{ $categoria->nombreCategoria }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('viewEditarCategoria', $categoria->idCategoria) }}"
                                                class="pr-2"><i class="bi bi-pencil-fill"></i></a>
                                            <a href="#" class="borrarLugar">
                                                <p class="idCategoria" hidden>{{ $categoria->idCategoria }}</p>
                                                <p class="nombreCategoria" hidden>{{ $categoria->nombreCategoria }}</p>
                                                <i class="bi bi-trash3-fill"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                @if (count($categorias) == 0)
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-10 text-center caja-vacia p-5">
                            <h4><i class="bi bi-clipboard-x"></i></h4>
                            <p>Aún no tienes categorías registradas</p>
                            <a href="{{ route('crearCategoria') }}" class=""><i
                                    class="bi bi-plus-circle"></i>
                                Nueva categoría</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/categoria/categoria.js') }}"></script>
@endsection
