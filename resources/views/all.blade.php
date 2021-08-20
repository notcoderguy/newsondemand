@include('layout.header');
  <!-- ========== MAIN ========== -->
  <main id="content" role="main">
    <!-- Hero Section -->
    <div class="container space-top-3 space-top-lg-4 space-bottom-1 space-bottom-md-2">
      <div class="w-md-80 w-lg-75 text-center mx-md-auto">
        <h1 class="display-4">NewsOnDemand</h1>
        <p class="lead">All updates and Hand-picked resources.</p>
      </div>
    </div>
    <!-- End Hero Section -->

    <!-- Blog Card Section -->
    <div class="container space-top-md-2 space-bottom-2 space-bottom-lg-3">
      <!-- Title -->
      <div class="row mb-5">
        <div class="col-6">
          <h2 class="h3 mb-0">All news</h2>
        </div>
      </div>
      <!-- End Title -->

      <div class="row mb-3">
        
        @foreach ($data as $single)
        <div class="col-sm-6 col-lg-4 mb-3 mb-sm-8">
          <!-- Blog Card -->
          <article class="card h-100">
            <div class="card-img-top position-relative">
              <img class="card-img-top" src="{{$single["twitter_img"]}}" alt="Image Description">
              <figure class="ie-curved-y position-absolute right-0 bottom-0 left-0 mb-n1">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1920 100.1">
                  <path fill="#fff" d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z"/>
                </svg>
              </figure>
            </div>

            <div class="card-body">
              <h3><a class="text-inherit" href="{{$single["link"]}}">{{$single["twitter_title"]}}</a></h3>
              <p>{{$single["twitter_desc"]}}</p>
            </div>

            <div class="card-footer border-0 pt-0">
              <div class="media align-items-center">
                <div class="avatar-group">
                  <a class="avatar avatar-xs avatar-circle" href="#" data-toggle="tooltip" data-placement="top" title="{{$single["publisher"]}}">
                    <img class="avatar-img" src="/assets/img/publisher/{{$single["publisher"]}}.png" alt="{{$single["publisher"]}}">
                  </a>
                </div>
                <div class="media-body d-flex justify-content-end text-muted font-size-1 ml-2">
                  {{$single["date"]}}
                </div>
              </div>
            </div>
          </article>
          <!-- End Blog Card -->
        </div>
        @endforeach

      </div>
        
    </div>
    <!-- End Blog Card Section -->
  </main>
  <!-- ========== END MAIN ========== -->

@include('layout.footer');