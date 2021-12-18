@foreach ($data as $single)
    <div class="p-4 lg:w-1/3 md:w-full flex flex-grow">
        @php
            $slug = base64_encode($single['id']);
        @endphp
        <div class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ url('article/' . $slug) }}">
                <img class="rounded-t-lg" src="{{ $single['image'] }}" alt="" />
            </a>
            <div class="p-5">
                <a href="{{ url('categories/' . $single['category']) }}">
                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 pb-2 dark:text-gray-200 mb-1 uppercase">{{ $single['category'] }}</h2>
                </a>
                <a href="{{ url('article/' . $slug) }}">
                    <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 dark:text-white">
                        {{ $single['title'] }}</h5>
                </a>
                {{-- <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">{{$single["twitter_description"]}}</p> --}}
            </div>
        </div>
    </div>
@endforeach
