@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <center>
                    <h5><i class="bi bi-exclamation-circle"></i> Módulo de cambio de contraseña</h5>
                </center>
                <br>
                <div class="offset-md-2 col-md-8">
                    <br>
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <form id="formCambioContrasena" method="POST" action="{{ route('editaPasswordEmprendedor') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Contraseña</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="contrasenaEmprendedor"
                                    name="contrasenaEmprendedor" placeholder="Ingrese su contraseña">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Confirmación Contraseña</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="confirmaContrasenaEmprendedor"
                                    name="confirmaContrasenaEmprendedor" placeholder="Repita su contraseña">
                            </div>
                        </div>
                        <br>
                        <center><button class="btn btn-primary btn-block" type="submit" id="submitFormCambioContrasena"><i class="bi bi-pencil-square"></i> Cambiar contraseña</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('js/login/validacionCambioContrasena.js') }}"></script>
@endsection
