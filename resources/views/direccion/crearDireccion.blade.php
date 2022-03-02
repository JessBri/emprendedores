@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h5><a href="{{ route('direccion') }}" class="float-left"><i class="bi bi-arrow-left-circle"></i></a>
                </h5>
                <h5 class="text-center">Crea una dirección</h5>
            </div>
            <div class="col-md-8 caja p-5 mt-3 mb-5">
                <form id="formDireccion" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-6 mb-2">
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
                        <div class="col-6 mb-2">
                            <label for="idCiudad">Ciudad <span class="spansito">*</span></label>
                            <select class="form-control custom-select" name="idCiudad" id="ciudades">
                                <option value="">Seleccione una ciudad</option>
                            </select>
                        </div>
                        <div class="col-12 my-2">
                            <label for="direccionDireccion" class="">Dirección <span
                                    class="spansito">*</span></label>
                            <input type="text" class="form-control" id="direccionDireccion" name="direccionDireccion"
                                placeholder="">
                        </div>
                        <div class="col-12 my-2">
                            <label for="telefonoDireccion" class="">Teléfono <span
                                    class="spansito">*</span></label>
                            <input type="text" class="form-control" id="telefonoDireccion" name="telefonoDireccion"
                                placeholder="">
                        </div>
                        <div class="col-12 my-2">
                            <label for="nombreDireccion" class="">Nombre <span
                                    class="spansito">*</span></label>
                            <input type="text" class="form-control" id="nombreDireccion" name="nombreDireccion"
                                placeholder="Ej: Sucursal 1">
                        </div>
                        <div class="col-12 mt-4">
                            <center><button class="btn btn-primary w-75" type="submit"><i class="bi bi-save pr-2"></i>
                                    Guardar</button></center>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/direccion/validacionDireccion.js') }}"></script>
    <script src="{{ asset('js/direccion/crearDireccion.js') }}"></script>
@endsection
