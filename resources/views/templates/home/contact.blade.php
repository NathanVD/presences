<div id="contact" class="colorlib-contact">
  <div class="container">
    <div class="row row-pb-md">
      <div class="col-md-12 animate-box">
        <h2>{{$contact_titles ? $contact_titles->title_1 : 'Informations de contact'}}</h2>
        <div class="row">
          <div class="col-md-12">
            <div class="contact-info-wrap-flex justify-content-between">
              <div class="con-info">
                <p><span><i class="icon-location-2"></i></span> {{$contact ? $contact->adress_1 : 'Place de la Minoterie, 10'}} <br> {{$contact ? $contact->adress_2 : '1080 Molenbeek-Saint-Jean'}}</p>
              </div>
              <div class="con-info">
                <p><span><i class="icon-phone3"></i></span> <a href="tel://{{$contact ? $contact->phone : '+32 412 34 56 78'}}">{{$contact ? $contact->phone : '+32 412 34 56 78'}}</a></p>
              </div>
              <div class="con-info">
                <p><span><i class="icon-paperplane"></i></span> <a href="mailto:{{$contact ? $contact->email : 'nathan@molengeek.com'}}">{{$contact ? $contact->email : 'nathan@molengeek.com'}}</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h2>{{$contact_titles ? $contact_titles->title_2 : 'Nous envoyer un message'}}</h2>
      </div>
      <div class="col-md-6">
        <form action="{{route('inbox.store','#contact')}}" method="POST">
          @csrf
          <div class="row form-group">
            <div class="col-md-6">
              <!-- <label for="fname">First Name</label> -->
              <input type="text" id="fname" name="firstname" class="form-control" placeholder="Prénom">
              @error('firstname')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="col-md-6">
              <!-- <label for="lname">Last Name</label> -->
              <input type="text" id="lname" name="lastname" class="form-control" placeholder="Nom">
              @error('lastname')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <!-- <label for="email">Email</label> -->
              <input type="text" id="contact-email" name="e-mail" class="form-control" placeholder="Adresse e-mail">
              @error('e-mail')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <!-- <label for="subject">Subject</label> -->
              <input type="text" id="subject" name="subject" class="form-control" placeholder="Sujet de votre message">
              @error('subject')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <!-- <label for="message">Message</label> -->
              <textarea name="message" id="message" name="message" cols="30" rows="10" class="form-control" placeholder="Dites-nous quelque chose"></textarea>
            @error('message')
              <small class="text-danger">{{ $message }}</small>
            @enderror
            </div>
          </div>
          <div class="form-group">
            <input type="submit" value="Envoyer" class="btn btn-primary">
          </div>
        </form>		
      </div>
      <div class="col-md-6">
        {{-- <div id="map" class="colorlib-map"></div> --}}
        <iframe src="{{$map ? $map->url : 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2518.693327187696!2d4.3390363157460925!3d50.855362979533275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c38c275028d3%3A0xc7799151146ebf77!2sMolenGeek!5e0!3m2!1sfr!2sbe!4v1591865123097!5m2!1sfr!2sbe'}}" width="550" height="550" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
    </div>
  </div>
</div>