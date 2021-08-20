@include('layout.header');
  <!-- ========== MAIN ========== -->
  <main id="content" role="main">
    <!-- Article Description Section -->
    <div class="container space-top-3 space-bottom-2">
      <div class="w-lg-60 mx-lg-auto">
        <div class="mb-4">
          <h1 class="h2">{{ $data["title"] }}</h1>
        </div>

        <!-- Author -->
        <div class="border-top border-bottom py-4 mb-5">
          <div class="row align-items-md-center">
            <div class="col-md-7 mb-5 mb-md-0">
              <div class="media align-items-center">
                <div class="avatar avatar-circle">
                  <img class="avatar-img" src="{{ url('assets/img/publisher/'.$data["publisher"].'.png') }}" alt="Image Description">
                </div>
                <div class="media-body font-size-1 ml-3">
                  <span class="h6"><a href="blog-profile.html">{{ $data["publisher"] }}</a></span>
                  <span class="d-block text-muted">{{ $data["date"] }}</span>
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="d-flex justify-content-md-end align-items-center">
                <span class="d-block small font-weight-bold text-cap mr-2">Share:</span>

                <a class="btn btn-xs btn-icon btn-soft-secondary rounded-circle ml-2" href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a class="btn btn-xs btn-icon btn-soft-secondary rounded-circle ml-2" href="#">
                  <i class="fab fa-twitter"></i>
                </a>
                <a class="btn btn-xs btn-icon btn-soft-secondary rounded-circle ml-2" href="#">
                  <i class="fab fa-instagram"></i>
                </a>
                <a class="btn btn-xs btn-icon btn-soft-secondary rounded-circle ml-2" href="#">
                  <i class="fab fa-telegram"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- End Author -->
      </div>
      
      <div class="my-4 my-sm-8 text-center">
        <img class="img-fluid rounded-lg" src="{{ $data["article_img"] }}" alt="{{ $data["title"] }}">
      </div>
      
      <blockquote class="bg-soft-primary border-0 rounded-lg text-center text-dark font-size-2 font-weight-bold text-lh-lg p-5 my-5">
        "{{ $data["story_highlights"] }}"
      </blockquote>
      
      <div class="w-lg-60 mx-lg-auto">
        @foreach ($data['article'] as $para)            
          <p>{{ $para }}</p>
        @endforeach

        <p>We will continue to update <a href="#">NewsOnDemand</a>; if you have any questions or suggestions, please contact us!</p>

        <p>Follow us on <a href="#">Twitter</a>, <a href="#">Facebook</a>, <a href="#">YouTube</a>, and <a href="#">Instagram</a>.</p>

        <!-- Badges -->
        <div class="mt-5">
          @php
            $keywords = explode (",", $data['keyword'])
          @endphp
          @foreach ($keywords as $keyword)              
            <a class="btn btn-xs btn-soft-secondary mb-1" href="#">{{$keyword}}</a>
          @endforeach
        </div>
        <!-- End Badges -->

        <!-- Share -->
        <div class="row justify-content-sm-between align-items-sm-center mt-5">
          <div class="col-sm-6 mb-2 mb-sm-0">
            <div class="d-flex align-items-center">
              <span class="d-block small font-weight-bold text-cap mr-2">Share:</span>

              <a class="btn btn-xs btn-icon btn-ghost-secondary rounded-circle mr-2" href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a class="btn btn-xs btn-icon btn-ghost-secondary rounded-circle mr-2" href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a class="btn btn-xs btn-icon btn-ghost-secondary rounded-circle mr-2" href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a class="btn btn-xs btn-icon btn-ghost-secondary rounded-circle mr-2" href="#">
                <i class="fab fa-telegram"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- End Share -->

      </div>
    </div>
    <!-- End Article Description Section -->

    <!-- Blog Card Section -->
    <div class="container">
      <div class="w-lg-75 border-top space-2 mx-lg-auto">
        <div class="mb-3 mb-sm-5">
          <h3>Related News</h3>
        </div>

        <div class="row">
          @foreach ($related_data as $related)              
          <div class="col-md-6">
            <!-- Blog Card -->
            <article class="border-bottom h-100 py-5">
              <div class="row justify-content-between">
                <div class="col-6">
                  <a class="d-block small font-weight-bold text-cap mb-2" href="#">{{ $related["category"] }}</a>
                  <h4 class="mb-0">
                    <a class="text-inherit" href="/article/{{ $related["link"] }}">{{ $related["title"] }}</a>
                  </h4>
                </div>

                <div class="col-5">
                  <img class="img-fluid rounded" src="{{ $related["twitter_img"] }}" alt="{{ $related["title"] }}">
                </div>
              </div>
            </article>
            <!-- End Blog Card -->
          </div>
          @endforeach

        </div>
      </div>
    </div>
    <!-- End Blog Card Section -->


  </main>
  <!-- ========== END MAIN ========== -->
@include('layout.footer');