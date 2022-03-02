@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br><br><br>
                <h5><a href="{{ route('elemento') }}" class=""><i class="bi bi-arrow-left-circle"></i></a>
                    Crea un Artículo</h5>
                <br>
                <div class="offset-md-2 col-md-8">
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
                    <form id="formElemento" method="POST" action="{{ route('nuevoElemento') }}">
                        @csrf
                        <div class="form-row">
                            <div class="col-12">
                                <label for="nombreElemento" class="">Nombre</label>
                                <input type="text" class="form-control" id="nombreElemento" name="nombreElemento"
                                    placeholder="">
                            </div>
                            <div class="col-12">
                                <label for="descripcionElemento" class="">Descripción</label>
                                <input type="text" class="form-control" id="descripcionElemento"
                                    name="descripcionElemento" placeholder="">
                            </div>
                            <div class="col-12">
                                <label for="precioElemento" class="">Precio</label>
                                <input type="text" class="form-control" id="precioElemento" name="precioElemento"
                                    placeholder="">
                            </div>
                            <div class="col-12 my-2">
                                <label for="estadoElemento">Estado <span class="spansito">*</span></label>
                                <select class="form-control custom-select" name="estadoElemento" id="estadoElemento">
                                    <option value="">Establezca el estado ..</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                            <div class="col-12 my-2">
                                <label for="idCategoria">Categoría <span class="spansito">*</span></label>
                                <select class="form-control custom-select" name="idCategoria" id="idCategoria">
                                    <option value="">Seleccione una categoria</option>
                                    @foreach ($categorias as $key => $value)
                                        <option value="{{ $value->idCategoria }}">
                                            {{ $value->nombreCategoria }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 my-2">
                                <label for="tipoElemento">Tipo <span class="spansito">*</span></label>
                                <select class="form-control custom-select" name="tipoElemento" id="tipoElemento">
                                    <option value="">Establezca el tipo ..</option>
                                    <option value="producto">Producto</option>
                                    <option value="servicio">Servicio</option>
                                    <option value="evento">Evento</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="fechaInicioFecha" class="">Fecha inicio</label>
                                <input type="text" class="form-control" id="fechaInicioFecha"
                                    name="fechaInicioFecha" placeholder="">
                            </div>
                            <div class="col-12" style="padding-bottom: 20px;">
                                <label for="fechaFinFecha" class="">Fecha fin</label>
                                <input type="text" class="form-control" id="fechaFinFecha" name="fechaFinFecha"
                                    placeholder="">
                            </div>
                            <button class="btn btn-primary btn-block" type="submit" id="submitFormElemento"><i class="bi bi-box-arrow-in-right"></i> Registrar Artículo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/elemento/validarElemento.js') }}"></script>
    <script src="{{ asset('js/elemento/crearElemento.js') }}"></script>
@endsection
