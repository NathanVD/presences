@extends('adminlte::page')

@section('css')
  <link rel="stylesheet" href="/css/admin.css">
@stop

@section('content')

  <div class="row">
    <div class="col-md-4">
      {{-- Titre --}}
      <form action="{{route('team.title.update')}}" method="POST">
        @csrf
        <div class="card card-lightblue">

          <div class="card-header">
            <h3 class="card-title">Titre de la section</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>

          <div class="card-body">
            <div class="form-group">
              <label for="titre">Titre :</label>
              <input name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" value="{{$team_title ? $team_title->title : 'Our instructors'}}">
            </div>
          </div>

          <div class="card-footer">
            <div class="btn-group">
              <button type="submit" class="btn btn-success">Valider</button>
              <a href="{{route('admin.team')}}" class="btn btn-secondary">Annuler</a>
            </div>
          </div>

        </div>
      </form>
      {{-- Titre fin --}}

      {{-- Membre vedette --}}
      <div class="card card-warning card-outline">
        <div class="card-header">
          <h3 class="card-title">Professeur principal </h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          </div>
        </div>

        <div class="card-body text-center">
          @if (!$starred)
            <b>Aucun professeur en principal</b>
          @else 
            <img src="{{asset('storage/'.$starred->user->img_path)}}" class="w-75" alt="img">
            <h3 class="my-4">{{$starred->user->firstname.' '.$starred->user->lastname}}</h3>
            <form action="{{route('team.starred_member.remove')}}" method="POST" class="d-inline-block">
              @csrf
              @method('delete')
              <button class="btn btn-outline-warning border-0" title="Retirer du principal">
                <i class="fas fa-angle-double-left fa-2x"></i>
                <i class="fas fa-star fa-3x"></i>
                <i class="fas fa-angle-double-right fa-2x"></i>
              </button>
            </form>
          @endif
        </div>
      </div>
      {{-- Starred member end --}}
    </div>

    <div class="col-md-8">
      {{-- Index --}}
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Liste des membres de l'équipe</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          </div>
        </div>

        <div class="card-body table-responsive">
          <table id="team_table" class="table table-hover">
            <thead>
              <tr>
                <th class="text-center text-nowrap">Photo</th>
                <th class="text-center text-nowrap">Nom</th>
                <th class="text-center text-nowrap">Principal ?</th>
              </tr>
            </thead>

            <tbody>
              @if (!$team || $team->isEmpty())
                  <tr>
                    <td colspan="3" class="text-center text-nowrap"><b>Aucun enseignant</b></td>
                  </tr>
              @else 
                @foreach ($team->sortBy('name') as $team_member)
                  <tr>
                    <td class="text-center text-nowrap">
                      <img src="{{asset('storage/'.$team_member->img_path)}}" class="mini rounded-circle" alt="img">
                    </td>
                    <td class="text-center text-nowrap">{{$team_member->firstname.' '.$team_member->lastname}}</td>
                    <td class="text-center text-nowrap">
                      @if ($starred && $team_member->id === $starred->member_id)
                        <form action="{{route('team.starred_member.remove')}}" method="POST" class="d-inline-block">
                          @csrf
                          @method('delete')
                          <button class="btn btn-outline-warning border-0">
                            <i class="fas fa-star"></i>
                          </button>
                        </form>
                      @else
                      {{-- {{route('team.starred_member.update',$team_member->id)}} --}}
                        <form action="{{route('team.starred_member.update',$team_member->id)}}" method="POST" class="d-inline-block">
                          @csrf
                          <button class="btn btn-outline-warning border-0" title="Définir en principal">
                            <i class="far fa-star"></i>
                          </button>
                        </form>
                      @endif
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{-- Index fin --}}
    </div>
  </div>
@endsection

@section('js')
  <script>
    $(document).ready( function () {
      $('#team_table').DataTable({
        "order": [], 
      });
    } );
  </script>
@endsection