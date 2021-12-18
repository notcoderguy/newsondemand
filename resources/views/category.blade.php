@php
    $link = url()->current();
    $link_array = explode('/',$link);
    $page = strtoupper(end($link_array));
@endphp

@section('title_before', " '$page' | ")

@extends('layouts.base')

@php        
    $infiniteScroll = true;
@endphp

@section('body')
    <div class="flex flex-grow flex-col dark:bg-black ">
        <section class="text-gray-400 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full mb-20">
                    <h1 class="text-2xl font-black title-font mb-4 text-gray-900 dark:text-white">{{ $page }}</h1>
                </div>
                <div class="flex flex-wrap m-4" id="article-block">
                        @include('article_block')
                </div>
            </div>
        </section>

        <!-- loader -->
        <div class="ajax-load pt-4 pb-4 flex items-center justify-center container mx-auto" style="display: none;">
            <p class="font-medium dark:text-gray-300 body-font">LOADING...</p>
        </div>
        <!-- * loader -->
    </div>
@endsection
