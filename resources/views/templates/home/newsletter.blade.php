<div id="subscribe" class="subs-img" style="background-image: url({{$background ? asset('storage/'.$background->img_path) : 'images/img_bg_2.jpg'}});" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
        <h2>{{$newsletter ? $newsletter->title : 'Abonnez-vous à notre newsletter'}}</h2>
        <p>{{$newsletter ? $newsletter->description : 'Abonnez-vous à notre newsletter et recevez toutes les dernières infos'}}</p>
      </div>
    </div>
    <div class="row animate-box">
      <div class="col-md-6 col-md-offset-3">
        <div class="row">
          <div class="col-md-12">
          <form class="form-inline qbstp-header-subscribe" action="{{route('newsletter.subscribe','#colorlib-subscribe')}}" method="POST">
            @csrf
            <div class="col-three-forth">
              <div class="form-group">
                <input type="text" class="form-control" id="email" name="email" placeholder="Entrez votre adresse e-mail">
                @error('email')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <div class="col-one-third">
              <div class="form-group">
                <button type="submit" class="btn btn-primary">S'abonner</button>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>