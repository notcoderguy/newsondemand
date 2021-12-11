        <!-- footer -->
        <div class="appFooter mt-2">
            <div class="footer-title mb-6">
                Copyright © NewsOnDemand {{$year}}. All Rights Reserved.
            </div>

            <a href="#" class="button bg-primary goTop">
                <ion-icon name="arrow-up-outline"></ion-icon>
            </a>
        </div>
    </div>
        <!-- *footer -->

        <!-- ///////////// Js Files ////////////////////  -->
        <!-- Jquery -->
        <script src="{{ asset('js/lib/jquery-3.4.1.min.js') }}"></script>
        <!-- Bootstrap-->
        <script src="{{ asset('js/lib/popper.min.js') }}"></script>
        <script src="{{ asset('js/lib/bootstrap.min.js') }}"></script>
        <!-- Ionicons -->
        <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
        <!-- Owl Carousel -->
        <script src="{{ asset('js/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
        <!-- jQuery Circle Progress -->
        <script src="{{ asset('js/plugins/jquery-circle-progress/circle-progress.min.js') }}"></script>
        <!-- Base Js File -->
        <script src="{{ asset('js/mobile-app.js') }}"></script>
        <script>
            var page = 1;
            $(window).scroll(function(){
                if($(window).scrollTop() + $(window).height() >= $(document).height() - 100){
                    page++;
                    loadMoreNews(page);
                }
            });

            function loadMoreNews(page)
            {
                $.ajax({
                    url:'?page=' + page,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:'get',
                    beforesend: function()
                    {
                        $(".ajax-load").show();
                    }
                })
                .done(function(data){
                    if (data.html == '{"message": "Server Error"}{"message": "Server Error"}'){
                        $(".ajax-load").html('<div class="alert alert-danger mb-1" role="alert"> A simple danger alert—check it out! </div>');
                        return;
                    } else if (data.html == " "){
                        $(".ajax-load").html('<div class="alert alert-danger mb-1" role="alert"> A simple danger alert—check it out! </div>');
                        return;                        
                    }
                    $('.ajax-load').hide();
                    $("#aricle-block").append(data.html);
                })
                .fail(function(jqXHR, ajaxOp, thrownError){
                    $(".ajax-load").html('<div class="alert alert-danger mb-1" role="alert"> A simple danger alert—check it out! </div>');
                })
            }
        </script>
</body>

</html>