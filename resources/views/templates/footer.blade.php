<footer id="colorlib-footer">
  <div class="container">
    <div class="row row-pb-md">
      <div class="col-md-3 colorlib-widget">
        <h4>Contact Info</h4>
        <ul class="colorlib-footer-links">
          <li>{{$contact ? $contact->adress_1 : 'Place de la Minoterie, 10'}} <br> {{$contact ? $contact->adress_2 : '1080 Molenbeek-Saint-Jean'}}</li>
          <li><a href="tel://{{$contact ? $contact->phone : '+32 412 34 56 78'}}"><i class="icon-phone"></i> {{$contact ? $contact->phone : '+32 412 34 56 78'}}</a></li>
          <li><a href="mailto:{{$contact ? $contact->email : 'nathan@molengeek.com'}}"><i class="icon-envelope"></i> {{$contact ? $contact->email : 'nathan@molengeek.com'}}</a></li>
        </ul>
      </div>
      <div class="col-md-2 colorlib-widget">
        <h4>Programs</h4>
        <p>
          <ul class="colorlib-footer-links">
            <li><a href="#"><i class="icon-check"></i> Diploma Degree</a></li>
            <li><a href="#"><i class="icon-check"></i> BS Degree</a></li>
            <li><a href="#"><i class="icon-check"></i> Beginner</a></li>
          </ul>
        </p>
      </div>
      <div class="col-md-2 colorlib-widget">
        <h4>Sections</h4>
        <p>
          <ul class="colorlib-footer-links">
            <li><a href="/"><i class="icon-check"></i> Profil</a></li>
            <li><a href="#about-us"><i class="icon-check"></i> À propos</a></li>
            <li><a href="#team"><i class="icon-check"></i> Team</a></li>
            <li><a href="#testimonials"><i class="icon-check"></i> Témoignages</a></li>
            <li><a href="#contact"><i class="icon-check"></i> Contact</a></li>
          </ul>
        </p>
      </div>

      <div class="col-md-2 colorlib-widget">
        <h4>Support</h4>
        <p>
          <ul class="colorlib-footer-links">
            <li><a href="#"><i class="icon-check"></i> Documentation</a></li>
            <li><a href="#"><i class="icon-check"></i> Forums</a></li>
            <li><a href="#"><i class="icon-check"></i> Help &amp; Support</a></li>
          </ul>
        </p>
      </div>

      <div class="col-md-3 colorlib-widget">
        <h4>Recent Post</h4>
        <div class="f-blog">
          <a href="blog.html" class="blog-img" style="background-image: url(images/blog-1.jpg);">
          </a>
          <div class="desc">
            <h2><a href="blog.html">Creating Mobile Apps</a></h2>
            <p class="admin"><span>18 April 2018</span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copy">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <p><small></small></p>
          <p>
            <small class="block">&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small><br> 
            <small class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a>, <a href="http://pexels.com/" target="_blank">Pexels</a></small>
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>
