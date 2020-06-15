@extends('adminlte::page')

@section('content')

  <div class="container">
    <form action="{{route('hero.update',$slide->id)}}" method="POST" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="card card-success">

        <div class="card-header">
          <h3 class="card-title">Modifier une slide</h3>
        </div>

        <div class="card-body">

          <div class="form-group">
            <label for="title">Titre :</label>
            <input name="title" class="form-control{{($errors->isNotEmpty() ? $errors->first('title') ? " is-invalid" : " is-valid" : "")}}" id="title" value="{{$slide->title}}">
          </div>

          <div class="text-center">
            <img class="img-thumbnail" src="{{asset('storage/'.$slide->img_path)}}" alt="{{$slide->id}}" />
          </div>

          <div class="form-group">
            <label for="image">Image :</label>
            <div class="custom-file">
              <input type="file" name="image" id="image" class="custom-file-input{{($errors->isNotEmpty() ? $errors->first('slide') ? " is-invalid" : " is-valid" : "")}}">
              <label class="custom-file-label" for="image" data-browse="Parcourir">Choisissez une image</label>
            </div>
          </div>

        </div>

      </div>

      <div class="card-footer">
        <div class="btn-group">
          <button type="submit" class="btn btn-success">Valider</button>
          <a href="{{route('hero.index')}}" class="btn btn-secondary">Annuler</a>
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