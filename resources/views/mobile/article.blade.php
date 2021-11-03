@include('mobile.layouts.header')
<!-- App Capsule -->
    
<div id="appCapsule">

    <div class="blog-post">
        <div class="mb-2">
            <img src="{{ $article_data['image'] }}" alt="image" class="imaged square w-100">
        </div>
        <h1 class="title">{{ $article_data["title"] }}</h1>

        <div class="post-header">
            {{ $article_data["published"] }}
        </div>
        <div class="post-body">
            @php
                echo $article_data['article'];
            @endphp
        </div>
    </div>


    <div class="section mt-4">
        <button type="button" class="btn btn-outline-primary btn-block" data-toggle="modal"
            data-target="#actionSheetShare">
            <ion-icon name="share-outline"></ion-icon>
            Share This Post
        </button>
    </div>

<!-- * App Capsule -->

<!-- Share Action Sheet -->
<div class="modal fade action-sheet inset" id="actionSheetShare" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Share with</h5>
            </div>
            <div class="modal-body">
                <ul class="action-button-list">
                    <li>
                        <a href="#" class="btn btn-list" data-dismiss="modal"   onclick="
                        window.open(
                          'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 
                          'facebook-share-dialog', 
                          'width=626,height=436'); 
                        return false;">
                            <span>
                                <ion-icon name="logo-facebook"></ion-icon>
                                Facebook
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="http://twitter.com/share?text={{$article_data['title']}}&url={{url()->current()}}&hashtags={{$article_data['keyword']}}" class="btn btn-list"  target="_blank">
                            <span>
                                <ion-icon name="logo-twitter"></ion-icon>
                                Twitter
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/?text={{urlencode($article_data['title'])}}%20{{url()->current()}}" class="btn btn-list" data-action="share/whatsapp/share" target="_blank">
                            <span>
                                <ion-icon name="logo-whatsapp"></ion-icon>
                                WhatsApp
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- * Share Action Sheet -->
@include('mobile.layouts.menu')
@include('mobile.layouts.footer')