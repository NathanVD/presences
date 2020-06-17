@extends('adminlte::page')

@section('content')
  <div class="container">
    <form action="{{route('background.update')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card card-lightblue">

        <div class="card-header">
          <h3 class="card-title">Image de fond</h3>
        </div>

        <div class="card-body">
          <div class="text-center">
            <img class="img-thumbnail w-75 mb-3" src="{{$background ? asset('storage/'.$background->img_path) : asset('images/img_bg_2.jpg')}}" alt="img" />
          </div>

          <div class="custom-file">
            <input type="file" name="img" id="img" class="custom-file-input @error('img') is-invalid @enderror">
            <label class="custom-file-label" for="img" data-browse="Parcourir">Choisissez une image</label>
          </div>
        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('about')}}" class="btn btn-secondary">Annuler</a>
          </div>
        </div>

      </div>
    </form>    
  </div>


@endsection

@section('js')
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init()
        });
    </script>
@stop