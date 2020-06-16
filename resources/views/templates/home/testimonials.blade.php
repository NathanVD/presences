<div id="testimonials" class="testimony-img" style="background-image: url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 center-heading text-center colorlib-heading animate-box">
        <h1 class="heading-big">{{$testimonials_title ? $testimonials_title->title : 'What are the students saying'}}</h1>
        <h2>{{$testimonials_title ? $testimonials_title->title : 'What are the students saying'}}</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="testimony-flex justify-content-evenly">
          @if ($testimonials && $testimonials->isNotEmpty())
            @foreach ($testimonials->sortByDesc('created_at')->take(5) as $testimonial)
              <div class="one-fifth animate-box">
                <span class="icon"><i class="icon-quotes-left"></i></span>
                <div class="testimony-wrap">
                  <blockquote>
                    <p>{{$testimonial->review}}</p>
                  </blockquote>
                  <div class="desc">
                    <div class="figure-img" style="background-image: url({{asset('storage/'.$testimonial->img_path)}});"></div>
                    <h3>{{$testimonial->name}}</h3>
                  </div>
                </div>
              </div>                 
            @endforeach
          @else
            <div class="one-fifth animate-box">
              <span class="icon"><i class="icon-quotes-left"></i></span>
              <div class="testimony-wrap">
                <blockquote>
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </blockquote>
                <div class="desc">
                  <div class="figure-img" style="background-image: url(images/person1.jpg);"></div>
                  <h3>Dave Henderson</h3>
                </div>
              </div>
            </div>
            <div class="one-fifth animate-box">
              <span class="icon"><i class="icon-quotes-left"></i></span>
              <div class="testimony-wrap">
                <blockquote>
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>
                </blockquote>
                <div class="desc">
                  <div class="figure-img" style="background-image: url(images/person2.jpg);"></div>
                  <h3>Dave Henderson</h3>
                </div>
              </div>
            </div>
            <div class="one-fifth animate-box">
              <span class="icon"><i class="icon-quotes-left"></i></span>
              <div class="testimony-wrap">
                <blockquote>
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                </blockquote>
                <div class="desc">
                  <div class="figure-img" style="background-image: url(images/person3.jpg);"></div>
                  <h3>Dave Henderson</h3>
                </div>
              </div>
            </div>
            <div class="one-fifth animate-box">
              <span class="icon"><i class="icon-quotes-left"></i></span>
              <div class="testimony-wrap">
                <blockquote>
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
                </blockquote>
                <div class="desc">
                  <div class="figure-img" style="background-image: url(images/person1.jpg);"></div>
                  <h3>Dave Henderson</h3>
                </div>
              </div>
            </div>
            <div class="one-fifth animate-box">
              <span class="icon"><i class="icon-quotes-left"></i></span>
              <div class="testimony-wrap">
                <blockquote>
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>
                </blockquote>
                <div class="desc">
                  <div class="figure-img" style="background-image: url(images/person1.jpg);"></div>
                  <h3>Dave Henderson</h3>
                </div>
              </div>                          
            </div>
          @endif
        </div>
      </div>
    </div>
    {{-- <div class="d-flex justify-content-center w-100 my-3">
      <button class="btn btn-primary">Voir plus</button>
    </div> --}}
  </div>
</div>