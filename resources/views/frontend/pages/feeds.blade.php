@extends('layouts.frontend.messengermaster')

@section('content')

<div class="container m-auto">

    <h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mb-2"> News </h1>
    <div class="lg:m-0 -mx-5 flex justify-between py-4 relative space-x-3 uk-sticky dark-tabs" uk-sticky="cls-active: bg-gray-100 bg-opacity-95" style="">
        <div class="flex overflow-x-scroll lg:overflow-hidden lg:pl-0 pl-5 space-x-3">
            <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Shop</a>
            <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> headphones  </a>
            <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Parfums </a>
            <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Fruits </a>
            <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Mobiles  </a>
            <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Laptops </a>
        </div>

    </div>

    <div class="flex justify-between mt-6 mb-4">
        <h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight"> Art & Craft </h1>

    </div>
    <div class="relative uk-slider" uk-slider="finite: true">

        <div class="uk-slider-container pb-3">

            <ul class="uk-slider-items uk-child-width-1-6@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid" style="transform: translate3d(0px, 0px, 0px);">

                <li tabindex="-1" class="uk-active">

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
                </li>
                <li tabindex="-1" class="uk-active">
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

                </li>
                <li tabindex="-1" class="uk-active">

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

                </li>
                <li tabindex="-1" class="uk-active">
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

                </li>
                <li tabindex="-1" class="uk-active">

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

                </li>
                <li tabindex="-1" class="uk-active">

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
                </li>
                <li tabindex="-1" class="">
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

                </li>
            </ul>

            <a class="-left-5 absolute bg-white bottom-1/2 flex h-11 items-center justify-center -mb-3 p-2 rounded-full shadow text-2xl w-11 z-10 dark:bg-gray-800 dark:text-white uk-invisible" href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i> </a>
            <a class="-right-5 absolute bg-white bottom-1/2 flex h-11 items-center justify-center -mb-3 p-2 rounded-full shadow text-2xl w-11 z-10 dark:bg-gray-800 dark:text-white" href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>

        </div>
    </div>
    <div id="story-modal" class="uk-modal-container uk-modal" uk-modal="">
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
                    <div class="story-content p-4" data-simplebar="init"><div class="simplebar-wrapper" style="margin: -16px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -17px; bottom: 0px;"><div class="simplebar-content" style="padding: 16px; height: 100%; overflow: hidden scroll;">

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


                    </div></div></div><div class="simplebar-placeholder" style="width: 313px; height: 341px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 348px; transform: translate3d(0px, 0px, 0px); visibility: visible;"></div></div></div>
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















</div>

@endsection

