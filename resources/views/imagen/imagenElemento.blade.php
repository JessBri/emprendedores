@extends('plantilla')

@section('contenidoPrincipal')

    <div class="container">
        <div class="col-md-12">
            <br>
            <h2>Imagenes disponibles para el elemento "{{ $elemento->nombreElemento }}"</h2>
            <br>
            <div class="offset-md-3 col-md-6">
                <button class="btn btn-dark btn-block" id="btnSubeImagen" data-toggle="modal" data-target="#subeImagen"><i
                        class="bi bi-cloud-arrow-up-fill"></i> Subir Imagenes</button>
            </div>
            <br>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="container">
        <div class="card-columns">
            @foreach ($imagenes as $key => $value)
            <div class="card">
                <a href="{{ asset("$value->urlImagen") }}" title="Galería '.{{ $elemento->nombreElemento }}.'">
                    <img class="card-img img-fluid" src="{{ asset("$value->urlImagen") }}" alt="Card image">
                </a>
                <div class="card-body">
                    <form method="post" action="{{ route('eliminaImagen',['idImagen'=>$value->idImagen,'idElemento'=>$value->idElemento]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger btn-block"><i class="bi bi-file-earmark-x-fill"></i> Eliminar</button>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="subeImagen" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-block" style="text-align: center;">
                    <div class="d-flex">
                        <h5 class='col-12 modal-title text-center'>
                            <i class="bi bi-cloud-arrow-up-fill"></i> Subir imagenes al elemento
                            "{{ $elemento->nombreElemento }}"
                        </h5>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form method="post" action="{{ route('subeImagen') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" id="idElemento" name="idElemento" value="{{ $elemento->idElemento }}" style="display: none;">
                                <input style="padding:3px;" class="form-control" type="file" name="images[]"
                                    data-buttonText="Seleccionar archivos.." data-buttonName="btn-primary" accept="image/*"
                                    multiple required>
                                @if ($errors->has('files'))
                                    @foreach ($errors->get('files') as $error)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $error }}</strong>
                                        </span>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block btnSubeImagen"><i class="bi bi-images"></i> Subir
                                    imagenes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i>
                        Cerrar</button>
                </div>
            </div>
        </div>
    </div>

@section('scripts')
    <script src="{{ asset('js/imagen/lstImagen.js') }}"></script>
@endsection
