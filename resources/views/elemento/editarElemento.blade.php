@extends('plantilla')

@section('contenidoPrincipal')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br><br><br>
                <h5><a href="{{ route('elemento') }}" class=""><i class="bi bi-arrow-left-circle"></i></a>
                    Artículo </h5>
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
                    <form id="formElemento" method="POST" action="{{ route('editarElemento',$elemento->idElemento) }}">
                        @csrf
                        <div class="form-row">
                            <div class="col-12">
                                <label for="nombreElemento" class="">Nombre</label>
                                <input type="text" class="form-control" id="nombreElemento" name="nombreElemento"
                                    placeholder="" value="{{ $elemento->nombreElemento }}">
                            </div>
                            <div class="col-12">
                                <label for="descripcionElemento" class="">Descripción</label>
                                <input type="text" class="form-control" id="descripcionElemento"
                                    name="descripcionElemento" placeholder="" value="{{ $elemento->descripcionElemento }}">
                            </div>
                            <div class="col-12">
                                <label for="precioElemento" class="">Precio</label>
                                <input type="text" class="form-control" id="precioElemento" name="precioElemento"
                                    placeholder="" value="{{ $elemento->precioElemento }}">
                            </div>
                            <div class="col-12 my-2">
                                <div id="ee" style="display: none">{{ $elemento->estadoElemento }}</div>
                                <label for="estadoElemento">Estado <span class="spansito">*</span></label>
                                <select class="form-control custom-select" name="estadoElemento" id="estadoElemento" value="{{ $elemento->estadoElemento }}">
                                    <option value="">Establezca el estado ..</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                            <div class="col-12 my-2">
                                <div id="ic" style="display: none">{{ $elemento->idCategoria }}</div>
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
                            <div id="te">{{ $elemento->tipoElemento }}</div>
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
                                <div id="fie" style="display: none">{{ $elemento->fechaInicioElemento }}</div>
                                <input type="text" class="form-control" id="fechaInicioFecha"
                                    name="fechaInicioFecha" placeholder="">
                            </div>
                            <div class="col-12" style="padding-bottom: 20px;">
                                <label for="fechaFinFecha" class="">Fecha fin</label>
                                <div id="ffe" style="display: none">{{ $elemento->fechaFinElemento }}</div>
                                <input type="text" class="form-control" id="fechaFinFecha" name="fechaFinFecha"
                                    placeholder="">
                            </div>
                            <button class="btn btn-primary btn-block" type="submit" id="submitFormElemento"><i class="bi bi-box-arrow-in-right"></i> Editar Artículo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/elemento/validarElemento.js') }}"></script>
    <script src="{{ asset('js/elemento/editarElemento.js') }}"></script>
@endsection
