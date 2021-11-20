@extends('layouts.frontend.messengermaster')

@section('content')

<div class="container m-auto">

    <h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mb-2"> News </h1>
    <div class="lg:m-0 -mx-5 flex justify-between py-4 relative space-x-3 uk-sticky dark-tabs" uk-sticky="cls-active: bg-gray-100 bg-opacity-95" style="">
    </div>
<div class="space-y-5 flex-shrink-0 lg:w-7/12">
@foreach($posts as $post)

<div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0">

    <!-- post header-->
    <div class="flex justify-between items-center px-4 py-3">
        <div class="flex flex-1 items-center space-x-4">
            <a href="#">
                <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full">
                    <img src="{{ asset('/user/images/'.$post->user->image) }}" class="bg-gray-200 border border-white rounded-full w-8 h-8">
                    
                </div>
            </a>
            <span class="block capitalize font-semibold dark:text-gray-100"> {{ $post->user->name }} </span>
            <span class="block capitalize font-semibold dark:text-gray-100"> {{ \Carbon\Carbon::parse($post->created_at)->diffForhumans() }} </span>

        </div>
      <div>
      </div>
    </div>
    <div class="p-3 border-b dark:border-gray-700">

    <div uk-lightbox="">
      
        <a href="{{ asset('/user/post/images/'.$post->image) }}" alt="">
            <img src="{{ asset('/user/post/image/'.$post->image) }}" alt="">
        </a>
        @foreach($post->interests as $ints)
        <a class="py-2 px-4 shadow-md no-underline rounded-full bg-red text-white font-sans font-semibold text-sm border-red btn-primary hover:text-white hover:bg-red-light focus:outline-none active:shadow-none" >{{ $ints->interest }}</a>
        @endforeach
     
    </div>



      {!! $post->feed !!}

    </div>
    <div class="py-3 px-4 space-y-3">
        <div class="flex space-x-4 lg:font-bold">
            <a href="#" class="flex items-center space-x-2">
                <div class="p-2 rounded-full text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">
                        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                    </svg>
                </div>
                <div> Like</div>
            </a>
        </div>

    </div>
</div>
@endforeach
</div>




    {{-- <div class="my-3 grid lg:grid-cols-4 grid-cols-2 gap-3 hover:text-yellow-700 uk-link-reset"> --}}
@foreach($posts as $post)

        {{-- <div>
            <div class="bg-red-400 max-w-full lg:h-56 h-48 rounded-lg relative overflow-hidden shadow uk-transition-toggle">
                <a href="#story-modal{{ $post->id }}" uk-toggle="">
                    @if($post->image != null)
                    <img src="{{asset('/user/post/images/'.$post->image)}}" class="w-full h-full absolute object-cover inset-0 scale-150 transform">
                    @endif
                </a>
                <div class="flex flex-1 items-center absolute bottom-0 w-full p-3 text-white custom-overly1 uk-transition-slide-bottom-medium">
                    <a href="profile.html" class="lg:flex flex-1 items-center hidden">
                        <div> {{ $post->feed }} </div>

                    </a>
                </div>

            </div>
        </div> --}}
        {{-- <div id="story-modal{{ $post->id }}" class="uk-modal-container uk-modal" uk-modal="">
            <div class="uk-modal-dialog story-modal">
                <button class="uk-modal-close-default lg:-mt-9 lg:-mr-9 -mt-5 -mr-5 shadow-lg bg-white rounded-full p-4 transition dark:bg-gray-600 dark:text-white uk-icon uk-close" type="button" uk-close=""><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" data-svg="close-icon"><line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line><line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line></svg></button>

                    <div class="story-modal-media">
                        <img src="{{asset('/user/post/images/'.$post->image)}}" alt="" class="inset-0 h-full w-full object-cover">
                    </div>
                    <div class="flex-1 bg-white dark:bg-gray-900 dark:text-gray-100">

                        <!-- post header-->
                        <div class="border-b flex items-center justify-between px-5 py-3 dark:border-gray-600">
                            <div class="flex flex-1 items-center space-x-4">
                                <a href="#">
                                    <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full">
                                        @if ($post->user->image != null)
                                        <img src="{{asset('user/images/'.$post->user->image)}}" class="bg-gray-200 border border-white rounded-full w-8 h-8">
                                        @else
                                        <img src="{{asset('user/images/user.jpg')}}" class="bg-gray-200 border border-white rounded-full w-8 h-8">
                            @endif
                                    </div>
                                </a>
                                <span class="block text-lg font-semibold"> {{ $post->user->name }} </span>
                            </div>
                            <a href="#">
                                <i class="icon-feather-more-horizontal text-2xl rounded-full p-2 transition -mr-1"></i>
                            </a>
                        </div>
                        <div class="story-content p-4" data-simplebar="init"><div class="simplebar-wrapper" style="margin: -16px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -17px; bottom: 0px;"><div class="simplebar-content" style="padding: 16px; height: 100%; overflow: hidden scroll;">

                            <p>{{ $post->feed }}</p>

                        </div></div></div><div class="simplebar-placeholder" style="width: 313px; height: 341px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 348px; transform: translate3d(0px, 0px, 0px); visibility: visible;"></div></div></div>


                    </div>

            </div>
        </div> --}}

@endforeach


    {{-- </div> --}}

</div>

@endsection

