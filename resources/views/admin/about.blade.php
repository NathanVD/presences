@extends('adminlte::page')

@section('content')
  <div class="row">
    <div class="col">
      <form action="{{route('about.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card card-info">

          <div class="card-header">
            <h3 class="card-title">Présentation</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>

          <div class="card-body">
            <div class="form-group">
              <label for="title">Titre :</label>
              <input name="title" class="form-control{{($errors->isNotEmpty() ? $errors->first('title') ? " is-invalid" : " is-valid" : "")}}" id="title" value="{{$about ? $about->title : 'Who are we'}}">
            </div>

            <div class="form-group">
              <label for="subtitle">Sous-Titre :</label>
              <input name="subtitle" class="form-control{{($errors->isNotEmpty() ? $errors->first('subtitle') ? " is-invalid" : " is-valid" : "")}}" id="subtitle" value="{{$about ? $about->subtitle : 'Even the all-powerful Pointing has no control about the blind texts'}}">
            </div>

            <div class="form-group">
              <label for="desc">Description :</label>
              <textarea name="desc" class="form-control{{($errors->isNotEmpty() ? $errors->first('desc') ? " is-invalid" : " is-valid" : "")}}" id="desc" rows="5">
{{$about ? $about->description : 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.'}}
              </textarea>
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

    <div class="col">
      <form action="{{route('about.images.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card card-teal">

          <div class="card-header">
            <h3 class="card-title">Images</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>

          <div class="card-body">
            <div class="row">

              <div class="col">
                <img class="img-thumbnail w-100" src="{{$about_images ? asset('storage/'.$about_images->img_path_1) : asset('images/about-img-2.jpg')}}" alt="img-1" />

                <label for="image">Image 1 :</label>
                <div class="custom-file">
                  <input type="file" name="img_1" id="img_1" class="custom-file-input{{($errors->isNotEmpty() ? $errors->first('img_1') ? " is-invalid" : " is-valid" : "")}}">
                  <label class="custom-file-label" for="img_1" data-browse="Parcourir">Choisissez une image</label>
                </div>
              </div>

              <div class="col">
                <img class="img-thumbnail w-100" src="{{$about_images ? asset('storage/'.$about_images->img_path_2) : asset('images/about-img-1.jpg')}}" alt="img-2" />

                <label for="image">Image 2 :</label>
                <div class="custom-file">
                  <input type="file" name="img_2" id="img_2" class="custom-file-input{{($errors->isNotEmpty() ? $errors->first('img_2') ? " is-invalid" : " is-valid" : "")}}">
                  <label class="custom-file-label" for="img_2" data-browse="Parcourir">Choisissez une image</label>
                </div>
              </div>

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
  </div>
  
  <div class="container">
    <form action="{{route('about.counters.update')}}" method="POST">
      @csrf
      <div class="card card-lightblue">

        <div class="card-header">
          <h3 class="card-title">Compteurs</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="form-group col-sm-6">
              <label for="counter_1">Compteur 1 :</label>
              <input name="counter_1" class="form-control{{($errors->isNotEmpty() ? $errors->first('counter_1') ? " is-invalid" : " is-valid" : "")}}" id="counter_1" value="{{$about_counter ? $about_counter->counter_1 : 'Cours'}}">
            </div>

            <div class="form-group col-sm-6">
              <label for="counter_2">Compteur 2 :</label>
              <input name="counter_2" class="form-control{{($errors->isNotEmpty() ? $errors->first('counter_2') ? " is-invalid" : " is-valid" : "")}}" id="counter_2" value="{{$about_counter ? $about_counter->counter_2 : 'Membres'}}">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-6">
              <label for="counter_3">Compteur 3 :</label>
              <input name="counter_3" class="form-control{{($errors->isNotEmpty() ? $errors->first('counter_3') ? " is-invalid" : " is-valid" : "")}}" id="counter_3" value="{{$about_counter ? $about_counter->counter_3 : 'Étudiants'}}">
            </div>

            <div class="form-group col-sm-6">
              <label for="counter_4">Compteur 4 :</label>
              <input name="counter_4" class="form-control{{($errors->isNotEmpty() ? $errors->first('counter_4') ? " is-invalid" : " is-valid" : "")}}" id="counter_4" value="{{$about_counter ? $about_counter->counter_4 : 'Professeurs'}}">
            </div>          
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