@extends('plantilla')


@section('contenidoPrincipal')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div id="idProvincia" style="display: none">{{ $provincia->idProvincia }}</div>
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-edit"></i> Editar Provincia</span>
                    </div>
                    <div class="card-body">
                        <form id="formEditaProvincia" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="nombreProvincia" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nombreProvincia" name="nombreProvincia"
                                        placeholder="Ingrese un nombre de provincia"
                                        value="{{ $provincia->nombreProvincia }}">
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block" type="submit"><i class="far fa-edit"></i>
                                Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/provincia/editarProvincia.js') }}"></script>
@endsection
