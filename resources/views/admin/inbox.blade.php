@extends('adminlte::page')

@section('content')

  <div class="row">
    <div class="col-sm-8">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Inbox</h3>
        </div>

        <div class="card-body">
          <table id="messages_table" class="table">

            <thead>
              <tr>
                <th class="text-center text-nowrap">Nom</th>
                <th class="text-center text-nowrap">Sujet</th>
                <th class="text-center text-nowrap">Date</th>
                <th class="text-center text-nowrap">Heure</th>
                <th class="text-center text-nowrap">Actions</th>
              </tr>
            </thead>

            <tbody>
              @if (!$messages || $messages->isEmpty())
                  <tr>
                    <td colspan="5" class="text-center"><b>Aucun message.</b></td>
                  </tr>
              @else 
                @foreach ($messages->sortByDesc('created_at') as $message)
                  <tr>
                    <td class="text-center text-nowrap">{{$message->firstname.' '.$message->lastname}}</td>
                    <td class="text-center text-nowrap">{{$message->object}}</td>
                    <td class="text-center text-nowrap"><span>{{$message->created_at->format('d M Y')}}</span></td>
                    <td class="text-center text-nowrap"><span>{{$message->created_at->format('H:i')}}</span></td>
                    <td class="text-center text-nowrap">
                      <a href="{{route('inbox.show',$message->id)}}" class="btn btn-info">
                        <i class="far fa-eye"></i>
                      </a>
                      <form action="{{route('inbox.destroy',$message->id)}}" method="POST" class="d-inline-block">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>

          </table>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
    {{-- Mail de confirmation --}}
      <form action="{{route('inbox.model.update')}}" method="POST">
        @csrf
        <div class="card card-cyan card-outline">

          <div class="card-header">
            <h3 class="card-title">Confirmation d'envoi de message</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>

          <div class="card-body">

            <label for="title">Titre :</label>
            <div class="input-group mb-3">
              <input type="text" id="title" name="title" class="form-control" value="{{$confirm ? $confirm->title : "Confirmation d'envoi"}}">
            </div>  

            <label for="greeting">Salutation :</label>
            <div class="input-group mb-3">
              <input type="text" id="greeting" name="greeting" class="form-control" value="{{$confirm ? $confirm->greeting : "Bonjour"}}">
              <div class="input-group-append">
                <span class="input-group-text">#Nom,</span>
              </div>
            </div>

            <label for="intro">Intro :</label>
            <div class="input-group">
              <input type="text" id="intro" name="intro" class="form-control" value="{{$confirm ? $confirm->intro : "Merci pour votre message :"}}">
            </div>
            <input class="form-control mb-3" type="text" value="#Message" readonly>

            <label for="outro">Outro :</label>
            <div class="input-group mb-3">
              <input type="text" id="outro" name="outro" class="form-control" value="{{$confirm ? $confirm->outro : "Il sera lu et traité dans les plus brefs délais."}}">
            </div>

            <label for="farewell">Cloture :</label>
            <div class="input-group">
              <input type="text" id="farewell" name="farewell" class="form-control" value="{{$confirm ? $confirm->farewell : "Bien à vous,"}}">
            </div>
            <input class="form-control" type="text" value="{{"L'équipe ".config('app.name').'.'}}" readonly>

          </div>
          
          <div class="card-footer">
            <div class="btn-group">
              <button type="submit" class="btn btn-success">Valider</button>
              <a href="{{route('inbox.index')}}" class="btn btn-secondary">Annuler</a>
            </div>
          </div>
        </div>
      </form>
    {{-- Fin mail de confirmation --}}
    </div>
  </div>

@endsection

@section('js')
  <script>
    $(document).ready( function () {
      $('#messages_table').DataTable({
        "order": [], 
      });
    } );  
  </script>
@endsection