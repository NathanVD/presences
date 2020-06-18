<div id="team" class="colorlib-trainers">
  <div class="container">
    <div class="row">
      <div class="col-md-12 colorlib-heading center-heading text-center animate-box">
        <h1 class="heading-big">{{$team_title ? $team_title : 'Our Instructor'}}</h1>
        <h2>{{$team_title ? $team_title : 'Our Instructor'}}</h2>
      </div>
    </div>
    <div class="row justify-content-center">

      @if ($teachers && $teachers->isNotEmpty())
        @foreach ($teachers as $teacher)
          <div class="col-md-3 col-sm-3 animate-box mb-3">
            <div class="trainers-entry">
              <div class="desc">
                <h3>{{$teacher->firstname.' '.$teacher->lastname}}</h3>
                <span>Professeur</span> 
                @if ($teacher->starred)
                  <i class="fas fa-star text-warning"></i>
                @endif
              </div>
              <div class="trainer-img mb-2" style="background-image: url({{asset('storage/'.$teacher->img_path)}})"></div>
              <p class="text-nowrap m-0"><a class="text-muted" href="tel://{{$teacher->phone}}"><i class="icon-phone"></i> {{$teacher->phone}}</a></p>
              <p class="text-nowrap"><a class="text-muted" href="mailto:{{$teacher->email}}"><i class="icon-envelope"></i> {{$teacher->email}}</a></p>
            </div>
          </div>
        @endforeach
      @else
        <div class="col-md-3 col-sm-3 animate-box">
          <div class="trainers-entry">
            <div class="desc">
              <h3>Olivia Young</h3>
              <span>instructor</span>
            </div>
            <div class="trainer-img" style="background-image: url(images/person1.jpg)"></div>
          </div>
        </div>

        <div class="col-md-3 col-sm-3 animate-box">
          <div class="trainers-entry">
            <div class="desc">
              <h3>Daniel Anderson</h3>
              <span>Instructor</span>
            </div>
            <div class="trainer-img" style="background-image: url(images/person2.jpg)"></div>
          </div>
        </div>

        <div class="col-md-3 col-sm-3 animate-box">
          <div class="trainers-entry">
            <div class="desc">
              <h3>David Brook</h3>
              <span>Instructor</span>
            </div>
            <div class="trainer-img" style="background-image: url(images/person3.jpg)"></div>
          </div>
        </div>          
      @endif

    </div>
  </div>
</div>