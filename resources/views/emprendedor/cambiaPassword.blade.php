@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h5 class="text-center mt-3 title">Cambio de contraseña</h5>
            </div>
            <div class="col-md-8 caja px-5 py-4 mt-3 mb-5">
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
                    <div class="form-row">
                        <div class="col-12 mb-2">
                            <label for="password">Contraseña <span class="spansito">*</span></label>
                            <input type="password" class="form-control" id="contrasenaEmprendedor"
                                name="contrasenaEmprendedor" placeholder="">
                        </div>
                        <div class="col-12 my-2">
                            <label for="password">Confirmación Contraseña <span class="spansito">*</span></label>
                            <input type="password" class="form-control" id="confirmaContrasenaEmprendedor"
                                name="confirmaContrasenaEmprendedor" placeholder="">
                        </div>
                        <div class="col-12 my-4">
                            <center><button class="btn btn-primary btn-block" type="submit"
                                    id="submitFormCambioContrasena"><i class="bi bi-pencil-square"></i> Cambiar
                                    contraseña</button></center>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/login/validacionCambioContrasena.js') }}"></script>
@endsection
