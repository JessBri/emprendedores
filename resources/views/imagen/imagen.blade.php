@extends('plantilla')

@section('contenidoPrincipal')

<div class="container mt-4">
    <h2>Upload Multiple Files in Laravel 8 with- <a href="https://codingdriver.com/">codingdriver.com</a></h2>
      @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session()->get('success') }}
          </div>
      @endif

      <form method="post" action="{{ route('subeImagen') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="file" name="images[]" multiple class="form-control" accept="image/*">
            @if ($errors->has('files'))
              @foreach ($errors->get('files') as $error)
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $error }}</strong>
              </span>
              @endforeach
            @endif
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>
  </div>

@section('scripts')
<script src="{{ asset('js/imagen/lstImagen.js') }}"></script>
@endsection
