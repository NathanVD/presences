@extends('adminlte::page')

@section('content')

  {{-- Slogan --}}
    <form action="{{route('hero.catch.update')}}" method="POST">
      @csrf
      <div class="card card-info">

        <div class="card-header">
          <h3 class="card-title">Slogan du carousel</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>

        <div class="card-body">
          <div class="form-group">
            <label for="catch">Slogan :</label>
            <input name="catch" class="form-control{{($errors->isNotEmpty() ? $errors->first('catch') ? " is-invalid" : " is-valid" : "")}}" id="catch" value="{{$catch ? $catch->catchphrase : ''}}">
          </div>
        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('hero.index')}}" class="btn btn-secondary">Annuler</a>
          </div>
        </div>

      </div>
    </form>
  {{-- Slogan fin --}}

  {{-- Index --}}
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Slides du carousel <a href="{{route('hero.create')}}" class="badge bg-success align-top ml-3"><i class="fas fa-plus"></i></a></h3>
      </div>

      <div class="card-body">
        <div class="row gallery">
          @if (!$slides || $slides->isEmpty())
             <p class="text-center w-100"><b>Aucune slide dans le carousel.</b></p> 
          @else
            @foreach ($slides->sortByDesc('created_at') as $slide)
              <div class="col-sm-2">

                <a href="{{asset('storage/'.$slide->img_path)}}" data-toggle="lightbox" data-title="{{$slide->title}}" data-gallery="gallery">
                  <img src="{{asset('storage/'.$slide->img_path)}}" class="img-fluid mb-2" alt="{{$slide->title}}">
                </a>

                <div class="text-center">
                  <a href='{{route('hero.edit',$slide->id)}}' class='btn btn-warning'>
                    <i class='fas fa-edit'></i>
                  </a>
                  <form action='{{route('hero.destroy',$slide->id)}}' method='POST' class='d-inline-block'>
                    @csrf
                    @method('delete')
                    <button class='btn btn-danger'>
                      <i class='fas fa-trash-alt'></i>
                    </button>
                  </form>
                </div>

              </div>
            @endforeach              
          @endif
        </div>
      </div>
    </div>
  {{-- Index fin --}}

@endsection

@section('js')
  <script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true,
        showArrows: false,
      });
    });
  </script>
@stop