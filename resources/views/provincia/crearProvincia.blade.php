@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br><br><br>
                <h5>Crea una Provincia</h5>
                <br>
                <div class="offset-md-2 col-md-8">
                    <form id="formCrearProvincia" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="nombreProvincia" class="">Nombre de provincia</label>
                            <input type="text" class="form-control" id="nombreProvincia" name="nombreProvincia"
                                placeholder="Ingrese un nombre de provincia">
                        </div>
                        <center><button class="btn btn-primary" type="submit" id="submitFormCrearProvincia"><i
                                    class="bi bi-box-arrow-in-right"></i> Guardar</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/provincia/crearProvincia.js') }}"></script>
@endsection
