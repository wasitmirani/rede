@extends('layouts.frontend.messengermaster')
@section('content')

<div class="container pro-container m-auto">

    <!-- profile-cover-->
    <div class="flex lg:flex-row flex-col items-center lg:py-8 lg:space-x-8">

        <div>
            <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full m-0.5 mr-2  w-56 h-56 relative overflow-hidden uk-transition-toggle">
                @if(Auth::user()->image)
                <img src="{{asset('/user/images/'.Auth::user()->image)}}" class="bg-gray-200 border-4 border-white rounded-full w-full h-full dark:border-gray-900">
                @else
                <img src="{{asset('/user/images/user.jpg')}}" class="bg-gray-200 border-4 border-white rounded-full w-full h-full dark:border-gray-900">

                @endif


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

            <h2 class="font-semibold lg:text-2xl text-lg mb-2"> {{Auth::user()->name}}</h2>
            <p class="lg:text-left mb-2 text-center  dark:text-gray-100"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet
                doming id quod mazim placerat facer possim assum</p>

                <div class="flex font-semibold mb-3 space-x-2  dark:text-gray-10">
                    @foreach($myInterests as $int)
                      @foreach ($int->interests as $i)
                      <a class="bg-white py-2 px-4 rounded inline-block font-bold shadow" href="#">{{ $i->interest }}</a>
                      @endforeach

                    @endforeach
                </div>


                {{-- <div class="capitalize flex font-semibold space-x-3 text-center text-sm my-2">
                    <a href="#" class="bg-gray-300 shadow-sm p-2 px-6 rounded-md dark:bg-gray-700"> Add friend</a>
                    <a href="#" class="bg-pink-500 shadow-sm p-2 pink-500 px-6 rounded-md text-white hover:text-white hover:bg-pink-600"> Send message</a>
                    <div>

                    <a href="#" class="bg-gray-300 flex h-12 h-full items-center justify-center rounded-full text-xl w-9 dark:bg-gray-700" aria-expanded="false">
                        <i class="icon-feather-chevron-down"></i>
                    </a>

                    <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base dark:bg-gray-900 uk-drop" uk-drop="mode: click">

                      <ul class="space-y-1">
                        <li>
                            <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-700">
                             <i class="uil-user-minus mr-2"></i>Unfriend
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-700">
                             <i class="uil-eye-slash  mr-2"></i>Hide Your Story
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-700">
                             <i class="uil-share-alt mr-2"></i> Share This Profile
                            </a>
                        </li>
                        <li>
                          <hr class="-mx-2 my-2  dark:border-gray-700">
                        </li>
                        <li>
                            <a href="#" class="flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600">
                             <i class="uil-stop-circle mr-2"></i> Block
                            </a>
                        </li>
                      </ul>

                    </div>

                    </div>

                </div> --}}

                <div class="divide-gray-300 divide-transparent divide-x grid grid-cols-3 lg:text-left lg:text-lg mt-3 text-center w-full dark:text-gray-100">
                    <div class="flex lg:flex-row flex-col"> {{ App\Models\Feed::where('user_id',Auth::user()->id)->count() }}<strong class="lg:pl-2">Posts</strong></div>
                    <div class="lg:pl-4 flex lg:flex-row flex-col"> {{ $followers }} <strong class="lg:pl-2">Followers</strong></div>
                    <div class="lg:pl-4 flex lg:flex-row flex-col">{{ $following }}  <strong class="lg:pl-2">Following</strong></div>
                </div>

        </div>

        <div class="w-20"></div>

    </div>

    <h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mt-8">My Interests </h1>

    <div class="my-6 grid lg:grid-cols-5 grid-cols-3 gap-2 hover:text-yellow-700 uk-link-reset">
        <a href="{{route('all.interest')}}"  >
            <div class="bg-gray-100 border-4 border-dashed flex flex-col h-full items-center justify-center relative rounded-2xl w-full" >
                <i class="text-4xl uil-plus-circle"></i> <span>Add new </span>
            </div>
        </a>
        <a href="#story-modal" uk-toggle="">
            <img src="{{ asset('assets/images/avatars/avatar-lg-1.jpg') }}" alt="" class="w-full lg:h-60 h-40 rounded-md object-cover">
        </a>
        <a href="#story-modal" uk-toggle="">
            <img src="{{ asset('assets/images/post/img2.jpg') }}" alt="" class="w-full lg:h-60 h-40 rounded-md object-cover">
        </a>
        <a href="#story-modal" uk-toggle="">
            <img src="{{ asset('assets/images/post/img7.jpg') }}" alt="" class="w-full lg:h-60 h-40 rounded-md object-cover uk-visible@s">
        </a>
    </div>


    <div class="my-6 grid lg:grid-cols-4 grid-cols-2 gap-1.5 hover:text-yellow-700 uk-link-reset">



        <div class="flex justify-between items-baseline uk-visible@s">
            <h1 class="font-extrabold leading-none mb-6 mt-8 lg:text-2xl text-lg text-gray-900 tracking-tight"> Followers
            </h1>
            {{-- <a href="#" class="text-blue-400 hover:text-blue-500"> See all</a> --}}
        </div>


</div>
<div class="relative uk-slider" uk-slider="finite: true">

    <div class="uk-slider-container pb-3 -ml-3">

        <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-grid-small" style="transform: translate3d(0px, 0px, 0px);">
            @foreach($followerslist as $followers)
            <li tabindex="-1" class="uk-active">
                <div class="bg-gray-200 max-w-full lg:h-64 h-52 rounded-lg relative overflow-hidden">
                    <a href="profile.html">
                        <img src="{{ asset('user/images/'.$followers->followersreq->image) }}" class="w-full h-full absolute object-cover inset-0">
                    </a>
                    <a href="#" class="absolute right-3 top-3 bg-black bg-opacity-60 rounded-full" data-tippy-placement="left" data-tippy="" data-original-title="Hide">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="fill-current h-6 m-1.5 text-white w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </a>

                    <div class="absolute bottom-0 p-4 w-full custom-overly1">
                        <div class="flex justify-between align-bottom flex-wrap text-white">
                            <div class="w-full truncate text-lg"> {{ $followers->followersreq->name }} </div>
                            <div class="leading-5 text-sm">
                                <div> 21, Turkey </div>

                            </div>
                            <a href="#" class="absolute right-3 bottom-3 rounded-full bg-gradient-to-tr from-blue-500 to-purple-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="fill-current h-6 m-1.5 text-white w-6">
                                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                                </svg>
                            </a>
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

<div class="my-6 grid lg:grid-cols-4 grid-cols-2 gap-1.5 hover:text-yellow-700 uk-link-reset">



    <div class="flex justify-between items-baseline uk-visible@s">
        <h1 class="font-extrabold leading-none mb-6 mt-8 lg:text-2xl text-lg text-gray-900 tracking-tight"> Followings
        </h1>

    </div>


</div>

<div class="relative uk-slider" uk-slider="finite: true">

    <div class="uk-slider-container pb-3 -ml-3">

        <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-grid-small" style="transform: translate3d(0px, 0px, 0px);">
            @foreach($followingList as $followin)
            <li tabindex="-1" class="uk-active">
                <div class="bg-gray-200 max-w-full lg:h-64 h-52 rounded-lg relative overflow-hidden">
                    <a href="profile.html">
                        @if($followin->followings->image == null)
                        <img src="{{ asset('user/images/user.jpg') }}" class="w-full h-full absolute object-cover inset-0">
                        @else
                        <img src="{{ asset('user/images/'.$followin->followings->image) }}" class="w-full h-full absolute object-cover inset-0">
                        @endif
                    </a>
                    <a href="#" class="absolute right-3 top-3 bg-black bg-opacity-60 rounded-full" data-tippy-placement="left" data-tippy="" data-original-title="Hide">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="fill-current h-6 m-1.5 text-white w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </a>

                    <div class="absolute bottom-0 p-4 w-full custom-overly1">
                        <div class="flex justify-between align-bottom flex-wrap text-white">
                            <div class="w-full truncate text-lg"> {{ $followin->followings->name }} </div>
                            <div class="leading-5 text-sm">
                                <div> 21, Turkey </div>

                            </div>
                            <a href="#" class="absolute right-3 bottom-3 rounded-full bg-gradient-to-tr from-blue-500 to-purple-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="fill-current h-6 m-1.5 text-white w-6">
                                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                                </svg>
                            </a>
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






@endsection
@section('scripts')
<script>

</script>
@endsection
