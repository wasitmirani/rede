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


        <!-- container for all cards -->
        <div class="container w-100 lg:w-4/5 mx-auto flex flex-col">
          <!-- card -->
          <div  class="flex flex-col md:flex-row bg-white rounded-lg shadow-xl  mt-4 w-100 mx-2 rounded-md">
            <!-- media -->
            <div class="h-64 w-auto md:w-1/2">
              <img class="inset-0 h-full w-full object-cover object-center" src="{{ asset('/user/event/images/'.$event->image) }}" />
            </div>
            <!-- content -->
            <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between">
              <h3 class="font-semibold text-lg leading-tight ">{{ $event->title }}</h3>
              <p class="mt-1">
                {!! $event->description !!}
              </p>
              @if(isset($event->group))
              <p class="lg:text-left mb-2 text-center  dark:text-gray-100"> Group: {{ $event->group->title }}</p>
              @endif
              <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2">
                {{ $event->user->name }} &bull;  {{ $event->event_date }}
              </p>
              <div class="capitalize  font-semibold space-x-3 text-right text-sm ">
              <a href="{{ route('book.event',$event->id) }}" class="bg-gray-300 shadow-sm p-2 px-6 rounded-md dark:bg-gray-700">{{App\Models\BookEvent::bookingStatus($event->id)}}</a>
              <a href="#" class="bg-pink-500 shadow-sm p-2 pink-500 px-6 rounded-md text-white hover:text-white hover:bg-pink-600">Visit</a>
              </div>
            </div>


          </div><!--/ card-->
        </div><!--/ flex-->

    @endforeach

    {{ $events->links() }}


@endsection
