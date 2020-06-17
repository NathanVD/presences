{{-- @extends('layouts.app')

@section('content')

  @include('templates.preloader')

  @include('templates.register.nav')

  @include('templates.register.form')

  @include('templates.footer')

  @include('templates.gototop')

@endsection --}}


@extends('layouts.app')

@section('content')

    @include('templates.preloader')

    @include('templates.register.nav')

    @include('templates.register.hero')

    @include('templates.register.form')

    {{-- <div id="contact" class="colorlib-contact">
        <div class="container">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row form-group">
                    <div class="col-md-6">
                        <input type="text" id="fname" name="firstname" class="form-control" placeholder="Prénom" required autocomplete="firstname" autofocus>
                        @error('firstname')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="lname" name="lastname" class="form-control" placeholder="Nom" required autocomplete="lastname">
                        @error('lastname')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Adresse e-mail" required autocomplete="email">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Numéro de téléphone" required autocomplete="phone">
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-6">
                        <input type="text" id="password" name="password" class="form-control" placeholder="Mot de Passe" required autocomplete="new-password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="password-confirm" name="password-confirm" class="form-control" placeholder="Confirmation du Mot de Passe" required autocomplete="new-password">
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
                        <input type="file" id="photo" name="photo" class="form-control" placeholder="Photo de profil">
                        @error('photo')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-6">
                        <input type="text" id="adress_road" name="adress_road" class="form-control" placeholder="Rue" required autocomplete="adress_road">
                        @error('adress_road')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="adress_commune" name="adress_commune" class="form-control" placeholder="Commune" required autocomplete="adress_commune">
                        @error('adress_commune')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <select type="text" id="role" name="role" class="form-control @error('role') is-invalid @enderror">
                            <option>Je suis un(e)...</option>
                            <option value="1">Étudiant(e)</option>
                            <option value="2">Professeur</option>
                        </select>
                        @error('role')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <input type="text" id="subject" name="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="J'étudie... / J'enseigne..." required autocomplete="subject">
                        @error('subject')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" value="S'enregistrer" class="btn btn-primary">
                </div>
            </form>		
        </div>
    </div> --}}

    {{-- @include('templates.footer') --}}

    @include('templates.gototop')

@endsection







{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
