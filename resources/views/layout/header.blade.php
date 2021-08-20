<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Title -->
  <title>NewsOnDemand | Home</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{url('/favicon.ico')}}">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="{{url('/assets/vendor/fontawesome/css/all.min.css')}}">

  <!-- CSS NOD Template -->
  <link rel="stylesheet" href="{{url('/assets/css/theme.min.css')}}">
</head>
<body>
  <!-- ========== HEADER ========== -->
  <header id="header" class="header header-box-shadow-on-scroll header-white-nav-links-lg header-sticky-top">
    <div class="header-section bg-dark">
      <div id="logoAndNav" class="container">
        <!-- Nav -->
        <nav class="js-mega-menu navbar navbar-expand-lg">
          <!-- Logo -->
          <a class="navbar-brand" href="/" aria-label="NOD">
            <img src="" alt="NOD">
          </a>
          <!-- End Logo -->

          <!-- Responsive Toggle Button -->
          <button type="button" class="navbar-toggler btn btn-icon btn-sm rounded-circle"
          aria-label="Toggle navigation"
          aria-expanded="false"
          aria-controls="navBar"
          data-toggle="collapse"
          data-target="#navBar">
    <span class="navbar-toggler-default">
      <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
        <path fill="currentColor" d="M17.4,6.2H0.6C0.3,6.2,0,5.9,0,5.5V4.1c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,5.9,17.7,6.2,17.4,6.2z M17.4,14.1H0.6c-0.3,0-0.6-0.3-0.6-0.7V12c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,13.7,17.7,14.1,17.4,14.1z"/>
      </svg>
    </span>
    <span class="navbar-toggler-toggled">
      <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
        <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
      </svg>
    </span>
  </button>
          <!-- End Responsive Toggle Button -->

          <!-- Navigation -->
          <div id="navBar" class="collapse navbar-collapse">
            <div class="navbar-body">
              <ul class="navbar-nav">

                <!-- Home -->
                <li class="navbar-nav-item">
                  <a class="nav-link active" href="{{ url('/') }}" aria-haspopup="true" aria-expanded="false">Home</a>
                </li>
                <!-- End Home -->

                <!-- India -->
                <li class="navbar-nav-item">
                  <a class="nav-link header-white-nav-links-lg" href="{{ url('/categories/india-news') }} " aria-haspopup="true" aria-expanded="false">India</a>
                </li>
                <!-- End -->

                <!-- SEA -->
                <li class="navbar-nav-item">
                  <a class="nav-link header-white-nav-links-lg" href="{{ url('/categories/south-asia') }} " aria-haspopup="true" aria-expanded="false">SEA</a>
                </li>
                <!-- End SEA -->
                
                <!-- World -->
                <li class="navbar-nav-item">
                  <a class="nav-link header-white-nav-links-lg" href="{{ url('/categories/world') }} " aria-haspopup="true" aria-expanded="false">World</a>
                </li>
                <!-- End World -->                
                
                <!-- Entertainment -->
                <li class="navbar-nav-item">
                  <a class="nav-link" href="{{ url('/categories/entertainment') }}" aria-haspopup="true" aria-expanded="false">Entertainment</a>
                </li>
                <!-- End Entertainment -->
                
                <!-- Science -->
                <li class="navbar-nav-item">
                  <a class="nav-link" href="{{ url('/categories/science') }}" aria-haspopup="true" aria-expanded="false">Science</a>
                </li>
                <!-- End Science -->                

                <!-- Sports -->
                <li class="navbar-nav-item">
                  <a class="nav-link" href="{{ url('/categories/sports') }}" aria-haspopup="true" aria-expanded="false">Sports</a>
                </li>
                <!-- End Sports -->

              </ul>
            </div>
          </div>
          <!-- End Navigation -->
        </nav>
        <!-- End Nav -->
      </div>
    </div>
  </header>
  <!-- ========== END HEADER ========== -->