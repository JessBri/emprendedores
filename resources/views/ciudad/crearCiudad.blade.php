@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h5><a href="{{ route('ciudad') }}" class="float-left"><i class="bi bi-arrow-left-circle"></i></a>
                </h5>
                <h5 class="text-center">Crea una ciudad</h5>
            </div>
            <div class="col-md-8 caja p-5 mt-3 mb-5">
                <form id="formCrearCiudad" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-12 my-2">
                            <label for="idProvincia">Provincia <span class="spansito">*</span></label>
                            <select class="form-control custom-select" name="idProvincia" id="provincias">
                                <option value="">Seleccione una provincia</option>
                                @foreach ($provincias as $key => $value)
                                    <option value="{{ $value->idProvincia }}">
                                        {{ $value->nombreProvincia }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 my-2">
                            <label for="nombreCiudad" class="">Nombre <span
                                    class="spansito">*</span></label>
                            <input type="text" class="form-control" id="nombreCiudad" name="nombreCiudad"
                                placeholder="Ingrese un nombre de ciudad">
                        </div>
                        <div class="col-12 mt-4">
                            <center><button class="btn btn-primary w-75" type="submit" id="formCrearCiudad"><i
                                        class="bi bi-box-arrow-in-right"></i> Guardar</button></center>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/ciudad/crearCiudad.js') }}"></script>
@endsection
