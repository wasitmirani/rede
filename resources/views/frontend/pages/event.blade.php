@extends('layouts.frontend.messengermaster')
@section('content')
<div class="container pro-container m-auto">

    <!-- profile-cover-->
    <div class="flex lg:flex-row flex-col items-center lg:py-8 lg:space-x-8">

        <div>
            <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full m-0.5 mr-2  w-56 h-56 relative overflow-hidden uk-transition-toggle">
                <img src="{{ asset('event/images/'.$event->image) }}" class="bg-gray-200 border-4 border-white rounded-full w-full h-full dark:border-gray-900">
            </div>
        </div>

        <div class="lg:w/8/12 flex-1 flex flex-col lg:items-start items-center">

            <h2 class="font-semibold lg:text-2xl text-lg mb-2"> {{ $event->title }}</h2>
            <p class="lg:text-left mb-2 text-center  dark:text-gray-100">{!! $event->description !!}</p>

                <div class="flex font-semibold mb-3 space-x-2  dark:text-gray-10">

                    <a href="#">{{ $event->interest }}</a> , {{--  <a href="#">Sports</a>  , <a href="#">Movies</a> --}}
                </div>


                <div class="capitalize flex font-semibold space-x-3 text-center text-sm my-2">
                    @if ($status == "JOINED")
                    <a href="{{ route('book.event',$event->id) }}" class="bg-gray-300 shadow-sm p-2 px-6 rounded-md dark:bg-gray-700 cursor-not-allowed" >{{ $status }}</a>
                    @else
                    <a href="{{ route('book.event',$event->id) }}" class="bg-gray-300 shadow-sm p-2 px-6 rounded-md dark:bg-gray-700" >{{ $status }}</a>
                    @endif

                    {{-- <a href="" class="bg-pink-500 shadow-sm p-2 pink-500 px-6 rounded-md text-white hover:text-white hover:bg-pink-600">Participents </a> --}}
                </div>

                <div class="divide-gray-300 divide-transparent divide-x grid grid-cols-3 lg:text-left lg:text-lg mt-3 text-center w-full dark:text-gray-100">
                    <div class="flex lg:flex-row flex-col"> {{ $num_participent }} <strong class="lg:pl-2">Participent</strong></div>
                    {{-- <div class="lg:pl-4 flex lg:flex-row flex-col"> 420k <strong class="lg:pl-2">Followers</strong></div>
                    <div class="lg:pl-4 flex lg:flex-row flex-col"> 530k <strong class="lg:pl-2">Following</strong></div> --}}
                </div>

        </div>

        <div class="w-20"></div>

    </div>

    <div class="flex items-center justify-between mt-8 space-x-3">
        <h1 class="flex-1 font-extrabold leading-none lg:text-2xl text-lg text-gray-900 tracking-tight uk-heading-line"><span>Participents</span></h1>
        <div class="bg-white border border-2 border-gray-300 divide-gray-300 divide-x flex rounded-md shadow-sm dark:bg-gray-100">
            <a href="#" class="bg-gray300 flex h-10 items-center justify-center  w-10" data-tippy-placement="top" data-tippy="" data-original-title="Grid view"> {{-- <iclass="uil-apps"></i> --}}</a>
            <a href="#" class="flex h-10 items-center justify-center w-10" data-tippy-placement="top" data-tippy="" data-original-title="List view"> {{-- <i class="uil-list-ul"></i>--}}</a>
        </div>
    </div>

    {{-- <div class="my-6 grid lg:grid-cols-4 grid-cols-2 gap-1.5 hover:text-yellow-700 uk-link-reset">
    <div> --}}
        <div class="w-full bg-white-800">
        @if ($participents != null)
        @foreach($participents as $participent)

            <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
                {{-- <div class="text-center pb-12">
                    <h2 class="text-base font-bold text-indigo-600">
                        We have the best equipment in the market
                    </h2>
                    <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl font-heading text-white">
                        Check our awesome team memwhite
                    </h1>
                </div> --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="w-full bg-gray-900 rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center">
                        <div class="mb-8">
                            <img class="object-center object-cover rounded-full h-36 w-36" src="{{ ('event/images/'.$participent->participents->image) }}" alt="photo">
                        </div>
                        <div class="text-center">
                            <p class="text-xl text-white font-bold mb-2">{{ $participent->participents->name }}</p>
                            {{-- <p class="text-base text-gray-400 font-normal">Software Engineer</p> --}}
                        </div>
                    </div>

                </div>
            </section>

        {{-- <div class="bg-red-500 max-w-full lg:h-64 h-40 rounded-md relative overflow-hidden uk-transition-toggle" tabindex="0">
             <img src="" class="w-full h-full absolute object-cover inset-0">
             <div class="absolute bg-black bg-opacity-40 bottom-0 flex h-full items-center justify-center space-x-5 text-lg text-white uk-transition-scale-up w-full">
                 <a href="#story-modal" uk-toggle="" class="flex items-center"> <ion-icon name="heart" class="mr-1"></ion-icon> {{ $participent->title }} </a>
                 <a href="#story-modal" uk-toggle="" class="flex items-center"> <ion-icon name="chatbubble-ellipses" class="mr-1"></ion-icon> 30 </a>
                 <a href="#story-modal" uk-toggle="" class="flex items-center"> <ion-icon name="pricetags" class="mr-1"></ion-icon> 12  </a>
             </div>
         </div> --}}
        @endforeach
    </div>
        @else
        <div>
            <h1 class="flex-1 font-extrabold leading-none lg:text-2xl text-lg text-gray-900 tracking-tight uk-heading-line"><span>No One Join Yet</span></h1>
        </div>
        @endif
{{--
        </div>
    </div> --}}



</div>

@endsection
