@extends('layouts.frontend.messengermaster')
@section('content')
<h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mb-2"> Events </h1>

<div class="lg:m-0 -mx-5 flex justify-between py-4 relative space-x-3 uk-sticky dark-tabs" uk-sticky="cls-active: bg-gray-100 bg-opacity-95" style="">
  <div class="flex overflow-x-scroll lg:overflow-hidden lg:pl-0 pl-5 space-x-3">
        {{-- <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Shop</a>
        <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> headphones  </a>
        <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Parfums </a>
        <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Fruits </a>
        <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Mobiles  </a>
        <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Laptops </a> --}}
    </div>
    <a href="{{ route('create.event') }}" uk-toggle="target: #offcanvas-create" class="bg-pink-500 hover:bg-pink-600 hover:text-white flex font-bold inline-block items-center px-4 py-2 rounded shadow text-white lg:block hidden"> <i class="-mb-1 mr-1 uil-plus"></i> Create</a>
</div>
@foreach($events as $event)
<div class="flex lg:flex-row flex-col items-center lg:py-12 lg:space-x-12">

    <div>
        <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full m-0.5 mr-2  w-56 h-56 relative overflow-hidden uk-transition-toggle">
            <img src="{{ asset('/user/event/images/'.$event->image) }}" class="bg-gray-200 border-4 border-white rounded-full w-full h-full dark:border-gray-900">
        </div>
    </div>

    <div class="lg:w/8/12 flex-1 flex flex-col lg:items-start items-center">

        <h2 class="font-semibold lg:text-2xl text-lg mb-2"> {{ $event->title }}</h2>
        <h4 class="font-semibold lg:text-2xl text-lg mb-2">Creator: {{ $event->user->name }}</h4>
        <p class="lg:text-left mb-2 text-center  dark:text-gray-100"> {!! $event->description !!}</p>
        @if(isset($event->group))
        <p class="lg:text-left mb-2 text-center  dark:text-gray-100"> Group: {{ $event->group->title }}</p>
        @endif

            <div class="flex font-semibold mb-3 space-x-2  dark:text-gray-10">
                <a href="#">{{ $event->interest }}</a>
            </div>


            <div class="capitalize flex font-semibold space-x-3 text-center text-sm my-2">
                <a href="#" class="bg-gray-300 shadow-sm p-2 px-6 rounded-md dark:bg-gray-700">Join Event</a>
                <a href="#" class="bg-pink-500 shadow-sm p-2 pink-500 px-6 rounded-md text-white hover:text-white hover:bg-pink-600">Visit</a>
                <div>



                </div>

            </div>




    </div>



</div>
@endforeach




@endsection
