@extends('adminlte::page')

@section('content')

  <div class="container">
    <form action="{{route('testimonials.update',$testimonial->id)}}" method="POST" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="card card-success">

        <div class="card-header">
          <h3 class="card-title">Modifier un témoignage</h3>
        </div>

        <div class="card-body">

          <div class="row">
            <div class="col-sm-6 d-flex align-items-center">
              <div class="form-group">
                <label for="img">Photo de profil :</label>
                <div class="custom-file">
                  <input type="file" name="img" id="img" class="custom-file-input{{($errors->isNotEmpty() ? $errors->first('img') ? " is-invalid" : " is-valid" : "")}}">
                  <label class="custom-file-label" for="img" data-browse="Parcourir">Choisissez une image</label>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <img src="{{asset('storage/'.$testimonial->img_path)}}" alt="img-{{$testimonial->id}}" class="img-thumbnail">
            </div>
          </div>


          <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" class="form-control{{($errors->isNotEmpty() ? $errors->first('name') ? " is-invalid" : " is-valid" : "")}}" value="{{$testimonial->name}}">
          </div>

          <div class="form-group">
            <label for="review">Témoignage :</label>
            <textarea name="review" id="review" class="form-control{{($errors->isNotEmpty() ? $errors->first('review') ? " is-invalid" : " is-valid" : "")}}" rows="4" maxlength="220">
{{$testimonial->review}}
            </textarea>
          </div>

        </div>

        <div class="card-footer">
            <div class="btn-group">
              <button type="submit" class="btn btn-success">Valider</button>
              <a href="{{route('testimonials.index')}}" class="btn btn-secondary">Annuler</a>
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