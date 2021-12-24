@foreach ($data as $single)
    <div class="p-4 lg:w-1/3 md:w-full flex flex-grow">
        @php
            $slug = base64_encode($single['id']);
            $title = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $single['title'])));

            $title = $single['title'];
            $timestamp = $single['created_at'];
            $image = $single['image'];

            // Replace spaces with dashes
            $title_mod = preg_replace("/[^A-Za-z0-9 ]/", ' ', $title);
            $title_mod = preg_replace('/\s\s+/', ' ', $title_mod);
            $title_mod = preg_replace('/\s+/', '-', $title_mod);
            $title_mod = strtolower($title_mod);
            $title_mod = ltrim($title_mod, '-');
            $title_mod = rtrim($title_mod, '-');

            // Break up timestamp into date, month, and year
            $timestamp_mod = new \DateTime($timestamp);
            $year = $timestamp_mod->format('Y');
            $month = $timestamp_mod->format('m');
            $day = $timestamp_mod->format('d');

            // Get extension of image from url
            $extension = pathinfo($image, PATHINFO_EXTENSION);

            $cdn_img_url = "https://cdn.newsondemand.in/img/news/{$year}/{$month}/{$day}/{$title_mod}.{$extension}";
        @endphp
        <div class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ url('article/' . $slug . '/' . $title) }}">
                @if ($single['cdn_image'] == 1)
                    <img src="{{ $cdn_img_url }}" alt="image" class="rounded-t-lg">
                @else
                    <img class="rounded-t-lg" src="{{ $single['image'] }}" alt="" />
                @endif
            </a>
            <div class="p-5">
                <a href="{{ url('categories/' . $single['category']) }}">
                    <h2
                        class="tracking-widest text-xs title-font font-medium text-gray-400 pb-2 dark:text-gray-200 mb-1 uppercase">
                        {{ $single['category'] }}</h2>
                </a>
                <a href="{{ url('article/' . $slug . '/' . $title) }}">
                    <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 dark:text-white">
                        {{ $single['title'] }}</h5>
                </a>
                {{-- <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">{{$single["twitter_description"]}}</p> --}}
            </div>
        </div>
    </div>
@endforeach
