@extends('plantilla')

@section('contenidoPrincipal')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br><br><br>
            <h5>Categorías !!!!!!</h5>
            <br>
        </div>
        <div class="col-12">
            <div style="display: none">{{ $cont =0 }}</div>
             @if (count($categorias) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                <tr>
                                    <th scope="row">{{ ++$cont }}</th>
                                    <td>{{ $categoria->nombreCategoria }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{route('viewEditarCategoria', $categoria->idCategoria)}}" class="btn btn-warning">Editar</a>
                                            <a class="btn btn-danger borrarLugar">
                                                <p class="idCategoria" hidden>{{$categoria->idCategoria}}</p>
                                                <p class="nombreCategoria" hidden>{{$categoria->nombreCategoria}}</p>
                                                Borrar
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if (count($categorias) == 0)
                        <h5><center>No existen categorias registradas</center></h5>
                    @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/categoria/categoria.js') }}"></script>
@endsection