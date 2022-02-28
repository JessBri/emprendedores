@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br><br><br>
                <div id="idDireccion" style="display: none">{{ $direccion->idDireccion }}</div>
                <div id="idProvinciaSelect" style="display: none">{{ $direccion->ciudades->provincias->idProvincia }}
                </div>
                <h5><a href="{{ route('direccion') }}" class=""><i class="bi bi-arrow-left-circle"></i></a>
                    Editar Dirección</h5>
                <br>
                <div class="offset-md-2 col-md-8">
                    <form id="formEditarDireccion" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="col-12 my-2">
                                <label for="idProvincia">Provincia <span class="spansito">*</span></label>
                                <select class="form-control custom-select" name="idProvincia" id="provincias"
                                    value="{{ $direccion->ciudades->provincias->idProvincia }}">
                                    <option value="">Seleccione una provincia</option>
                                    @foreach ($provincias as $key => $value)
                                        @if ($value->idProvincia == $direccion->ciudades->provincias->idProvincia)
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
                                <label for="idCiudad">Ciudad <span class="spansito">*</span></label>
                                <select class="form-control custom-select" name="idCiudad" id="ciudades">
                                    <option value="">Seleccione una ciudad</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="direccionDireccion" class="">Dirección</label>
                                <input type="text" class="form-control" id="direccionDireccion" name="direccionDireccion"
                                    placeholder="" value="{{ $direccion->direccionDireccion }}">
                            </div>
                            <div class="col-12">
                                <label for="telefonoDireccion" class="">Teléfono</label>
                                <input type="text" class="form-control" id="telefonoDireccion" name="telefonoDireccion"
                                    placeholder="" value="{{ $direccion->telefonoDireccion }}">
                            </div>
                            <div class="col-12">
                                <label for="nombreDireccion" class="">Nombre</label>
                                <input type="text" class="form-control" id="nombreDireccion" name="nombreDireccion"
                                    placeholder="" value="{{ $direccion->nombreDireccion }}">
                            </div>
                            <center><button class="btn btn-primary" type="submit" id="formEditarDireccion"><i
                                        class="bi bi-box-arrow-in-right"></i> Guardar</button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/direccion/editarDireccion.js') }}"></script>
@endsection
