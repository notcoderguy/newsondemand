@include('mobile.layouts.header')

<div id="appCapsule">

    <div id="aricle-block">
        @include('mobile.article_block')
    </div>

    <!-- loader -->
    <div class="ajax-load pt-4 pb-4" style="align-content: center; text-align:center; margin: auto; display:none;">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- * loader -->

@include('mobile.layouts.menu')
@include('mobile.layouts.footer')