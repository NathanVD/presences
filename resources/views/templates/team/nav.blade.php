<nav class="colorlib-nav" role="navigation">
  <div class="top-menu">
    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <div id="colorlib-logo" class="d-flex"><a href="{{route('home')}}">{{config('app.name', 'Laravel')}}</a></div>
        </div>
        <div class="col-md-10 text-right menu-1">
          <ul>
            <li class="has-dropdown">
              <a href="{{route('home')}}">Accueil</a>
              <ul class="dropdown" style="display: none;">
                <li><a href="{{route('home').'#about-us'}}">À propos</a></li>
                <li><a href="{{route('home').'#team'}}">Équipe</a></li>
                <li><a href="{{route('home').'#testimonials'}}">Témoignages</a></li>
                <li><a href="{{route('home').'#contact'}}">Contact</a></li>
                <li><a href="{{route('home').'#subscribe'}}">Newsletter</a></li>
              </ul>
            </li>
            <li><a href="#">Équipe</a></li>
            @if (Auth::check())
              <li class="active has-dropdown">
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
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>
