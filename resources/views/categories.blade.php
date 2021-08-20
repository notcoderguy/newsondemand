@include('layout.header');
  <!-- ========== MAIN ========== -->
  <main id="content" role="main">
    <!-- Hero Section -->
    <div class="container space-top-3 space-top-lg-4 space-bottom-1 space-bottom-md-2">
      <div class="w-md-80 w-lg-75 text-center mx-md-auto">
        <h1 class="display-4">{{ $category }}</h1>
      </div>
    </div>
    <!-- End Hero Section -->

    <!-- Blog Listing Section -->
    <div class="container space-bottom-3">
      <div class="w-md-75 w-lg-60 mx-md-auto">
        @foreach ($data as $single)
            
        <!-- End Blog Card -->
        <article class="card mb-3 mb-sm-5">
          <img class="card-img-top" src="{{$single["twitter_img"]}}" alt="{{$single["twitter_title"]}}">

          <div class="card-body">
            <a class="d-block small font-weight-bold text-cap mb-2" href="#">Business</a>

            <h2 class="h3"><a class="text-inherit" href="/article/{{$single["link"]}}">{{$single["twitter_title"]}}</a></h2>

            <p>{{$single["twitter_desc"]}}</p>

            <div class="media align-items-center pt-5">
              <div class="avatar-group">
                <div class="avatar avatar-xs avatar-circle" data-toggle="tooltip" data-placement="top" title="WION">
                  <img class="avatar-img" src="/assets/img/publisher/{{$single["publisher"]}}.png" alt="wion">
                </div>
              </div>
              <div class="media-body d-flex justify-content-end text-muted font-size-1 ml-2">
                {{$single["date"]}}
              </div>
            </div>
          </div>
        </article>
        <!-- End Blog Card -->
        @endforeach

        <div class="space-bottom-2"></div>

        {{-- <!-- Pagination -->
        <nav aria-label="Page navigation">
          <ul class="pagination mb-0">
            <li class="page-item mr-auto">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="d-none d-sm-inline-block ml-1">Prev</span>
              </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item ml-auto">
              <a class="page-link" href="#" aria-label="Next">
                <span class="d-none d-sm-inline-block mr-1">Next</span>
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Pagination --> --}}
      </div>
    </div>
    <!-- End Blog Listing Section -->
  </main>
  <!-- ========== END MAIN ========== -->

@include('layout.footer');