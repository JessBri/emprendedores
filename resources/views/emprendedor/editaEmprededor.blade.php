@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h5 class="text-center mt-3">Perfil de {{ $emprendedor->nombreEmprendedor }}
                    {{ $emprendedor->apellidoEmprendedor }}</h5>
            </div>
            <div class="col-md-8 caja px-5 py-5 mt-3 mb-5">
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
                <form name="formEmprendedor" id="formEmprendedor" method="post" action="{{ route('editaEmprendedor') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col-6 mb-2">
                            <label for="identificacionEmprendedor">Identificación <span
                                    class="spansito">*</span></label>
                            <input type="text" id="identificacionEmprendedor" name="identificacionEmprendedor"
                                placeholder="Ingrese la identificación del emprendedor" class="form-control"
                                value="{{ $emprendedor->identificacionEmprendedor }}">
                        </div>
                        <div class="col-6 mb-2">
                            <label for="apellidoEmprendedor">E-mail <span class="spansito">*</span></label>
                            <input type="text" id="correoEmprendedor" name="correoEmprendedor"
                                placeholder="Ingrese el correo electronico del emprendedor" class="form-control"
                                value="{{ $emprendedor->correoEmprendedor }}">
                        </div>
                        <div class="col-6 my-2">
                            <label for="nombreEmprendedor">Nombre <span class="spansito">*</span></label>
                            <input type="text" id="nombreEmprendedor" name="nombreEmprendedor"
                                placeholder="Ingrese el nombre del emprendedor" class="form-control"
                                value="{{ $emprendedor->nombreEmprendedor }}">
                        </div>
                        <div class="col-6 my-2">
                            <label for="apellidoEmprendedor">Apellido <span class="spansito">*</span></label>
                            <input type="text" id="apellidoEmprendedor" name="apellidoEmprendedor"
                                placeholder="Ingrese el apellido del emprendedor" class="form-control"
                                value="{{ $emprendedor->apellidoEmprendedor }}">
                        </div>
                        <div class="col-12 my-2">
                            <label for="razonSocialEmprendedor">Razón Social</label>
                            <input type="text" id="razonSocialEmprendedor" name="razonSocialEmprendedor"
                                placeholder="Ingrese la razón social del emprendedor" class="form-control"
                                value="{{ $emprendedor->razonSocialEmprendedor }}">
                        </div>
                        <div class="col-12 my-2">
                            <label for="paginaWebEmprendedor">Página web</label>
                            <input type="text" id="paginaWebEmprendedor" name="paginaWebEmprendedor"
                                placeholder="Ingrese la pagina web del emprendedor" class="form-control"
                                value="{{ $emprendedor->paginaWebEmprendedor }}">
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary btn-block"><i class="bi bi-pencil-square"></i>
                                Editar mi perfil</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>

@section('scripts')
    <script src="{{ asset('js/validacion/emprendedor.js') }}"></script>
@endsection
