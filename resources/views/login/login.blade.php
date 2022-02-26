@extends('plantilla')

@section('contenidoPrincipal')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br><br><br>
            <h5>Inicia sesión en Emprendedores</h5>
            <br>
            <div class="offset-md-2 col-md-8">
                <form id="formLogin" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Nombre de usuario</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Ingrese su nombre de usuario">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Contraseña</label>
                        <div class="col-sm-9">
                            <div id="hff" style="display: none"></div>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" >
                        </div>
                    </div>
                    <center><button class="btn btn-primary" type="submit" id="submitFormLogin"><i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión</button></center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/login/login.js') }}"></script>
@endsection
