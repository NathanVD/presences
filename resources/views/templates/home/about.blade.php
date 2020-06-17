<div id="about" class="colorlib-counters">
  <div class="container">
    <div class="col-md-7">
      <div class="about-desc">
        <div class="about-img-1 animate-box" style="background-image: url({{$about_images ? asset('storage/'.$about_images->img_path_1) : asset('images/about-img-2.jpg')}});"></div>
        <div class="about-img-2 animate-box" style="background-image: url({{$about_images ? asset('storage/'.$about_images->img_path_2) : asset('images/about-img-1.jpg')}});"></div>
      </div>
    </div>
    <div id="about-us" class="col-md-5">
      <div class="row">
        <div class="col-md-12 colorlib-heading animate-box">
          <h1 class="heading-big text-nowrap">{{$about ? $about->title : 'Who are we'}}</h1>
          <h2>{{$about ? $about->title : 'Who are we'}}</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 animate-box">
          <p><strong>{{$about ? $about->subtitle : 'Even the all-powerful Pointing has no control about the blind texts'}}</strong></p>
          <p>{!! nl2br(e($about ? $about->description : 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.')) !!}</p>
        </div>
        <div class="col-md-6 col-sm-6 animate-box">
          <div class="counter-entry">
            <div class="desc">
              <span class="colorlib-counter js-counter" data-from="0" data-to="{{$teachers_count != 0 ? $teachers_count : '1539'}}" data-speed="5000" data-refresh-interval="50"></span>
              <span class="colorlib-counter-label">{{$about_counters ? $about_counters->counter_1 : 'Cours'}}</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 animate-box">
          <div class="counter-entry">
            <div class="desc">
              <span class="colorlib-counter js-counter" data-from="0" data-to="{{$teachers_count != 0 ? $teachers_count : '3653'}}" data-speed="5000" data-refresh-interval="50"></span>
              <span class="colorlib-counter-label">{{$about_counters ? $about_counters->counter_2 : 'Matières'}}</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 animate-box">
          <div class="counter-entry">
            <div class="desc">
              <span class="colorlib-counter js-counter" data-from="0" data-to="{{$teachers_count != 0 ? $teachers_count : '2300'}}" data-speed="5000" data-refresh-interval="50"></span>
              <span class="colorlib-counter-label">{{$about_counters ? $about_counters->counter_3 : 'Étudiants'}}</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 animate-box">
          <div class="counter-entry">
            <div class="desc">
              <span class="colorlib-counter js-counter" data-from="0" data-to="{{$teachers_count != 0 ? $teachers_count : '200'}}" data-speed="5000" data-refresh-interval="50"></span>
              <span class="colorlib-counter-label">{{$about_counters ? $about_counters->counter_4 : 'Professeurs'}}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>