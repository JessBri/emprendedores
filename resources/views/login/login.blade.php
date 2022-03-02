@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br>
                <center>
                    <h5>Inicia sesión</h5>
                </center>
                <br>
            </div>
            <div class="col-md-8 caja mt-3 mb-5 px-5 py-4">
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
                    <div class="form-row">
                        <div class="col-12 mb-2">
                            <label for="correoEmprendedor">Usuario <span class="spansito">*</span></label>
                            <input type="text" class="form-control" id="correoEmprendedor" name="correoEmprendedor"
                                placeholder="">
                        </div>
                        <div class="col-12 my-2">
                            <label for="password">Contraseña <span class="spansito">*</span></label>
                            <div id="hff" style="display: none"></div>
                            <input type="password" class="form-control" id="contrasenaEmprendedor"
                                name="contrasenaEmprendedor" placeholder="">
                        </div>
                        <div class="col-12 mt-4">
                            <center><button class="btn btn-primary btn-block" type="submit" id="submitFormLogin"><i
                                        class="bi bi-box-arrow-in-right"></i> Iniciar Sesión</button></center>
                        </div>
                    </div>
                </form>
                <a href="#" class="mt-2" data-toggle="modal" data-target="#recuperaCuenta">
                    <p class="mt-2" style="text-align:end">Olvidaste tu contraseña</p>
                </a>
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
                        <center><button class="btn btn-primary btn-block" id="enviaCorreoRecuperacion"><i
                                    class="bi bi-envelope"></i> Enviar correo de recuperación</button></center>
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
