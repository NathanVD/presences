@extends('profile')

@section('body')
<div id="profile-body" class="colorlib-contact">
  <h1 class="text-center">Éditer le profil</h1>
  <div class="container">
    <form method="POST" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data">
      @method('put')
      @csrf

      <div class="row form-group justify-content-center align-items-center">
        <div class="col-md-3 text-right">
          <label for="photo">Photo de profil :</label>
        </div>
        <div class="col-md-3">
          <img class="profile-user-img img-fluid" src="{{asset('storage/'.$user->img_path)}}" alt="User profile picture">
        </div>
        <div class="col-md-3">
          <input type="file" id="photo" name="photo" class="form-control-file" placeholder="Photo de profil">
          @error('photo')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="row form-group">
        <div class="col-md-6">
          <input type="text" id="fname" name="firstname" class="form-control" placeholder="Prénom" value="{{$user->firstname}}" required autocomplete="firstname" autofocus>
          @error('firstname')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-md-6">
          <input type="text" id="lname" name="lastname" class="form-control" placeholder="Nom" value="{{$user->lastname}}" required autocomplete="lastname">
          @error('lastname')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="row form-group">
        <div class="col-md-12">
          <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Adresse e-mail" value="{{$user->email}}" required autocomplete="email">
          @error('email')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="row form-group">
        <div class="col-md-12">
          <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Numéro de téléphone" value="{{$user->phone}}" required autocomplete="phone">
          @error('phone')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="row form-group">
        <div class="col-md-6">
          <input type="text" id="adress_road" name="adress_road" class="form-control" placeholder="Rue" value="{{$user->adress_road}}" required autocomplete="adress_road">
          @error('adress_road')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-md-6">
          <input type="text" id="adress_commune" name="adress_commune" class="form-control" placeholder="Commune" value="{{$user->adress_commune}}" required autocomplete="adress_commune">
          @error('adress_commune')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="form-group text-center">
        <input type="submit" value="Enregistrer les modifications" class="btn btn-primary">
      </div>
    </form>		
  </div>
  
  <div class="container">
    <form method="POST" action="{{route('password.update',$user->id)}}">
      @csrf
      <div class="row form-group">
        <div class="col-md-6">
          <input type="password" id="password" name="password" class="form-control" placeholder="Mot de Passe" required autocomplete="new-password">
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
      <div class="form-group text-center">
        <input type="submit" value="Modifier Mot de Passe" class="btn btn-primary">
      </div>
    </form>
  </div>
  <div class="form-group text-center">
    <a href="{{route('profile')}}" class="btn btn-secondary">Retour</a>
  </div>
</div>


@endsection