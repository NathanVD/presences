@extends('profile')

@section('body')

  <div id="profile-body">
    <div class="row justify-content-evenly">
      <div class="col-md-2">
        <div class="box-profile">

          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle rounded-circle" src="{{asset('storage/'.$user->img_path)}}" alt="User profile picture">
          </div>

          <h3 class="profile-username text-center">{{$user->firstname.' '.$user->lastname}}</h3>

          <p class="text-muted text-center">{{$user->roles()->where('name','Étudiant')->orWhere('name','Professeur')->first()->name.' | '.$user->domain()->get()->first()->name}}</p>

          <ul class="list-group list-group-unbordered mb-3 rounded-0">
            <li class="list-group-item">
              <b>E-mail</b> <a class="float-right">{{$user->email}}</a>
            </li>
            <li class="list-group-item">
              <b>Téléphone</b> <a class="float-right">{{$user->phone}}</a>
            </li>
            <li class="list-group-item">
              <b>Rue</b> <a class="float-right">{{$user->adress_road}}</a>
            </li>
            <li class="list-group-item">
              <b>Commune</b> <a class="float-right">{{$user->adress_commune}}</a>
            </li>
          </ul>

          <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary btn-block"><b>Modifier</b></a>
        </div>
      </div>
      <div class="col-md-4 align-self-end">        
        <form action="" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row form-group">
            <div class="col-md-5">
              <label for="date">Date :</label>
              <input type="date" id="date" name="date" class="form-control" value="{{date('Y-m-d')}}" style="height: 50px;" required>
              @error('date')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="col-md-5">
              <label for="hour">Heure d'arrivée :</label>
              <input type="text" id="hour" name="hour" class="form-control" value="{{date('H:i')}}" required>
              @error('hour')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="col-md-2 align-self-end">
              <input type="submit" value="Présent" class="btn btn-success">
            </div>
          </div>
          <div class="row">
            <div class="col-md-10">
              <div class="form-group">
                <label for="reason">Excuse :</label>
                <textarea id="reason" name="reason" class="form-control" rows="4"></textarea>
                @error('reason')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="proof">Justificatif :</label>
                <input type="file" id="proof" name="proof" class="form-control-file">
                @error('proof')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>              
            </div>
            <div class="col-md-2 align-self-center">
              <input type="submit" value="Absent/En retard" formaction="/" class="btn btn-danger">
            </div>            
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection