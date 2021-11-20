@extends('layouts.frontend.messengermaster')
@section('content')
<div class="flex lg:flex-row flex-col items-center lg:py-8 lg:space-x-8">

    <div>
        <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full m-0.5 mr-2  w-56 h-56 relative overflow-hidden uk-transition-toggle">
            <img src="{{ asset('user/images/'.$user->image) }}" class="bg-gray-200 border-4 border-white rounded-full w-full h-full dark:border-gray-900">

            <div class="absolute -bottom-3 custom-overly1 flex justify-center pt-4 pb-7 space-x-3 text-2xl text-white uk-transition-slide-bottom-medium w-full">
                <a href="#" class="hover:text-white">
                    <i class="uil-camera"></i>
                </a>
                <a href="#" class="hover:text-white">
                    <i class="uil-crop-alt"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="lg:w/8/12 flex-1 flex flex-col lg:items-start items-center">

        <h2 class="font-semibold lg:text-2xl text-lg mb-2">{{ $user->username }}</h2>
        <p class="lg:text-left mb-2 text-center  dark:text-gray-100">{!! $user->description !!}</p>



            <div class="capitalize flex font-semibold space-x-3 text-center text-sm my-2">


                <div>



                <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base dark:bg-gray-900 uk-drop" uk-drop="mode: click">


                </div>

                </div>

            </div>

            <div class="divide-gray-300 divide-transparent divide-x grid grid-cols-3 lg:text-left lg:text-lg mt-3 text-center w-full dark:text-gray-100">
                <div class="flex lg:flex-row flex-col"> {{ $user->profile->covid_status }}<strong class="lg:pl-2"></strong></div>
                <div class="lg:pl-4 flex lg:flex-row flex-col"> {{ $user->profile->age }} <strong class="lg:pl-2"></strong></div>
                <div class="lg:pl-4 flex lg:flex-row flex-col"> {{ $user->profile->pronouns }} <strong class="lg:pl-2"></strong></div>
            </div>
    </div>
    <div class="w-20"></div>
</div>
<h1 class="lg:text-2xl text-lg font-extrabold leading-none my-5 text-gray-900 tracking-tight mt-8">My Particulars </h1>

@foreach($particulars as $particular)
<div class="flex justify-between items-baseline lg:mr-8  uk-visible@s">
    <h1 class="font-extrabold leading-none mb-6 lg:text-2xl text-lg text-gray-900 tracking-tight"> {{$particular->particular}} </h1>

</div>
<div class="relative uk-visible@s uk-slider" uk-slider="finite: true">

    <a class="-left-2 absolute bg-white bottom-1/2 flex items-center justify-center p-2 rounded-full shadow text-xl w-9 z-10 dark:bg-gray-800 dark:text-white" href="#"> <i class="icon-feather-chevron-left"></i> </a>
    <a class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 right-4 rounded-full shadow text-xl w-9 z-10 dark:bg-gray-800 dark:text-white uk-invisible" href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>

    <div class="uk-slider-container pb-3 lg:mr-3">

        <ul class="uk-slider-items uk-grid uk-grid-small" style="transform: translate3d(-218px, 0px, 0px);">
{{--
            <li tabindex="-1" class="">
                <div class="relative bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full transform -rotate-2 hover:rotate-3 transition hover:scale-105 m-1">
                    <img src="assets/images/avatars/avatar-2.jpg" class="w-20 h-20 rounded-full border-2 border-white bg-gray-200">
                    <a href="#" class=" bg-gray-400 p-2 rounded-full w-8 h-8 flex justify-center items-center text-white border-4 border-white absolute right-2 bottom-0 bg-blue-600">
                        + </a>
                </div>
                <a href="profile.html" class="block font-medium text-center text-gray-500 text-x truncate w-24">
                    You </a>
            </li> --}}
        @foreach($particular->details as $detail)
            <li tabindex="-1" class="">
                <a href="#" >
                    <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full transform -rotate-2 hover:rotate-3 transition hover:scale-105 m-1">
                        <img src="{{asset('user/particular/images/'.$detail->image)}}" class="w-20 h-20 rounded-full border-2 border-white bg-gray-200">
                    </div>
                </a>
                <a href="#" class="block font-medium text-center text-gray-500 text-x truncate w-24">
                  {{$detail->particular_title}}
                </a>
            </li>
        @endforeach
        </ul>
    </div>
</div>
@endforeach
<div class="my-6 grid lg:grid-cols-5 grid-cols-3 gap-2 hover:text-yellow-700 uk-link-reset">
    <a href="{{route('particular.create')}}">
        <div class="bg-gray-100 border-4 border-dashed flex flex-col h-full items-center justify-center relative rounded-2xl w-full">
            <i class="text-4xl uil-plus-circle"></i> <span> Add new </span>
        </div>
    </a>
</div>
@endsection
