
  <!-- ========== FOOTER ========== -->
  <footer class="bg-dark">
    <div class="container">
      <div class="space-1">
        <div class="row align-items-md-center mb-7">
          <div class="col-md-6 mb-4 mb-md-0">
            <!-- Nav Link -->
            <ul class="nav nav-sm nav-white nav-x-sm align-items-center">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/privacy-policy') }}">Privacy &amp; Policy</a>
              </li>
              <li class="nav-item opacity mx-3">&#47;</li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/terms-conditions') }}">Terms</a>
              </li>
              {{-- <li class="nav-item opacity mx-3">&#47;</li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/sitemap') }}">Site Map</a>
              </li> --}}
            </ul>
            <!-- End Nav Link -->
          </div>

          <div class="col-md-6 text-md-right">
            <ul class="list-inline mb-0">
              <!-- Social Networks -->
              <li class="list-inline-item">
                <a class="btn btn-xs btn-icon btn-soft-light" href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-xs btn-icon btn-soft-light" href="#">
                  <i class="fab fa-instagram"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-xs btn-icon btn-soft-light" href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <!-- End Social Networks -->

              <!-- Language -->
              <li class="list-inline-item">
                <div class="hs-unfold">
                  <a class="js-hs-unfold-invoker btn btn-xs btn-soft-light" href="javascript:;"
                     data-hs-unfold-options='{
                        "target": "#footerLanguage",
                        "type": "css-animation",
                        "animationIn": "slideInDown"
                       }'>
                    <img class="dropdown-item-icon" src="{{url('/assets/vendor/flag-icon-css/flags/4x3/in.svg')}}" alt="Indian Flag">
                    <span>India</span>
                  </a>
                </div>
              </li>
              <!-- End Language -->
            </ul>
          </div>
        </div>

        <!-- Copyright -->
        <div class="w-md-75 text-lg-center mx-lg-auto">
          <p class="text-white opacity-sm small">&copy; NewsOnDemand. 2021 NewsOnDemand. All rights reserved.</p>
          <p class="text-white opacity-sm small">When you visit or interact with our sites, services or tools, we or our authorised service providers may use cookies for storing information to help provide you with a better, faster and safer experience and for marketing purposes.</p>
        </div>
        <!-- End Copyright -->
      </div>
    </div>
  </footer>
  <!-- ========== END FOOTER ========== -->

  <!-- Go to Top -->
  <a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;"
     data-hs-go-to-options='{
       "offsetTop": 700,
       "position": {
         "init": {
           "right": 15
         },
         "show": {
           "bottom": 15
         },
         "hide": {
           "bottom": -15
         }
       }
     }'>
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- End Go to Top -->

  <!-- JS Global Compulsory  -->
  <script src="{{url('/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{url('/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js')}}"></script>
  <script src="{{url('/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

  <!-- JS Implementing Plugins -->
  <script src="{{url('/assets/vendor/hs-header/dist/hs-header.min.js')}}"></script>
  <script src="{{url('/assets/vendor/hs-go-to/dist/hs-go-to.min.js')}}"></script>
  <script src="{{url('/assets/vendor/hs-unfold/dist/hs-unfold.min.js')}}"></script>
  <script src="{{url('/assets/vendor/hs-show-animation/dist/hs-show-animation.min.js')}}"></script>
  <script src="{{url('/assets/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>

  <!-- JS Front -->
  <script src="{{url('/assets/js/theme.min.js')}}"></script>

  <!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function () {
      // INITIALIZATION OF HEADER
      // =======================================================
      var header = new HSHeader($('#header')).init();

      // INITIALIZATION OF UNFOLD
      // =======================================================
      var unfold = new HSUnfold('.js-hs-unfold-invoker').init();


      // INITIALIZATION OF SHOW ANIMATIONS
      // =======================================================
      $('.js-animation-link').each(function () {
        var showAnimation = new HSShowAnimation($(this)).init();
      });

      // INITIALIZATION OF GO TO
      // =======================================================
      $('.js-go-to').each(function () {
        var goTo = new HSGoTo($(this)).init();
      });
    });
  </script>
</body>
</html>