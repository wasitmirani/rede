@extends('layouts.frontend.messengermaster')
@section('content')
@if ($result != null)
<p>Search  By Interest....</p>
<div class="relative mt-4 uk-slider" uk-slider="finite: true">

    <div class="uk-slider-container pb-3">
<h2>Individuals</h2>
        <ul class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid" style="transform: translate3d(0px, 0px, 0px);">

           @foreach($result as $res)

        <li tabindex="-1" class="uk-active">

            <a href="#" uk-toggle="target: #offcanvas-preview">
                <div class="market-list">
                    <div class="item-media"> <img src="{{ asset('user/images/'.$res->users->image) }}" alt=""></div>

                    <div class="item-inner">
                        <div class="item-price">  </div>
                        <div class="item-title">{{ $res->users->name }}  </div>
                        <div class="item-statistic">
                            <span> <span class="count"></span> {{ $res->interest }} </span>
                            <a href="{{ route('show.member',$res->user_id) }}"><span class="bg-white py-2 px-4 rounded inline-block font-bold shadow">  views </span></a>

                        </div>
                    </div>
                </div>
            </a>
        </li>
        @endforeach




        </ul>

        <a class="-left-5 absolute bg-white bottom-1/2 flex h-11 items-center justify-center mb-8 p-2 rounded-full shadow text-2xl w-11 z-10 dark:bg-gray-800 dark:text-white uk-invisible" href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i> </a>
        <a class="-right-5 absolute bg-white bottom-1/2 flex h-11 items-center justify-center mb-8 p-2 rounded-full shadow text-2xl w-11 z-10 dark:bg-gray-800 dark:text-white" href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>

    </div>


</div>
@endif
@if($result == null)
<div class="bg-white py-2 px-4 rounded inline-block font-bold shadow">
 Sorry No Matches Found

</div>

@endif
@if (isset($groups))

<div class="relative mt-4 uk-slider" uk-slider="finite: true">

    <div class="uk-slider-container pb-3">
<h2>Groups</h2>
        <ul class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid" style="transform: translate3d(0px, 0px, 0px);">

           @foreach($groups as $group)

        <li tabindex="-1" class="uk-active">

            <a href="#" uk-toggle="target: #offcanvas-preview">
                <div class="market-list">
                    <div class="item-media"> <img src="{{ asset('/user/group/images/'.$group->image) }}" alt=""></div>

                    <div class="item-inner">
                        <div class="item-price">  </div>
                        <div class="item-title">{{ $group->title }}  </div>
                        <div class="item-statistic">
                            <span> <span class="count"></span> {{ $group->interest }} </span>
                            <a href=""><span class="bg-white py-2 px-4 rounded inline-block font-bold shadow">  views </span></a>

                        </div>
                    </div>
                </div>
            </a>
        </li>
        @endforeach




        </ul>

        <a class="-left-5 absolute bg-white bottom-1/2 flex h-11 items-center justify-center mb-8 p-2 rounded-full shadow text-2xl w-11 z-10 dark:bg-gray-800 dark:text-white uk-invisible" href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i> </a>
        <a class="-right-5 absolute bg-white bottom-1/2 flex h-11 items-center justify-center mb-8 p-2 rounded-full shadow text-2xl w-11 z-10 dark:bg-gray-800 dark:text-white" href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>

    </div>


</div>
@endif
@if ($events != null)

<div class="relative mt-4 uk-slider" uk-slider="finite: true">

    <div class="uk-slider-container pb-3">
<h2>Events</h2>
        <ul class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid" style="transform: translate3d(0px, 0px, 0px);">

           @foreach($events as $event)

        <li tabindex="-1" class="uk-active">

            <a href="#" uk-toggle="target: #offcanvas-preview">
                <div class="market-list">
                    <div class="item-media"> <img src="{{ asset('/user/event/images/'.$event->image) }}" alt=""></div>

                    <div class="item-inner">
                        <div class="item-price">  </div>
                        <div class="item-title">{{ $event->title }}  </div>
                        <div class="item-statistic">
                            <span> <span class="count"></span> {{ $event->interest }} </span>
                            <a href=""><span class="bg-white py-2 px-4 rounded inline-block font-bold shadow">  views </span></a>

                        </div>
                    </div>
                </div>
            </a>
        </li>
        @endforeach




        </ul>

        <a class="-left-5 absolute bg-white bottom-1/2 flex h-11 items-center justify-center mb-8 p-2 rounded-full shadow text-2xl w-11 z-10 dark:bg-gray-800 dark:text-white uk-invisible" href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i> </a>
        <a class="-right-5 absolute bg-white bottom-1/2 flex h-11 items-center justify-center mb-8 p-2 rounded-full shadow text-2xl w-11 z-10 dark:bg-gray-800 dark:text-white" href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>

    </div>


</div>
@endif

@endsection
