@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <center>
                    <h5><i class="bi bi-door-open"></i> Inicia sesión en Emprendedores</h5>
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
                    <form id="formLogin" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="correoEmprendedor" class="col-sm-3 col-form-label">Usuario</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="correoEmprendedor" name="correoEmprendedor"
                                    placeholder="Ingrese su nombre de usuario">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Contraseña</label>
                            <div class="col-sm-9">
                                <div id="hff" style="display: none"></div>
                                <input type="password" class="form-control" id="contrasenaEmprendedor"
                                    name="contrasenaEmprendedor" placeholder="Ingrese su contraseña">
                            </div>
                        </div>
                        <br>
                        <center><button class="btn btn-primary btn-block" type="submit" id="submitFormLogin"><i
                                    class="bi bi-box-arrow-in-right"></i> Iniciar Sesión</button></center>
                    </form>
                    <a href="#" data-toggle="modal" data-target="#recuperaCuenta">
                        <p style="text-align:end">Olvidaste la contraseña</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="recuperaCuenta" tabindex="-1" role="dialog" aria-labelledby="myModal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-block" style="text-align: center;">
                    <div class="d-flex">
                        <h5 class='col-12 modal-title text-center'>
                            <i class="bi bi-envelope-check"></i> Recupera contraseña emprendedor
                        </h5>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="formRecuperacion" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="correoRecuperacion" class="col-sm-3 col-form-label">Correo electrónico</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="correoRecuperacion"
                                        name="correoRecuperacion" placeholder="Ingrese el correo electrónico">
                                </div>
                            </div>
                        </form>
                        <center><button class="btn btn-primary btn-block" id="enviaCorreoRecuperacion"><i class="bi bi-envelope"></i> Enviar correo de recuperación</button></center>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i>
                        Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/login/validacionLogin.js') }}"></script>
    <script src="{{ asset('js/login/login.js') }}"></script>
@endsection
