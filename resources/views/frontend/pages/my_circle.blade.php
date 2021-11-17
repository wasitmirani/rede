@extends('layouts.frontend.messengermaster')
@section('content')
<div class="container m-auto">

    <h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mb-2"> My Circle </h1>
    <div class="relative mt-4 uk-slider" uk-slider="finite: true">
        <div class="flex justify-between mt-6 mb-4">
            <h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight"> My Crew </h1>

        </div>
        <div class="uk-slider-container pb-3">

            <ul class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid" style="transform: translate3d(0px, 0px, 0px);">
            @foreach($my_groups as $my_group)
                <li tabindex="-1" class="uk-active">
                    <a href="{{ route('show.group',$my_group->group->id) }}" uk-toggle="target: #offcanvas-preview">
                        <div class="market-list">
                            <div class="item-media"> <img src="{{ asset('/user/group/images/'.$my_group->group->image) }}" alt=""></div>
                            <div class="item-inner">
                                <div class="item-title"> {{ $my_group->group->title }} </div>
                                <div class="item-statistic">
                                    <span><span class="count"></span>Following</span>
                                    <span><span class="count"></span> views </span>
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
        <div class="flex justify-between mt-6 mb-4">
            <h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight"> Followings </h1>
        </div>
        <div class="uk-slider-container pb-3">

            <ul class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid" style="transform: translate3d(0px, 0px, 0px);">
                  @foreach($followings as $following)
                <li tabindex="-1" class="uk-active">
                    <a href="{{ route('public.profile',[$following->followings->id,$following->followings->name]) }}" >
                        <div class="market-list">
                            <div class="item-media"> <img src="{{ asset('user/images/'.$following->followings->image) }}" alt=""></div>

                            <div class="item-inner">
                                {{-- <div class="item-price"> 20$ </div> --}}
                                <div class="item-title"> {{ $following->followings->name }} </div>
                                <div class="item-statistic">

                                    <span> <span class="count"></span> visit profile </span>
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
        <div class="flex justify-between mt-6 mb-4">
            <h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight"> Follower </h1>
        </div>
        <div class="uk-slider-container pb-3">

            <ul class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid" style="transform: translate3d(0px, 0px, 0px);">
               @foreach($followers as $follower)
                <li tabindex="-1" class="uk-active">
                    <a href="{{ route('public.profile',[$following->followings->id,$following->followings->name]) }}" uk-toggle="target: #offcanvas-preview">
                        <div class="market-list">
                            <div class="item-media"> <img src="{{ asset('user/images/'.$follower->followers->image) }}" alt=""></div>
                            <div class="item-inner">
                                {{-- <div class="item-price"> 20$ </div> --}}
                                <div class="item-title"> {{ $follower->followers->name }} </div>
                                <div class="item-statistic">


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
</div>

@endsection
