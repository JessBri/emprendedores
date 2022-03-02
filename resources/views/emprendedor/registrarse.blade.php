@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h5 class="text-center mt-3">Registro de emprendedor</h5>
            </div>
            <div class="col-md-8 caja px-5 py-4 pt-2 mt-3 mb-5">
                <br>
                @if (session()->has('success'))
                    <div class="alert alert-warning">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <form name="formEmprendedor" id="formEmprendedor" method="post" action="{{ route('nuevoEmprendedor') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col-6 mb-2">
                            <label for="identificacionEmprendedor">Identificación <span
                                    class="spansito">*</span></label>
                            <input type="text" id="identificacionEmprendedor" name="identificacionEmprendedor"
                                placeholder="" class="form-control">
                        </div>
                        <div class="col-6 mb-2">
                            <label for="apellidoEmprendedor">E-mail <span class="spansito">*</span></label>
                            <input type="text" id="correoEmprendedor" name="correoEmprendedor" placeholder=""
                                class="form-control">
                        </div>
                        <div class="col-6 my-2">
                            <label for="nombreEmprendedor">Nombre <span class="spansito">*</span></label>
                            <input type="text" id="nombreEmprendedor" name="nombreEmprendedor" placeholder=""
                                class="form-control">
                        </div>
                        <div class="col-6 my-2">
                            <label for="apellidoEmprendedor">Apellido <span class="spansito">*</span></label>
                            <input type="text" id="apellidoEmprendedor" name="apellidoEmprendedor" placeholder=""
                                class="form-control">
                        </div>

                        <div class="col-12 my-2">
                            <label for="contrasenaEmprendedor">Contraseña <span class="spansito">*</span></label>
                            <input type="password" id="contrasenaEmprendedor" name="contrasenaEmprendedor" placeholder=""
                                class="form-control">
                        </div>
                        <div class="col-12 my-2">
                            <label for="confContrasenaEmprendedor">Confirmación contraseña <span
                                    class="spansito">*</span></label>
                            <input type="password" id="confContrasenaEmprendedor" name="confContrasenaEmprendedor"
                                placeholder="" class="form-control">
                        </div>
                        <div class="col-12 my-2">
                            <label for="razonSocialEmprendedor">Razón Social</label>
                            <input type="text" id="razonSocialEmprendedor" name="razonSocialEmprendedor" placeholder=""
                                class="form-control">
                        </div>
                        <div class="col-12 my-2">
                            <label for="paginaWebEmprendedor">Página web</label>
                            <input type="text" id="paginaWebEmprendedor" name="paginaWebEmprendedor" placeholder="https://"
                                class="form-control">
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary btn-block"><i class="bi bi-person-plus"></i>
                                Registrarme</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>

@section('scripts')
    <script src="{{ asset('js/validacion/emprendedor.js') }}"></script>
@endsection
