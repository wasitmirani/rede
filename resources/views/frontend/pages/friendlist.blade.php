@extends('layouts.frontend.messengermaster')

@section('content')
<div class="flex justify-between items-baseline uk-visible@s">
    <h1 class="font-extrabold leading-none mb-6 mt-8 lg:text-2xl text-lg text-gray-900 tracking-tight"> Crew Suggestion
    </h1>

</div>
<div class="relative uk-slider" uk-slider="finite: true">

    <div class="uk-slider-container pb-3 -ml-3">

        <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-grid-small" style="transform: translate3d(0px, 0px, 0px);">
            <li tabindex="-1" class="uk-active">
                <div class="bg-gray-200 max-w-full lg:h-64 h-52 rounded-lg relative overflow-hidden">
                    <a href="profile.html">
                        <img src="{{ asset('assets/images/post/img7.jpg') }}" class="w-full h-full absolute object-cover inset-0">
                    </a>
                    <a href="#" class="absolute right-3 top-3 bg-black bg-opacity-60 rounded-full" data-tippy-placement="left" data-tippy="" data-original-title="Hide">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="fill-current h-6 m-1.5 text-white w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </a>

                    <div class="absolute bottom-0 p-4 w-full custom-overly1">
                        <div class="flex justify-between align-bottom flex-wrap text-white">
                            <div class="w-full truncate text-lg"> John Michael </div>
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
            <li tabindex="-1" class="uk-active">
                <div class="bg-gray-200 max-w-full lg:h-64 h-52 rounded-lg relative overflow-hidden">
                    <a href="profile.html">
                        <img src="{{ asset('assets/images/avatars/avatar-6.jpg') }}" class="w-full h-full absolute object-cover inset-0">
                    </a>
                    <a href="#" class="absolute right-3 top-3 bg-black bg-opacity-60 rounded-full" data-tippy-placement="left" data-tippy="" data-original-title="Hide">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="fill-current h-6 m-1.5 text-white w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </a>

                    <div class="absolute bottom-0 p-4 w-full custom-overly1">
                        <div class="flex justify-between align-bottom flex-wrap text-white">
                            <div class="w-full truncate text-lg"> Monroe Parker </div>
                            <div class="leading-5 text-sm">
                                <div> 19, Austria </div>

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
            <li tabindex="-1" class="uk-active">
                <div class="bg-gray-200 max-w-full lg:h-64 h-52 rounded-lg relative overflow-hidden">
                    <a href="profile.html">
                        <img src="{{ asset('assets/images/avatars/avatar-4.jpg') }}" class="w-full h-full absolute object-cover inset-0">
                    </a>
                    <a href="#" class="absolute right-3 top-3 bg-black bg-opacity-60 rounded-full" data-tippy-placement="left" data-tippy="" data-original-title="Hide">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="fill-current h-6 m-1.5 text-white w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </a>

                    <div class="absolute bottom-0 p-4 w-full custom-overly1">
                        <div class="flex justify-between align-bottom flex-wrap text-white">
                            <div class="w-full truncate text-lg"> Martin Gray </div>
                            <div class="leading-5 text-sm">
                                <div> 19, New York </div>

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
            <li tabindex="-1" class="uk-active">
                <div class="bg-gray-200 max-w-full lg:h-64 h-52 rounded-lg relative overflow-hidden">
                    <a href="profile.html">
                        <img src="{{ asset('assets/images/avatars/avatar-7.jpg') }}" class="w-full h-full absolute object-cover inset-0">
                    </a>
                    <a href="#" class="absolute right-3 top-3 bg-black bg-opacity-60 rounded-full" data-tippy-placement="left" data-tippy="" data-original-title="Hide">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="fill-current h-6 m-1.5 text-white w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </a>

                    <div class="absolute bottom-0 p-4 w-full custom-overly1">
                        <div class="flex justify-between align-bottom flex-wrap text-white">
                            <div class="w-full truncate text-lg"> Jesse Stevens</div>
                            <div class="leading-5 text-sm">
                                <div> 19, London </div>

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



            <li tabindex="-1" class="">
                <div class="bg-gray-200 max-w-full lg:h-64 h-52 rounded-lg relative overflow-hidden">
                    <a href="profile.html">
                        <img src="{{ asset('assets/images/avatars/avatar-1.jpg') }}" class="w-full h-full absolute object-cover inset-0">
                    </a>
                    <a href="#" class="absolute right-3 top-3 bg-black bg-opacity-60 rounded-full" data-tippy-placement="left" data-tippy="" data-original-title="Hide">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="fill-current h-6 m-1.5 text-white w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </a>

                    <div class="absolute bottom-0 p-4 w-full custom-overly1">
                        <div class="flex justify-between align-bottom flex-wrap text-white">
                            <div class="w-full truncate text-lg"> James Lewis </div>
                            <div class="leading-5 text-sm">
                                <div> 19, Austria </div>

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
        </ul>

        <a class="uk-position-center-left uk-position-small p-3.5 bg-white rounded-full w-10 h-10 flex justify-center items-center -mx-4 mb-6 shadow-md dark:bg-gray-800 dark:text-white uk-icon uk-slidenav-previous uk-slidenav uk-invisible" href="#" uk-slidenav-previous="" uk-slider-item="previous"><svg width="14px" height="24px" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-previous"><polyline fill="none" stroke="#000" stroke-width="1.4" points="12.775,1 1.225,12 12.775,23 "></polyline></svg></a>
        <a class="uk-position-center-right uk-positsion-small p-3.5 bg-white rounded-full w-10 h-10 flex justify-center items-center -mx-4 shadow-md dark:bg-gray-800 dark:text-white uk-icon uk-slidenav-next uk-slidenav" href="#" uk-slidenav-next="" uk-slider-item="next"><svg width="14px" height="24px" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-next"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></a>

    </div>

</div>
<h1 class="font-extrabold leading-none mb-6 mt-8 lg:text-2xl text-lg text-gray-900 tracking-tight"> Your Crew </h1>
<div class="my-3 grid lg:grid-cols-4 grid-cols-2 gap-3 hover:text-yellow-700 uk-link-reset">

    <div>
        <div class="bg-red-400 max-w-full lg:h-56 h-48 rounded-lg relative overflow-hidden shadow uk-transition-toggle">
            <a href="#story-modal" uk-toggle="">
                <img src="{{ asset('assets/images/post/img2.jpg') }}" class="w-full h-full absolute object-cover inset-0 scale-150 transform">
            </a>
            <div class="flex flex-1 items-center absolute bottom-0 w-full p-3 text-white custom-overly1 uk-transition-slide-bottom-medium">
                <a href="profile.html" class="lg:flex flex-1 items-center hidden">
                    <div> James Lewis </div>
                </a>
                <div class="flex space-x-2 flex-1 lg:flex-initial justify-around">
                    <a href="#"> <i class="uil-heart"></i> 150 </a>
                    <a href="#"> <i class="uil-heart"></i> 30 </a>
                </div>
            </div>

        </div>
    </div>
    <div>
        <div class="bg-yellow-400 max-w-full lg:h-56 h-48 rounded-lg relative overflow-hidden shadow uk-transition-toggle">
            <a href="#story-modal" uk-toggle="">
                <img src="{{ asset('assets/images/post/img6.jpg') }}" class="w-full h-full absolute object-cover inset-0 scale-150 transform">
            </a>
            <div class="flex flex-1 items-center absolute bottom-0 w-full p-3 text-white custom-overly1 uk-transition-slide-bottom-medium">
                <a href="#" class="lg:flex flex-1 items-center hidden">
                    <div> James Lewis </div>
                </a>
                <div class="flex space-x-2 flex-1 lg:flex-initial justify-around">
                    <a href="#"> <i class="uil-heart"></i> 150 </a>
                    <a href="#"> <i class="uil-heart"></i> 30 </a>
                </div>
            </div>

        </div>
    </div>
    <div>
        <div class="bg-green-400 max-w-full lg:h-56 h-48 rounded-lg relative overflow-hidden shadow uk-transition-toggle">
            <a href="#story-modal" uk-toggle="">
                <img src="{{ asset('assets/images/avatars/avatar-1.jpg') }}" class="w-full h-full absolute object-cover inset-0">
            </a>
            <div class="flex flex-1 items-center absolute bottom-0 w-full p-3 text-white custom-overly1 uk-transition-slide-bottom-medium">
                <a href="#" class="lg:flex flex-1 items-center hidden">
                    <div> James Lewis </div>
                </a>
                <div class="flex space-x-2 flex-1 lg:flex-initial justify-around">
                    <a href="#"> <i class="uil-heart"></i> 150 </a>
                    <a href="#"> <i class="uil-heart"></i> 30 </a>
                </div>
            </div>

        </div>
    </div>
    <div>
        <div class="bg-blue-400 max-w-full lg:h-56 h-48 rounded-lg relative overflow-hidden shadow uk-transition-toggle">
            <a href="#story-modal" uk-toggle="">
                <img src="{{ asset('assets/images/post/img7.jpg') }}" class="w-full h-full absolute object-cover inset-0">
            </a>
            <div class="flex flex-1 items-center absolute bottom-0 w-full p-3 text-white custom-overly1 uk-transition-slide-bottom-medium">
                <a href="#" class="lg:flex flex-1 items-center hidden">
                    <div> James Lewis </div>
                </a>
                <div class="flex space-x-2 flex-1 lg:flex-initial justify-around">
                    <a href="#"> <i class="uil-heart"></i> 150 </a>
                    <a href="#"> <i class="uil-heart"></i> 30 </a>
                </div>
            </div>

        </div>
    </div>

</div>
<div id="story-modal" class="uk-modal-container uk-modal" uk-modal="" style="">
    <div class="uk-modal-dialog story-modal">
        <button class="uk-modal-close-default lg:-mt-9 lg:-mr-9 -mt-5 -mr-5 shadow-lg bg-white rounded-full p-4 transition dark:bg-gray-600 dark:text-white uk-icon uk-close" type="button" uk-close=""><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" data-svg="close-icon"><line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line><line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line></svg></button>

            <div class="story-modal-media">
                <img src="{{ asset('assets/images/post/img4.jpg') }}" alt="" class="inset-0 h-full w-full object-cover">
            </div>
            <div class="flex-1 bg-white dark:bg-gray-900 dark:text-gray-100">

                <!-- post header-->
                <div class="border-b flex items-center justify-between px-5 py-3 dark:border-gray-600">
                    <div class="flex flex-1 items-center space-x-4">
                        <a href="#">
                            <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full">
                                <img src="{{ asset('assets/images/avatars/avatar-2.jpg') }}" class="bg-gray-200 border border-white rounded-full w-8 h-8">
                            </div>
                        </a>
                        <span class="block text-lg font-semibold"> Johnson smith </span>
                    </div>
                    <a href="#">
                        <i class="icon-feather-more-horizontal text-2xl rounded-full p-2 transition -mr-1"></i>
                    </a>
                </div>
                <div class="story-content p-4" data-simplebar="init"><div class="simplebar-wrapper" style="margin: -16px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content" style="padding: 16px; height: auto; overflow: hidden;">

                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>

                    <div class="py-4 ">
                        <div class="flex justify-around">
                            <a href="#" class="flex items-center space-x-3">
                                <div class="flex font-bold items-baseline"> <i class="uil-heart mr-1"> </i> Like</div>
                            </a>
                            <a href="#" class="flex items-center space-x-3">
                                <div class="flex font-bold items-baseline"> <i class="uil-heart mr-1"> </i> Comment</div>
                            </a>
                            <a href="#" class="flex items-center space-x-3">
                                <div class="flex font-bold items-baseline"> <i class="uil-heart mr-1"> </i> Share</div>
                            </a>
                        </div>
                        <hr class="-mx-4 my-3">
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center">
                                <img src="{{ asset('assets/images/avatars/avatar-1.jpg') }}" alt="" class="w-6 h-6 rounded-full border-2 border-white">
                                <img src="{{ asset('assets/images/avatars/avatar-4.jpg') }}" alt="" class="w-6 h-6 rounded-full border-2 border-white -ml-2">
                                <img src="{{ asset('assets/images/avatars/avatar-2.jpg') }}" alt="" class="w-6 h-6 rounded-full border-2 border-white -ml-2">
                            </div>
                            <div>
                                Liked <strong> Johnson</strong> and <strong> 209 Others </strong>
                            </div>
                        </div>
                    </div>

                <div class="-mt-1 space-y-1">
                    <div class="flex flex-1 items-center space-x-2">
                        <img src="{{ asset('assets/images/avatars/avatar-2.jpg') }}" class="rounded-full w-8 h-8">
                        <div class="flex-1 p-2">
                            consectetuer adipiscing elit, sed diam nonummy nibh euismod
                        </div>
                    </div>

                    <div class="flex flex-1 items-center space-x-2">
                        <img src="{{ asset('assets/images/avatars/avatar-4.jpg') }}" class="rounded-full w-8 h-8">
                        <div class="flex-1 p-2">
                            consectetuer adipiscing elit
                        </div>
                    </div>

                </div>


                </div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 290px; transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div></div>
                <div class="p-3 border-t dark:border-gray-600">
                    <div class="bg-gray-200 dark:bg-gray-700 rounded-full rounded-md relative">
                        <input type="text" placeholder="Add your Comment.." class="bg-transparent max-h-8 shadow-none">
                        <div class="absolute bottom-0 flex h-full items-center right-0 right-3 text-xl space-x-2">
                            <a href="#"> <i class="uil-image"></i></a>
                            <a href="#"> <i class="uil-video"></i></a>
                        </div>
                    </div>
                </div>

            </div>

    </div>
</div>
@endsection
