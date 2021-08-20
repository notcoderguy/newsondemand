@include('layout.header');
@php
  $news_count = count($data);
  $featured = rand(0, $news_count);
@endphp
  <!-- ========== MAIN ========== -->
  <main id="content" role="main">
    <!-- Hero Section -->
    <div class="container space-top-3 space-top-lg-4 space-bottom-1 space-bottom-md-2">
      <div class="w-md-80 w-lg-75 text-center mx-md-auto">
        <h1 class="display-4">NewsOnDemand</h1>
        <p class="lead">Latest updates and Hand-picked resources.</p>
      </div>
    </div>
    <!-- End Hero Section -->

    <!-- Blog Card Section -->
    <div class="container space-top-md-2 space-bottom-2 space-bottom-lg-3">
      {{-- <div class="row justify-content-lg-between align-items-lg-center mb-7">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <!-- Tags -->
          <div class="d-sm-flex align-items-sm-center text-center text-sm-left">
            <span class="d-block mr-sm-3 mb-2 mb-sm-1">Tags:</span>
            <a class="btn btn-xs btn-soft-secondary btn-pill mx-sm-1 mb-1" href="javascript:;">Business</a>
            <a class="btn btn-xs btn-soft-secondary btn-pill mx-sm-1 mb-1" href="javascript:;">Health</a>
            <a class="btn btn-xs btn-soft-secondary btn-pill mx-sm-1 mb-1" href="javascript:;">Environment</a>
            <a class="btn btn-xs btn-soft-secondary btn-pill mx-sm-1 mb-1" href="javascript:;">Adventure</a>
          </div>
          <!-- End Tags -->
        </div>

        <div class="col-lg-4">
          <!-- Input -->
          <form class="input-group input-group-sm input-group-merge input-group-flush">
            <input type="search" class="form-control" placeholder="Search articles" aria-label="Search articles" aria-describedby="searchLabel">
            <div class="input-group-append">
              <div class="input-group-text" id="searchLabel">
                <i class="fas fa-search"></i>
              </div>
            </div>
          </form>
          <!-- End Input -->
        </div>
      </div> --}}

      <!-- Blog Card -->
      <article class="card mb-11">
        <div class="row no-gutters">
          <div class="col-lg-8">
            <div class="position-relative overflow-hidden">
              <img class="card-img" src="{{ $data[$featured]["twitter_img"] }}" alt="{{ $data[$featured]["twitter_title"] }}">
              <figure class="d-none d-lg-block">
                <svg class="ie-curved-x position-absolute top-0 right-0 bottom-0 mr-n1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 100.1 1920" height="101%">
                  <path fill="#fff" d="M0,1920c0,0,93.4-934.4,0-1920h100.1v1920H0z"/>
                </svg>
              </figure>
              <figure class="d-lg-none mb-n1">
                <svg class="ie-curved-y position-absolute right-0 bottom-0 left-0" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1920 100.1">
                  <path fill="#fff" d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z"/>
                </svg>
              </figure>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card-body d-flex flex-column h-100 p-4 p-lg-5">
              <h2><a class="text-inherit" href="/article/{{ $data[$featured]["link"] }}">{{ $data[$featured]["twitter_title"] }}</a></h2>
              <div class="media align-items-center mt-auto">
                <div class="avatar-group">
                  <a class="avatar avatar-xs avatar-circle" href="#" data-toggle="tooltip" data-placement="top" title="{{ $data[$featured]["publisher"] }}">
                    <img class="avatar-img" src="assets/img/publisher/{{ $data[$featured]["publisher"] }}.png" alt="{{ $data[$featured]["publisher"] }}">
                  </a>
                </div>
                <div class="media-body d-flex justify-content-end text-muted font-size-1 ml-2">
                  {{ $data[$featured]["date"] }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </article>
      <!-- End Blog Card -->

      <!-- Title -->
      <div class="row mb-5">
        <div class="col-6">
          <h2 class="h3 mb-0">Latest news</h2>
        </div>
        <div class="col-6 text-right">
          <a class="font-weight-bold" href="/all">View all <i class="fas fa-angle-right fa-sm ml-1"></i></a>
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
              <h3><a class="text-inherit" href="/article/{{$single["link"]}}">{{$single["twitter_title"]}}</a></h3>
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

      <!-- Pagination -->
      <nav aria-label="Page navigation">
        <ul class="pagination mb-0">
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
          <li class="page-item"><a class="page-link" href="#">5</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span class="d-none d-sm-inline-block mr-1">Next</span>
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- End Pagination -->
    </div>
    <!-- End Blog Card Section -->
  </main>
  <!-- ========== END MAIN ========== -->

@include('layout.footer');