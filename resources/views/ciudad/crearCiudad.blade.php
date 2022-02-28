@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br><br><br>
                <h5>Crea una Ciudad</h5>
                <br>
                <div class="offset-md-2 col-md-8">
                    <form id="formCrearCiudad" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="col-12 my-2">
                                <label for="idProvincia">Provincia <span class="spansito">*</span></label>
                                <select class="form-control custom-select" name="idProvincia" id="provincias">
                                    <option value="">Seleccione una provincia</option>
                                    @foreach ($provincias as $key => $value)
                                        <option value="{{ $value->idProvincia }}">
                                            {{ $value->nombreProvincia }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 my-2">
                                <label for="nombreCiudad" class="">Nombre de ciudad</label>
                                <input type="text" class="form-control" id="nombreCiudad" name="nombreCiudad"
                                    placeholder="Ingrese un nombre de ciudad">
                            </div>
                        </div>
                        <center><button class="btn btn-primary" type="submit" id="formCrearCiudad"><i
                                    class="bi bi-box-arrow-in-right"></i> Guardar</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/ciudad/crearCiudad.js') }}"></script>
@endsection
