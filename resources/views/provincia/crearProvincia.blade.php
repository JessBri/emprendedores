@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h5><a href="{{ route('provincia') }}" class="float-left"><i class="bi bi-arrow-left-circle"></i></a>
                </h5>
                <h5 class="text-center">Crea una provincia</h5>
            </div>
            <div class="col-md-8 caja p-5 mt-2 mb-5">
                <form id="formCrearProvincia" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-12 mb-2">
                            <label for="nombreProvincia" class="">Nombre <span
                                    class="spansito">*</span></label>
                            <input type="text" class="form-control" id="nombreProvincia" name="nombreProvincia"
                                placeholder="">
                        </div>
                        <div class="col-12 mt-4">
                            <center><button class="btn btn-primary w-75" type="submit" id="submitFormCrearProvincia"><i
                                        class="bi bi-box-arrow-in-right"></i> Guardar</button></center>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/provincia/crearProvincia.js') }}"></script>
@endsection
