@extends('layouts.frontend.messengermaster')
@section('content')

<div class="flex justify-between items-baseline uk-visible@s">
    <h1 class="font-extrabold leading-none mb-6 mt-8 lg:text-2xl text-lg text-gray-900 tracking-tight"> Participants
    </h1>
</div>
<div class="relative uk-slider" uk-slider="finite: true">

    <div class="uk-slider-container pb-3 -ml-3">

        <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-grid-small" style="transform: translate3d(0px, 0px, 0px);">
            @foreach($participants as $participant)
            <li tabindex="-1" class="uk-active">
                <div class="bg-gray-200 max-w-full lg:h-64 h-52 rounded-lg relative overflow-hidden">
                    <a href="profile.html">
                        <img src="{{ asset('/user/images/'.$participant->participents->image  ) }}" class="w-full h-full absolute object-cover inset-0">
                    </a>
                    <a href="#" class="absolute right-3 top-3 bg-black bg-opacity-60 rounded-full" data-tippy-placement="left" data-tippy="" data-original-title="Hide">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="fill-current h-6 m-1.5 text-white w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </a>

                    <div class="absolute bottom-0 p-4 w-full custom-overly1">
                        <div class="flex justify-between align-bottom flex-wrap text-white">
                            <div class="w-full truncate text-lg"> {{ $participant->participents->name }} </div>
                            <div class="leading-5 text-sm">
                                {{-- <div> 21, Turkey </div> --}}

                            </div>
                            {{-- <a href="#" class="absolute right-3 bottom-3 rounded-full bg-gradient-to-tr from-blue-500 to-purple-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="fill-current h-6 m-1.5 text-white w-6">
                                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                                </svg>
                            </a> --}}
                        </div>
                    </div>
                </div>
            </li>
            @endforeach





        </ul>

        <a class="uk-position-center-left uk-position-small p-3.5 bg-white rounded-full w-10 h-10 flex justify-center items-center -mx-4 mb-6 shadow-md dark:bg-gray-800 dark:text-white uk-icon uk-slidenav-previous uk-slidenav uk-invisible" href="#" uk-slidenav-previous="" uk-slider-item="previous"><svg width="14px" height="24px" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-previous"><polyline fill="none" stroke="#000" stroke-width="1.4" points="12.775,1 1.225,12 12.775,23 "></polyline></svg></a>
        <a class="uk-position-center-right uk-positsion-small p-3.5 bg-white rounded-full w-10 h-10 flex justify-center items-center -mx-4 shadow-md dark:bg-gray-800 dark:text-white uk-icon uk-slidenav-next uk-slidenav" href="#" uk-slidenav-next="" uk-slider-item="next"><svg width="14px" height="24px" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-next"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></a>
    </div>
</div>
<h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mb-2">Book Event</h1>


<form id="eventForm" action="{{ route('event.booking') }}" method="post">
    @csrf
    <input type="hidden" name='event_id' placeholder="Event Title"  name="event" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;" value="{{ $event->id }}">
    <label class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800">Event Title</label>
    <div class="flex lg:flex-row flex-col lg:space-x-2">

        <input type="text"  placeholder="Event Title" disabled name="event" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;" value="{{ $event->title }}">
        <input type="hidden" name='event_title' placeholder="Event Title" name="event" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;" value="{{ $event->title }}">
    </div>
    <label class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800">Organizar</label>
    <div class="flex lg:flex-row flex-col lg:space-x-2">

        <input type="text"  placeholder="" disabled class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;" data-id='{{ $event->user->id }}' value="{{ $event->user->name }}" >
        <input type="hidden"  placeholder="" name="participent_id" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;"  value="{{ Auth::user()->id }}" >
    </div>
    <label class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800">Event Date</label>
    <div class="flex lg:flex-row flex-col lg:space-x-2">

        <input type="text" placeholder="" disabled name="date" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;"  value="{{ $event->event_date}}" >
    </div>
    <button type="submit" class="bg-gradient-to-br from-pink-500 py-3 rounded-md text-white text-xl to-red-400 w-full">{{ App\Models\BookEvent::bookingStatus($event->id) }}</button>

</form>
@endsection
