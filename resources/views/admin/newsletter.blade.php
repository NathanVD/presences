@extends('adminlte::page')

@section('content')  

  <form action="{{route('newsletter.update')}}" method="POST">
    @csrf
    <div class="card card-lightblue">

      <div class="card-header">
        <h3 class="card-title">Titre</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          </div>
      </div>

      <div class="card-body">
          <div class="form-group">
            <label for="title">Titre :</label>
            <input name="title" class="form-control{{($errors->isNotEmpty() ? $errors->first('title') ? " is-invalid" : " is-valid" : "")}}" id="title" value="{{$titles ? $titles->title : 'Abonnez-vous à notre newsletter'}}">
          </div>

          <div class="form-group">
            <label for="desc">Description :</label>
            <input name="desc" class="form-control{{($errors->isNotEmpty() ? $errors->first('desc') ? " is-invalid" : " is-valid" : "")}}" id="desc" value="{{$titles ? $titles->description : 'Abonnez-vous à notre newsletter et recevez toutes les dernières infos'}}">
          </div>
      </div>

      <div class="card-footer">
        <div class="btn-group">
          <button type="submit" class="btn btn-success">Valider</button>
          <a href="{{route('newsletter')}}" class="btn btn-secondary">Annuler</a>
        </div>
      </div>

    </div>
  </form>

  <div class="row">
    <div class="col-sm-6">
    {{-- Index --}}
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Abonnés</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          </div>
        </div>

        <div class="card-body table-responsive">
          <table id="subscribers_table" class="table table-hover">

            <thead>
              <tr>
                <th class="text-center text-nowrap">E-mail</th>
                <th class="text-center text-nowrap">Date d'abonnement</th>
                <th class="text-center text-nowrap">Désabonner</th>
              </tr>
            </thead>

            <tbody>
              @if ($subscribers->isEmpty())
                  <tr>
                    <td colspan="3" class="text-center text-nowrap"><b>Aucun abonné à la newsletter</b></td>
                  </tr>
              @else 
                @foreach ($subscribers->sortByDesc('created_at') as $subscriber)
                  <tr>
                    <td class="text-center text-nowrap">{{$subscriber->email}}</td>
                    <td class="text-center text-nowrap">{{$subscriber->created_at->format('d M Y')}}</td>
                    <td class="text-center text-nowrap">
                      <form action="{{route('newsletter.unsubscribe',$subscriber->id)}}" method="POST" class="d-inline-block">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">
                          <i class="fas fa-times"></i>
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
    {{-- Index fin --}}
    </div>
    <div class="col-sm-6">
    {{-- Mail d'abonnement --}}
      <form action="{{route('newsletter.mail.update')}}" method="POST">
        @csrf
        <div class="card card-cyan">

          <div class="card-header">
            <h3 class="card-title">Confirmation d'abonnement à la newsletter</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>

          <div class="card-body">

            <label for="intro">Titre :</label>
            <div class="input-group">
              <input type="text" id="intro" name="intro" class="form-control" value="{{$mail_model ? $mail_model->intro : "Merci de votre inscription !"}}">
            </div>
            
            <label for="body">Corps :</label>
            <div class="input-group">
              <input type="text" id="body" name="body" class="form-control" value="{{$mail_model ? $mail_model->body : "Félicitations, vous êtes maintenant inscrit à notre newsletter et ne manquerez plus une seule nouvelle !"}}">
            </div>

            <label for="farewell">Cloture :</label>
            <div class="input-group">
              <input type="text" id="farewell" name="farewell" class="form-control" value="{{$mail_model ? $mail_model->farewell : "Merci et à très bientôt,"}}">
            </div>

            <input class="form-control" type="text" value="{{"L'équipe ".config('app.name').'.'}}" readonly>

          </div>
          
          <div class="card-footer">
            <div class="btn-group">
              <button type="submit" class="btn btn-success">Valider</button>
              <a href="{{route('newsletter')}}" class="btn btn-secondary">Annuler</a>
            </div>
          </div>
        </div>
      </form>
    {{-- Fin mail d'abonnement --}}
    </div>
  </div>

@endsection

@section('js')
  <script>
    $(document).ready( function () {
      $('#subscribers_table').DataTable({
        "order": [], 
      });
    } );  
  </script>
@endsection