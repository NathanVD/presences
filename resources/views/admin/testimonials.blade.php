@extends('adminlte::page')

@section('css')
{{-- <link rel="stylesheet" href="/css/app.css"> --}}
<link rel="stylesheet" href="/css/admin.css">
@stop

@section('content')

  {{-- Titre --}}
    <form action="{{route('testimonials.title.update')}}" method="POST">
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
            <label for="title">Titre :</label>
            <input name="title" id="title" class="form-control{{($errors->isNotEmpty() ? $errors->first('title') ? " is-invalid" : " is-valid" : "")}}" value="{{$title ? $title->title : 'What our students say'}}">
          </div>
        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('testimonials.index')}}" class="btn btn-secondary">Annuler</a>
          </div>
        </div>

      </div>
    </form>
  {{-- Titre fin --}}

  <div class="row">
    <div class="col-md-9">
      {{-- Index --}}
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Liste des témoignages <a href="{{route('testimonials.create')}}" class="badge bg-success"><i class="fas fa-plus"></i></a></h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>

          <div class="card-body table-responsive">
            <table id="testimonials_table" class="table table-hover">

              <thead>
                <tr>
                  <th class="text-center text-nowrap">Photo</th>
                  <th class="text-center text-nowrap">Nom</th>
                  <th class="text-center text-nowrap">Témoignage</th>
                  <th class="text-center text-nowrap">Dernière màj</th>
                  <th class="text-center text-nowrap">Actions</th>
                </tr>
              </thead>

              <tbody>
                @if ($testimonials->isEmpty())
                    <tr>
                      <td colspan="5" class="text-center text-nowrap"><b>Aucun témoignage enregistré</b></td>
                    </tr>
                @else 
                  @foreach ($testimonials->sortByDesc('created_at') as $testimonial)
                    <tr>
                      <td class="text-center text-nowrap">
                        <img src="{{asset('storage/'.$testimonial->img_path)}}" class="mini rounded-circle" alt="img{{$testimonial->id}}">
                      </td>
                      <td class="text-center text-nowrap">{{$testimonial->name}}</td>
                      <td class="text-truncate text-nowrap review">{{$testimonial->review}}</td>
                      <td class="text-center text-nowrap">{{$testimonial->updated_at->format('d M Y - H:i')}}</td>
                      <td class="text-center text-nowrap">
                        <a href="{{route('testimonials.show',$testimonial->id)}}" class="btn btn-info">
                          <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{route('testimonials.edit',$testimonial->id)}}" class="btn btn-warning">
                          <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{route('testimonials.destroy',$testimonial->id)}}" method="POST" class="d-inline-block">
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
      {{-- Index fin --}}
    </div>
    <div class="col-md-3">
      {{-- Show --}}
        <div class="card card-purple">

          <div class="card-header">
            <h3 class="card-title">Lire le témoignage</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>

          <div class="card-body">
            <div class="testimony-flex">
              <span class="icon">
                <i class="fas fa-quote-left"></i>
              </span>
              <div class="testimony-wrap">
                <blockquote>
                  <p>{{$read ? $read->review : 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.'}}</p>
                </blockquote>
                <div class="desc text-nowrap">
                  <div class="figure-img" style="background-image: url({{$read ? asset('storage/'.$read->img_path) : asset('images/person3.jpg')}});"></div>
                  <h3>{{$read ? $read->name : 'Dave Henderson'}}</h3>
                </div>
              </div>
            </div>
          </div>

        </div>
      {{-- Show Fin --}}
    </div>
  </div>


@endsection

@section('js')
  <script>
    $(document).ready( function () {
      $('#testimonials_table').DataTable({
        "order": [], 
      });
    } );  
  </script>
@endsection