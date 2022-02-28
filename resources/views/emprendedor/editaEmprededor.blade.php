@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <i class="bi bi-person-circle"></i> Perfil de {{ $emprendedor->nombreEmprendedor}} {{ $emprendedor->apellidoEmprendedor}}
                </div>
                <div class="card-body">
                    <br>
                    <center><p>Puedes modificar esta información haciendo click en "Editar mi perfil" en la parte final del formulario</p></center>
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
                        action="{{ route('editaEmprendedor') }}">
                        @csrf
                        <div class="form-group">
                            <label for="identificacionEmprendedor">Identificación</label>
                            <input type="text" id="identificacionEmprendedor" name="identificacionEmprendedor"
                                placeholder="Ingrese la identificación del emprendedor" class="form-control" value="{{ $emprendedor->identificacionEmprendedor }}">
                        </div>
                        <div class="form-group">
                            <label for="nombreEmprendedor">Nombre</label>
                            <input type="text" id="nombreEmprendedor" name="nombreEmprendedor"
                                placeholder="Ingrese el nombre del emprendedor" class="form-control" value="{{ $emprendedor->nombreEmprendedor }}">
                        </div>
                        <div class="form-group">
                            <label for="apellidoEmprendedor">Apellido</label>
                            <input type="text" id="apellidoEmprendedor" name="apellidoEmprendedor"
                                placeholder="Ingrese el apellido del emprendedor" class="form-control" value="{{ $emprendedor->apellidoEmprendedor }}">
                        </div>
                        <div class="form-group">
                            <label for="apellidoEmprendedor">E-mail</label>
                            <input type="text" id="correoEmprendedor" name="correoEmprendedor"
                                placeholder="Ingrese el correo electronico del emprendedor" class="form-control" value="{{ $emprendedor->correoEmprendedor }}">
                        </div>
                        <div class="form-group">
                            <label for="razonSocialEmprendedor">Razón Social</label>
                            <input type="text" id="razonSocialEmprendedor" name="razonSocialEmprendedor"
                                placeholder="Ingrese el apellido del emprendedor" class="form-control" value="{{ $emprendedor->razonSocialEmprendedor }}">
                        </div>
                        <div class="form-group">
                            <label for="paginaWebEmprendedor">Página web</label>
                            <input type="text" id="paginaWebEmprendedor" name="paginaWebEmprendedor"
                                placeholder="Ingrese la pagina web del emprendedor" class="form-control" value="{{ $emprendedor->paginaWebEmprendedor }}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block"><i class="bi bi-pencil-square"></i> Editar
                            Emprendedor</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@section('scripts')
    <script src="{{ asset('js/validacion/emprendedor.js') }}"></script>
@endsection
