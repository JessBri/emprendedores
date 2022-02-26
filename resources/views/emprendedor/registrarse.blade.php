@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <i class="bi bi-person-plus-fill"></i> Formulario de registro de emprendedor
                </div>
                <div class="card-body">
                    <form name="formEmprendedor" id="formEmprendedor" method="post"
                        action="{{ url('store-form') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Identificación</label>
                            <input type="text" id="title" name="title" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input type="text" id="title" name="title" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Apellido</label>
                            <input type="text" id="title" name="title" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Razón Social</label>
                            <input type="text" id="title" name="title" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contraseña</label>
                            <input type="text" id="title" name="title" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Confirmación contraseña</label>
                            <input type="text" id="title" name="title" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Página web</label>
                            <input type="text" id="title" name="title" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Identificación</label>
                            <input type="text" id="title" name="title" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea name="description" class="form-control" required=""></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@section('scripts')
    <script src="{{ asset('js/validacion/emprendedor.js') }}"></script>
@endsection

