<nav class="colorlib-nav" role="navigation">
  <div class="top-menu">
    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <div id="colorlib-logo" class="d-flex"><a href="/">{{config('app.name', 'Laravel')}}</a></div>
        </div>
        <div class="col-md-10 text-right menu-1">
          <ul>
            <li class="active has-dropdown">
              <a style="cursor: pointer;">Accueil</a>
              <ul class="dropdown" style="display: none;">
                <li><a href="#about-us">À propos</a></li>
                <li><a href="#team">Équipe</a></li>
                <li><a href="#testimonials">Témoignages</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#subscribe">Newsletter</a></li>
              </ul>
            </li>
            <li><a href="{{route('team')}}">Équipe</a></li>

            @if (Auth::check())
              <li class="has-dropdown">
                <a style="cursor: pointer;">{{Auth::user()->firstname}}</a>
                <ul class="dropdown" style="display: none;">
                  <li><a href="{{route('profile')}}">Profil</a></li>
                  <li>
                    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Se déconnecter
                    </a>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">@csrf</form>
                  </li>
                </ul>
              </li>
              @if (Auth::user()->isWebmaster())
                <li class="btn-cta"><a href="/admin"><span>Back Office</span></a></li>
              @endif
            @else
              <li><a data-toggle="modal" data-target="#loginModal" style="cursor: pointer;">Connexion</a></li>
              <li class="has-dropdown">
                <a style="cursor: pointer;">Inscription</a>
                <ul class="dropdown" style="display: none;">
                  <li><a href="{{route('get.teacher.register')}}">Professeur</a></li>
                  <li><a href="{{route('get.student.register')}}">Étudiant</a></li>
                </ul>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>

<!-- Modals -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">{{ __('Login') }}</h5>
        </div>
        <div class="modal-body">

						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-6 offset-md-4">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

									<label class="form-check-label" for="remember">
										{{ __('Remember Me') }}
									</label>
								</div>
							</div>
						</div>

          </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">
            {{ __('Login') }}
          </button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>