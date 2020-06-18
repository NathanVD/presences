<div id="team" class="colorlib-trainers">
  <div class="container">
    <div class="row">
      <div class="col-md-12 colorlib-heading center-heading text-center animate-box">
        <h1 class="heading-big">{{$team_title ? $team_title : 'Our Instructor'}}</h1>
        <h2>{{$team_title ? $team_title : 'Our Instructor'}}</h2>
      </div>
    </div>
    <div class="row justify-content-between">

      @if ($team && $team->isNotEmpty())
        <div class="col-md-3 col-sm-3 animate-box">
          <div class="trainers-entry">
            <div class="desc">
              <h3>{{$team_1->firstname.' '.$team_1->lastname}}</h3>
              <span>Professeur</span>
            </div>
            <div class="trainer-img" style="background-image: url({{asset('storage/'.$team_1->img_path)}})"></div>
          </div>
        </div>

        <div class="col-md-3 col-sm-3 animate-box">
          <div class="trainers-entry">
            <div class="desc">
              <h3>{{$starred->firstname.' '.$starred->lastname}}</h3>
              <span>Professeur</span>
              <i class="fas fa-star text-warning"></i>
            </div>
            <div class="trainer-img" style="background-image: url({{asset('storage/'.$starred->img_path)}})"></div>
          </div>
        </div>

        <div class="col-md-3 col-sm-3 animate-box">
          <div class="trainers-entry">
            <div class="desc">
              <h3>{{$team_2->firstname.' '.$team_2->lastname}}</h3>
              <span>Professeur</span>
            </div>
            <div class="trainer-img" style="background-image: url({{asset('storage/'.$team_2->img_path)}})"></div>
          </div>
        </div>
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