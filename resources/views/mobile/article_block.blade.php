@foreach ($data as $single)
<!-- cards -->
<div class="section mt-2 pt-2">
    <div class="card" style="margin-top: 9%;">
        <img src="{{$single["image"]}}" class="card-img-top" alt="image">
        <div class="card-body">
            @php
                // $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $single['title'])));
                $slug = base64_encode($single['id']);
            @endphp
            <a href="{{  url('m/article/' . $slug)}}">
                <h5 class="card-title">{{$single["title"]}}</h5>
            </a>
            <p class="card-text">{{$single["highlight"]}}</p>
            <p class="card-text"><small>{{$single["published"]}}</small></p>
        </div>
    </div>
</div>
<!-- *cards -->
@endforeach