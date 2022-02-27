@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br><br><br>
                <h5>Crea una Dirección</h5>
                <br>
                <div class="offset-md-2 col-md-8">
                    <form id="formCrearDireccion" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="col-12 my-2">
                                <label for="idProvincia">Provincia <span class="spansito">*</span></label>
                                <select class="form-control custom-select" name="idProvincia" id="provincias">
                                    @foreach ($provincias as $key => $value)
                                        <option value="{{ $value->idProvincia }}">
                                            {{ $value->nombreProvincia }}
                                        </option>
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
                                <label for="direccionDireccion" class="label-holder">Dirección</label>
                                <input type="text" class="form-control input-lh" id="direccionDireccion"
                                    name="direccionDireccion" placeholder="Ingrese una dirección">
                            </div>
                            <div class="col-12">
                                <label for="telefonoDireccion" class="col-sm-3 label-holder">Teléfono</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="telefonoDireccion"
                                        name="telefonoDireccion" placeholder="Ingrese un número de teléfono">
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="nombreDireccion" class="col-sm-3 label-holder">Nombre</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nombreDireccion" name="nombreDireccion"
                                        placeholder="Ej: Sucursal 1">
                                </div>
                            </div>
                            <center><button class="btn btn-primary" type="submit" id="formCrearDireccion"><i
                                        class="bi bi-box-arrow-in-right"></i> Guardar</button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/direccion/crearDireccion.js') }}"></script>
@endsection
