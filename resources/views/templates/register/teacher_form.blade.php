@extends('register')

@section('form')

  <div id="contact" class="colorlib-contact">
    <div class="container">
      <form method="POST" action="{{ route('teacher.register') }}" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="row form-group">
          <div class="col-md-6">
            <input type="text" id="fname" name="firstname" class="form-control" placeholder="Prénom" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
            @error('firstname')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-6">
            <input type="text" id="lname" name="lastname" class="form-control" placeholder="Nom" value="{{ old('lastname') }}" required autocomplete="lastname">
            @error('lastname')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="row form-group">
          <div class="col-md-12">
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Adresse e-mail" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="row form-group">
          <div class="col-md-12">
            <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Numéro de téléphone" value="{{ old('phone') }}" required autocomplete="phone">
            @error('phone')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="row form-group">
          <div class="col-md-6">
            <input type="password" id="password" name="password" class="form-control" placeholder="Mot de Passe" value="{{ old('password') }}" required autocomplete="new-password">
            @error('password')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-6">
            <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Confirmation du Mot de Passe" required autocomplete="new-password">
            @error('password-confirm')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="row form-group">
          <div class="col-md-2">
            <label for="photo">Photo de profil :</label>
          </div>
          <div class="col-md-10">
            <input type="file" id="photo" name="photo" class="form-control-file" placeholder="Photo de profil">
            @error('photo')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="row form-group">
          <div class="col-md-6">
            <input type="text" id="adress_road" name="adress_road" class="form-control" placeholder="Rue" value="{{ old('adress_road') }}" required autocomplete="adress_road">
            @error('adress_road')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-6">
            <input type="text" id="adress_commune" name="adress_commune" class="form-control" placeholder="Commune" value="{{ old('adress_commune') }}" required autocomplete="adress_commune">
            @error('adress_commune')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="row form-group">
          <div class="col-md-12">
            <select type="text" id="domain" name="domain" class="form-control @error('domain') is-invalid @enderror">
              <option>J'enseigne...</option>
              @foreach ($teaches as $teach)
                <option value="{{$teach->id}}">{{$teach->name}}</option>
              @endforeach
            </select>
            @error('domain')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="form-group">
          <input type="submit" value="S'enregistrer" class="btn btn-primary">
        </div>
      </form>		
    </div>
  </div>

@endsection