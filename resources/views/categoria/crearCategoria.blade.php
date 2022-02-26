@extends('plantilla')

@section('contenidoPrincipal')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br><br><br>
            <h5>Crea una Categoría</h5>
            <br>
            <div class="offset-md-2 col-md-8">
                <form id="formCrearCategoria" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="nombreCategoria" class="col-sm-3 col-form-label">Nombre de categoría</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nombreCategoria" name="nombreCategoria" placeholder="Ingrese un nombre de categoría">
                        </div>
                    </div>
                    <center><button class="btn btn-primary" type="submit" id="submitFormCrearCategoria"><i class="bi bi-box-arrow-in-right"></i> Guardar</button></center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/categoria/crearCategoria.js') }}"></script>
@endsection
