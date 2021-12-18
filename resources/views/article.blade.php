@section('title_before')
    {{ $article_data["title"] }} | 
@endsection

@extends('layouts.base')

@section('body')
    <div class="flex flex-grow flex-col dark:bg-black ">
        <section class="text-gray-400 body-font">
            <div class="container px-5 mx-auto">
                <div class="flex flex-wrap m-4" id="article-block">
                    <div class="flex container items-center justify-center text-3xl pt-12 pb-12 text-gray-900 dark:text-gray-0 font-extrabold">
                        <h1 class="title">{{ $article_data["title"] }}</h1>
                    </div>
                    <div class=" flex container items-center justify-center p-6 w-full h-full">
                        <img src="{{ $article_data['image'] }}" alt="image" class="imaged square w-100">
                    </div>
                    
                    <div class="container w-full md:max-w-3xl mx-auto">
                        {{-- <div class="post-header text-base font-mono font-medium pb-12">
                            {{ $article_data["published"] }}
                        </div> --}}
                        <div class="post-body text-lg font-sans font-normal space-y-6 text-gray-900 dark:text-gray-100">
                            @php
                                $lines_arr = explode("</p>",$article_data['article']);
                                $string = '';
                                for($i=0; $i<(count($lines_arr)-1); $i++){
                                    //with the help of strpos
                                    if(strpos($lines_arr[$i], "read |") == false && strpos($lines_arr[$i], "READ:") == false && strpos($lines_arr[$i], "READ |") == false && strpos($lines_arr[$i], "Read:") == false && strpos($lines_arr[$i], "Read |") == false && strpos($lines_arr[$i], "read:") == false){
                                        $string .= $lines_arr[$i];                                                
                                    }
                                }
                                echo $string;
                                // echo $article_data['article'];
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
