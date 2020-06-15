@extends('adminlte::page')

@section('content')  

  <div class="container">
    <form action="{{route('newsletter.update')}}" method="POST">
      @csrf
      <div class="card card-info">

        <div class="card-header">
          <h3 class="card-title">Titre</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group">
              <label for="title">Titre :</label>
              <input name="title" class="form-control{{($errors->isNotEmpty() ? $errors->first('title') ? " is-invalid" : " is-valid" : "")}}" id="title" value="{{$titles ? $titles->title : 'Abonnez-vous à notre newsletter'}}">
            </div>

            <div class="form-group">
              <label for="desc">Description :</label>
              <input name="desc" class="form-control{{($errors->isNotEmpty() ? $errors->first('desc') ? " is-invalid" : " is-valid" : "")}}" id="desc" value="{{$titles ? $titles->description : 'Abonnez-vous à notre newsletter et recevez toutes les dernières infos'}}">
            </div>
        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('newsletter')}}" class="btn btn-secondary">Annuler</a>
          </div>
        </div>

      </div>
    </form>
  </div>

@endsection