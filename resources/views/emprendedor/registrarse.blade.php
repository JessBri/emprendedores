@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <i class="bi bi-person-plus-fill"></i> Formulario de registro de emprendedor
                </div>
                <div class="card-body">
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
                    <form name="formEmprendedor" id="formEmprendedor" method="post"
                        action="{{ route('nuevoEmprendedor') }}">
                        @csrf
                        <div class="form-group">
                            <label for="identificacionEmprendedor">Identificación</label>
                            <input type="text" id="identificacionEmprendedor" name="identificacionEmprendedor"
                                placeholder="Ingrese la identificación del emprendedor" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nombreEmprendedor">Nombre</label>
                            <input type="text" id="nombreEmprendedor" name="nombreEmprendedor"
                                placeholder="Ingrese el nombre del emprendedor" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="apellidoEmprendedor">Apellido</label>
                            <input type="text" id="apellidoEmprendedor" name="apellidoEmprendedor"
                                placeholder="Ingrese el apellido del emprendedor" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="razonSocialEmprendedor">Razón Social</label>
                            <input type="text" id="razonSocialEmprendedor" name="razonSocialEmprendedor"
                                placeholder="Ingrese el apellido del emprendedor" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="contrasenaEmprendedor">Contraseña</label>
                            <input type="password" id="contrasenaEmprendedor" name="contrasenaEmprendedor"
                                placeholder="Ingrese la contraseña del emprendedor" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="confContrasenaEmprendedor">Confirmación contraseña</label>
                            <input type="password" id="confContrasenaEmprendedor" name="confContrasenaEmprendedor"
                                placeholder="Confirme la contraseña del emprendedor" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="paginaWebEmprendedor">Página web</label>
                            <input type="text" id="paginaWebEmprendedor" name="paginaWebEmprendedor"
                                placeholder="Ingrese la pagina web del emprendedor" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block"><i class="bi bi-person-plus"></i> Registrar
                            Emprendedor</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@section('scripts')
    <script src="{{ asset('js/validacion/emprendedor.js') }}"></script>
@endsection
