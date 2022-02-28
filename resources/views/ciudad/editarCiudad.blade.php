@extends('plantilla')


@section('contenidoPrincipal')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div id="idCiudad" style="display: none">{{ $ciudad->idCiudad }}</div>
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-edit"></i> Editar Ciudad</span>
                    </div>
                    <div class="card-body">
                        <form id="formEditaCiudad" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col-12 my-2">
                                    <label for="idProvincia">Provincia <span class="spansito">*</span></label>
                                    <select class="form-control custom-select" name="idProvincia" id="provincias">
                                        <option value="">Seleccione una provincia</option>
                                        @foreach ($provincias as $key => $value)
                                            @if ($value->idProvincia == $ciudad->idProvincia)
                                                <option value="{{ $value->idProvincia }}" selected>
                                                    {{ $value->nombreProvincia }}
                                                </option>
                                            @else
                                                <option value="{{ $value->idProvincia }}">
                                                    {{ $value->nombreProvincia }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 my-2">
                                    <label for="nombreCiudad" class="">Nombre</label>
                                    <input type="text" class="form-control" id="nombreCiudad" name="nombreCiudad"
                                        placeholder="Ingrese un nombre de ciudad" value="{{ $ciudad->nombreCiudad }}">
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
    <script src="{{ asset('js/ciudad/editarCiudad.js') }}"></script>
@endsection
