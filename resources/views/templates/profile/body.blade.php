<div id="about">
  <div class="container">
    <div class="col-md-4">
      <div class="box-profile">

        <div class="text-center">
          <img class="profile-user-img img-fluid img-circle rounded-circle" src="{{asset('storage/'.Auth::user()->img_path)}}" alt="User profile picture">
        </div>

        <h3 class="profile-username text-center">{{Auth::user()->firstname.' '.Auth::user()->lastname}}</h3>

        <p class="text-muted text-center">{{Auth::user()->roles()->where('name','Étudiant')->orWhere('name','Professeur')->first().' en '.'Matière'}}</p>

        <ul class="list-group list-group-unbordered mb-3 rounded-0">
          <li class="list-group-item">
            <b>E-mail</b> <a class="float-right">{{Auth::user()->email}}</a>
          </li>
          <li class="list-group-item">
            <b>Téléphone</b> <a class="float-right">{{Auth::user()->phone}}</a>
          </li>
          <li class="list-group-item">
            <b>Rue</b> <a class="float-right">{{Auth::user()->adress_road}}</a>
          </li>
          <li class="list-group-item">
            <b>Commune</b> <a class="float-right">{{Auth::user()->adress_commune}}</a>
          </li>
        </ul>

        <a href="#" class="btn btn-primary btn-block"><b>Modifier</b></a>
      </div>
    </div>
  </div>
</div>






