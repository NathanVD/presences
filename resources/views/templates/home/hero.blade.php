<aside id="colorlib-hero">
  <div class="flexslider">
    <ul class="slides">
      @if (!$slides || $slides->isEmpty())
        <li style="background-image: url(images/img_bg_1.jpg);">
          <div class="overlay"></div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-8 col-sm-12 col-md-offset-2 col-xs-12 col-md-pull-1 slider-text">
                <div class="slider-text-inner">
                  <div class="desc">
                    <h2>You only have to know one thing</h2>
                    <h1>Best Online Learning System</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li style="background-image: url(images/img_bg_5.jpg);">
          <div class="overlay"></div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-8 col-sm-12 col-md-offset-2 col-xs-12 col-md-pull-1 slider-text">
                <div class="slider-text-inner">
                  <div class="desc">
                    <h2>You only have to know one thing</h2>
                    <h1>Online Free Course</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li style="background-image: url(images/img_bg_3.jpg);">
          <div class="overlay"></div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-8 col-sm-12 col-md-offset-2 col-xs-12 col-md-pull-1 slider-text">
                <div class="slider-text-inner">
                  <div class="desc">
                    <h2>You only have to know one thing</h2>
                    <h1>Education is a Key to Success</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li style="background-image: url(images/img_bg_4.jpg);">
          <div class="overlay"></div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-8 col-sm-12 col-md-offset-2 col-xs-12 col-md-pull-1 slider-text">
                <div class="slider-text-inner">
                  <div class="desc">
                    <h2>You only have to know one thing</h2>
                    <h1>Best Online Learning Center</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>	          
      @else
        @foreach ($slides as $slide)
          <li style="background-image: url({{asset('storage/'.$slide->img_path)}});">
            <div class="overlay"></div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-8 col-sm-12 col-md-offset-2 col-xs-12 col-md-pull-1 slider-text">
                  <div class="slider-text-inner">
                    <div class="desc">
                      <h2>{{$catch ? $catch->catchphrase : "You only have to know one thing"}}</h2>
                      <h1>{{$slide->title}}</h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>             
        @endforeach
      @endif

    </ul>
  </div>
</aside>