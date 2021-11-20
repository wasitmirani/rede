@extends('layouts.frontend.messengermaster')
@section('content')
<div class="flex lg:flex-row flex-col items-center lg:py-8 lg:space-x-8">

    <div>
        <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full m-0.5 mr-2  w-56 h-56 relative overflow-hidden uk-transition-toggle">
            <img src="{{asset('user/images/'.$user->image)}}" class="bg-gray-200 border-4 border-white rounded-full w-full h-full dark:border-gray-900">

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

        <h2 class="font-semibold lg:text-2xl text-lg mb-2"> {{$user->name}}</h2>
        <p class="lg:text-left mb-2 text-center  dark:text-gray-100">{{$user->profile->description}}</p>
            <div class="capitalize flex font-semibold space-x-3 text-center text-sm my-2">
            <div>
                <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base dark:bg-gray-900 uk-drop" uk-drop="mode: click">

                </div>

                </div>

            </div>

            <div class="divide-gray-300 divide-transparent divide-x grid grid-cols-3 lg:text-left lg:text-lg mt-3 text-center w-full dark:text-gray-100">
                <div class="flex lg:flex-row flex-col"> {{$user->profile->covid_status}} <strong class="lg:pl-2">Covid Status</div>
                @if($user->profile->age_range != null)
                <div class="lg:pl-4 flex lg:flex-row flex-col"> {{$user->profile->age_range}} <strong class="lg:pl-2">Age Range</strong></div>
                @endif
                @if($user->profile->age_range != null)
                <div class="lg:pl-4 flex lg:flex-row flex-col"> {{$user->profile->pronouns}} <strong class="lg:pl-2">Pronouns</strong></div>
                @endif
            </div>

    </div>

    <div class="w-20"></div>

</div>
<div class="flex justify-between items-baseline lg:mr-8  uk-visible@s">
    <h1 class="font-extrabold leading-none mb-6 lg:text-2xl text-lg text-gray-900 tracking-tight"> My Circle </h1>
</div>
<div class="flex justify-between items-baseline lg:mr-8  uk-visible@s">
    <h1 class="font-extrabold leading-none mb-6 lg:text-2xl text-lg text-gray-900 tracking-tight">My Crew </h1>
</div>
<div class="relative uk-visible@s uk-slider" uk-slider="finite: true">

    <a class="-left-2 absolute bg-white bottom-1/2 flex items-center justify-center p-2 rounded-full shadow text-xl w-9 z-10 dark:bg-gray-800 dark:text-white uk-invisible" href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i> </a>
    <a class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 right-4 rounded-full shadow text-xl w-9 z-10 dark:bg-gray-800 dark:text-white" href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>

    <div class="uk-slider-container pb-3 lg:mr-3">

        <ul class="uk-slider-items uk-grid uk-grid-small" style="transform: translate3d(0px, 0px, 0px);">
            @forelse($my_groups as $my_group)

            <li tabindex="-1" class="uk-active">
                <a href="{{ route('show.group',$my_group->group->id) }}">
                <div class="relative bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full transform -rotate-2 hover:rotate-3 transition hover:scale-105 m-1">
                    <img src="{{ asset('/user/group/images/'.$my_group->group->image) }}" class="w-20 h-20 rounded-full border-2 border-white bg-gray-200">

                </div>
            </a>
                <a href="{{ route('show.group',$my_group->group->id) }}" class="block font-medium text-center text-gray-500 text-x truncate w-24">
                    {{ $my_group->group->title }} </a>
            </li>
            @empty
            <p>No Crew Found Yet</p>
            @endforelse

        </ul>

    </div>
</div>
<div class="flex justify-between items-baseline lg:mr-8  uk-visible@s">
    <h1 class="font-extrabold leading-none mb-6 lg:text-2xl text-lg text-gray-900 tracking-tight"> Circle </h1>
</div>
<div class="relative uk-visible@s uk-slider" uk-slider="finite: true">

    <a class="-left-2 absolute bg-white bottom-1/2 flex items-center justify-center p-2 rounded-full shadow text-xl w-9 z-10 dark:bg-gray-800 dark:text-white uk-invisible" href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i> </a>
    <a class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 right-4 rounded-full shadow text-xl w-9 z-10 dark:bg-gray-800 dark:text-white" href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>

    <div class="uk-slider-container pb-3 lg:mr-3">

        <ul class="uk-slider-items uk-grid uk-grid-small" style="transform: translate3d(0px, 0px, 0px);">
            @forelse($followings as $following)
            <li tabindex="-1" class="uk-active">
                <div class="relative bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full transform -rotate-2 hover:rotate-3 transition hover:scale-105 m-1">
                    <img src="{{ asset('user/images/'.$following->image) }}" class="w-20 h-20 rounded-full border-2 border-white bg-gray-200">

                </div>
                <a href="{{ route('public.profile',[$following->id,$following->name]) }}" class="block font-medium text-center text-gray-500 text-x truncate w-24">
                    {{ $following->name }} </a>
            </li>
            @empty
            <p>No Circles Found Yet</p>
            @endforelse


        </ul>

    </div>
</div>



{{-- <div class="flex justify-between items-baseline lg:mr-8  uk-visible@s">
    <h1 class="font-extrabold leading-none mb-6 lg:text-2xl text-lg text-gray-900 tracking-tight"> Followers </h1>
</div>
<div class="relative uk-visible@s uk-slider" uk-slider="finite: true">

    <a class="-left-2 absolute bg-white bottom-1/2 flex items-center justify-center p-2 rounded-full shadow text-xl w-9 z-10 dark:bg-gray-800 dark:text-white uk-invisible" href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i> </a>
    <a class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 right-4 rounded-full shadow text-xl w-9 z-10 dark:bg-gray-800 dark:text-white" href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>

    <div class="uk-slider-container pb-3 lg:mr-3">

        <ul class="uk-slider-items uk-grid uk-grid-small" style="transform: translate3d(0px, 0px, 0px);">
            @forelse($followers as $follower)

            <li tabindex="-1" class="uk-active">
                <div class="relative bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full transform -rotate-2 hover:rotate-3 transition hover:scale-105 m-1">
                    <img src=""{{ asset('user/images/'.$follower->image) }}" class="w-20 h-20 rounded-full border-2 border-white bg-gray-200">

                </div>
                <a href="{{ route('public.profile',[$follower->id,$follower->name]) }}"" class="block font-medium text-center text-gray-500 text-x truncate w-24">
                    {{ $follower->name }}  </a>
            </li>
            @empty
            <p>No Follower Found Yet</p>
            @endforelse

        </ul>

    </div>
</div> --}}


@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $(".requestBtn").click(function(){
            var sender_id = $(this).data('id');
            $.ajax({
                url:"/accept/follow/request",
                type:'POST',
                data:{_token:"{{ csrf_token() }}",
                sender_id:sender_id
            },
            success:function(response){
                console.log(response);

            }

            });
        });
    });
</script>
@endsection
