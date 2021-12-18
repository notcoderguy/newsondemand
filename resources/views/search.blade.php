@section('title_before', 'Home |')

@extends('layouts.base')

@section('body')
    <div class="flex flex-grow flex-col dark:bg-black ">
        <section class="text-gray-400 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full mb-20">
                    <h1 class="text-3xl font-black title-font mb-4 text-gray-900 dark:text-white">Search Results for <span class="uppercase">"{{$search}}"</span></h1>
                </div>
                <div class="flex flex-wrap m-4" id="article-block">
                        @include('article_block')
                </div>
            </div>
        </section>
    </div>
@endsection
