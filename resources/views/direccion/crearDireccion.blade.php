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
                    <div class="form-group row">
                        <label for="idProvincia" class="col-sm-2 col-form-label">Provincia</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="idProvincia" id="provincias">
                                <option value="">Seleccione una provincia</option>
                                @foreach ($provincias as $key => $value)
                                    <option value="{{ $value->idProvincia }}">
                                        {{ $value->nombreProvincia }} 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="idCiudad" class="col-sm-2 col-form-label">Ciudad</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="idCiudad" id="ciudades">
                                <option value="">Seleccione una ciudad</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="direccionDireccion" class="col-sm-3 col-form-label">Dirección</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="direccionDireccion" name="direccionDireccion" placeholder="Ingrese una dirección">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefonoDireccion" class="col-sm-3 col-form-label">Teléfono</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="telefonoDireccion" name="telefonoDireccion" placeholder="Ingrese un número de teléfono">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="correoDireccion" class="col-sm-3 col-form-label">Correo electrónico</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="correoDireccion" name="correoDireccion" placeholder="Ingrese un correo electrónico">
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="nombreDireccion" class="col-sm-3 col-form-label">Nombre</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nombreDireccion" name="nombreDireccion" placeholder="Ej: Sucursal 1">
                        </div>
                    </div>
                    <center><button class="btn btn-primary" type="submit" id="formCrearDireccion"><i class="bi bi-box-arrow-in-right"></i> Guardar</button></center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/direccion/crearDireccion.js') }}"></script>
@endsection
