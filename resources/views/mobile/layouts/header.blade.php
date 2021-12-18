<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Home | NewsOnDemand</title>

    <meta property="og:title" content="your_link_title">
    <meta property="og:image" content="your_image_url">
    <meta property="og:url" content="https://example.com/path" />

    <meta name="description" content="">
    <meta name="keywords" content="" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.jpg') }}" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon.jpg') }}">
    <link rel="stylesheet" href="{{ asset('css/mobile-app.css') }}">
    <link rel="manifest" href="{{ asset('__manifest.json')}}">
</head>
<body>

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- header -->
    <div class="appHeader">
        <div class="left">
            <a href="javascript:;" class="headerButton toggle-searchbox">
                <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            <a href="{{url('m/')}}">
                <img src="{{asset('img/logo.png')}}" alt="logo" height="32px" width="196px">
            </a>
        </div>
        <div class="right">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input dark-mode-switch" id="darkmodeswitch">
                <label class="custom-control-label" for="darkmodeswitch"></label>
            </div>
        </div>
    </div>
    <!-- * header -->

    <!-- Search Component -->
    <div id="search" class="appHeader">
        <form class="search-form" action="{{ url('m/search') }}" method="GET">
            @csrf
            <div class="form-group searchbox">
                <input type="text" name="search" class="form-control" placeholder="Search...">
                <i class="input-icon">
                    <ion-icon name="search-outline"></ion-icon>
                </i>
                <a href="javascript:;" class="ml-1 close toggle-searchbox">
                    <ion-icon name="close-circle"></ion-icon>
                </a>
            </div>
        </form>
    </div>
    <!-- * Search Component -->