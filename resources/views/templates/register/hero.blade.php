<aside id="colorlib-hero">
  <div class="flexslider">
    <ul class="slides">
      <li style="background-image: url({{$background ? asset('storage/'.$background->img_path) : 'images/img_bg_2.jpg'}});">
        <div class="overlay"></div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 col-sm-12 col-md-offset-3 col-xs-12 slider-text">
              <div class="slider-text-inner text-center">
                <h1>S'inscrire</h1>
                <h2 class="breadcrumbs"><span><a href="{{route('home')}}">Home</a></span> | <span>Inscription</span> | <span>{{$type}}</span></h2>
              </div>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</aside>