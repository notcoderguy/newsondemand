@section('title_before', 'About Us |')

@extends('layouts.base')

@section('body')
    <div class="flex flex-grow flex-col dark:bg-black ">
        <section class="text-gray-400 body-font">
            <div class="container px-5 py-24 mx-auto">
              <div class="flex flex-col text-center w-full mb-20">
                <h1 class="text-2xl font-bold title-font mb-4 text-gray-900 dark:text-white">ABOUT US</h1>
                <p class="lg:w-2/3 mx-auto text-gray-900 dark:text-white leading-relaxed text-base">NewsOnDemand is a news aggregator website. The project is coded in Laravel {{ $version = app()->version(); }}, frontend is designed with Tailwind CSS and the aggregators are written in python. This website should be treated as project for college purposes and hence no liability is with the developers or any authority whatsoever. Hope you like our project. Add more website in the python aggregator by forking it on GitHub.</p>
              </div>
              <div class="flex flex-wrap -m-4">
                <div class="p-4 lg:w-1/4 md:w-1/2">
                  <div class="h-full flex flex-col items-center text-center">
                    <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="https://cdn.vasugrover.in/img/itzme.jpeg">
                    <div class="w-full">
                      <a href="https://github.com/not-coder-guy/">
                        <h2 class="title-font font-bold text-lg text-gray-900 dark:text-white">Vasu Grover</h2>
                      </a>
                      <h3 class="text-gray-500 mb-3">Backend Developer</h3>
                    </div>
                  </div>
                </div>
                <div class="p-4 lg:w-1/4 md:w-1/2">
                  <div class="h-full flex flex-col items-center text-center">
                    <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-top mb-4" style="filter: grayscale(1);" src="https://avatars.githubusercontent.com/u/63443330?v=4">
                    <div class="w-full">
                      <a href="https://github.com/Rishi-Sharma2002">
                        <h2 class="title-font font-bold text-lg text-gray-900 dark:text-white">Rishi Sharma</h2>
                      </a>
                      <h3 class="text-gray-500 mb-3">News Aggregator</h3>
                    </div>
                  </div>
                </div>
                <div class="p-4 lg:w-1/4 md:w-1/2">
                  <div class="h-full flex flex-col items-center text-center">
                    <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" style="filter: grayscale(1);" src="{{ asset('img/vaibhav_agarwal.jpg') }}">
                    <div class="w-full">
                      <a href="https://github.com/vaibhavagarwal47">
                        <h2 class="title-font font-bold text-lg text-gray-900 dark:text-white">Vaibhav Agarwal</h2>
                      </a>
                      <h3 class="text-gray-500 mb-3">UI Developer</h3>
                    </div>
                  </div>
                </div>
                <div class="p-4 lg:w-1/4 md:w-1/2">
                  <div class="h-full flex flex-col items-center text-center">
                    <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-top mb-4" style="filter: grayscale(1);" src="{{ asset('img/naman_kumar.png') }}">
                    <div class="w-full">
                      <a href="https://github.com/namank032">
                        <h2 class="title-font font-bold text-lg text-gray-900 dark:text-white">Naman Kumar</h2>
                      </a>
                      <h3 class="text-gray-500 mb-3">UI Developer</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
    </div>
@endsection
