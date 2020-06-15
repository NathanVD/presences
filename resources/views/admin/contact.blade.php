@extends('adminlte::page')

@section('content')

  <div class="row">
    <div class="col-12">
      <form action="{{route('contact.titles.update')}}" method="POST">
        @csrf
        <div class="card card-lightblue">

          <div class="card-header">
            <h3 class="card-title">Titres</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>

          <div class="card-body">
            <div class="form-group">
              <label for="title_1">Titre infos :</label>
              <input name="title_1" class="form-control{{($errors->isNotEmpty() ? $errors->first('title_1') ? " is-invalid" : " is-valid" : "")}}" id="title_1" value="{{$titles ? $titles->title_1 : 'Informations de contact'}}">
            </div>

            <div class="form-group">
              <label for="title_2">Titre formulaire :</label>
              <input name="title_2" class="form-control{{($errors->isNotEmpty() ? $errors->first('title_2') ? " is-invalid" : " is-valid" : "")}}" id="title_2" value="{{$titles ? $titles->title_2 : 'Nous envoyer un message'}}">
            </div>
          </div>

          <div class="card-footer">
            <div class="btn-group">
              <button type="submit" class="btn btn-success">Valider</button>
              <a href="{{route('contact')}}" class="btn btn-secondary">Annuler</a>
            </div>
          </div>

        </div>
      </form>      
    </div>
  </div>    

  <div class="row">
    <div class="col-md-6">
      <form action="{{route('contact.update')}}" method="POST">
        @csrf
        <div class="card card-info">

          <div class="card-header">
            <h3 class="card-title">Informations de contact</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>

          <div class="card-body">

            <div class="form-group">
              <label for="adress_1">Adresse 1 :</label>
              <input name="adress_1" class="form-control{{($errors->isNotEmpty() ? $errors->first('adress_1') ? " is-invalid" : " is-valid" : "")}}" id="adress_1" value="{{$contact ? $contact->adress_1 : 'Place de la Minoterie 10'}}">
            </div>

            <div class="form-group">
              <label for="adress_2">Adresse 2 :</label>
              <input name="adress_2" class="form-control{{($errors->isNotEmpty() ? $errors->first('adress_2') ? " is-invalid" : " is-valid" : "")}}" id="adress_2" value="{{$contact ? $contact->adress_2 : '1080 Molenbeek-Saint-Jean'}}">
            </div>

            <div class="form-group">
              <label for="phone">Numéro de téléphone :</label>
              <input name="phone" class="form-control{{($errors->isNotEmpty() ? $errors->first('phone') ? " is-invalid" : " is-valid" : "")}}" id="phone" value="{{$contact ? $contact->phone : '+32 412 34 56 78'}}">
            </div>

            <div class="form-group">
              <label for="email">Adresse e-mail :</label>
              <input name="email" class="form-control{{($errors->isNotEmpty() ? $errors->first('email') ? " is-invalid" : " is-valid" : "")}}" id="email" value="{{$contact ? $contact->email : 'nathan@molengeek.com'}}">
            </div>

          </div>

          <div class="card-footer">
            <div class="btn-group">
              <button type="submit" class="btn btn-success">Valider</button>
              <a href="{{route('contact')}}" class="btn btn-secondary">Annuler</a>
            </div>
          </div>

        </div>
      </form>
    </div>
  
    <div class="col-md-6">
      <form action="{{route('contact.map.update')}}" method="POST">
        @csrf
        <div class="card card-teal">

          <div class="card-header">
            <h3 class="card-title">Carte</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>

          <div class="card-body">
            <div class="form-group">
              <label for="map">Url :</label>
              <input name="map" class="form-control{{($errors->isNotEmpty() ? $errors->first('map') ? " is-invalid" : " is-valid" : "")}}" id="map" value="{{$map ? $map->url : 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2518.693327187696!2d4.3390363157460925!3d50.855362979533275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c38c275028d3%3A0xc7799151146ebf77!2sMolenGeek!5e0!3m2!1sfr!2sbe!4v1591865123097!5m2!1sfr!2sbe'}}">
              <small id="mapHelp" class="form-text text-muted">Sur Maps : 'partager'->'intégrer une carte'->copier le lien dans 'src'</small>
            </div>
            <div class="d-flex justify-content-center w-100">
              <iframe src="{{$map ? $map->url : 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2518.693327187696!2d4.3390363157460925!3d50.855362979533275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c38c275028d3%3A0xc7799151146ebf77!2sMolenGeek!5e0!3m2!1sfr!2sbe!4v1591865123097!5m2!1sfr!2sbe'}}" width="700" height="550" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
          </div>
      
          <div class="card-footer">
            <div class="btn-group">
              <button type="submit" class="btn btn-success">Valider</button>
              <a href="{{route('contact')}}" class="btn btn-secondary">Annuler</a>
            </div>
          </div>

        </div>
      </form>    
    </div>
  </div>

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init()
        });
    </script>
@stop