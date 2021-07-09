@extends('layouts.frontend.messengermaster')
@section('content')

<div class="container pro-container m-auto">

    <!-- profile-cover-->
    <div class="flex lg:flex-row flex-col items-center lg:py-8 lg:space-x-8">

        <div>
            <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full m-0.5 mr-2  w-56 h-56 relative overflow-hidden uk-transition-toggle">
                <img src="{{asset('assets/images/avatars/avatar-7.jpg')}}" class="bg-gray-200 border-4 border-white rounded-full w-full h-full dark:border-gray-900">

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

            <h2 class="font-semibold lg:text-2xl text-lg mb-2"> Stella Jonathan</h2>
            <p class="lg:text-left mb-2 text-center  dark:text-gray-100"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet
                doming id quod mazim placerat facer possim assum</p>

                <div class="flex font-semibold mb-3 space-x-2  dark:text-gray-10">
                    <a href="#">Travailing</a> , <a href="#">Sports</a>  , <a href="#">Movies</a>
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
                    <div class="flex lg:flex-row flex-col"> 120k <strong class="lg:pl-2">Posts</strong></div>
                    <div class="lg:pl-4 flex lg:flex-row flex-col"> 420k <strong class="lg:pl-2">Followers</strong></div>
                    <div class="lg:pl-4 flex lg:flex-row flex-col"> 530k <strong class="lg:pl-2">Following</strong></div>
                </div>

        </div>

        <div class="w-20"></div>

    </div>

    <h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mt-8">My Interests </h1>

    <div class="my-6 grid lg:grid-cols-5 grid-cols-3 gap-2 hover:text-yellow-700 uk-link-reset">
        <a href="#"  id="buttonmodal" class="focus:outline-none p-2    " type="button">
            <div class="bg-gray-100 border-4 border-dashed flex flex-col h-full items-center justify-center relative rounded-2xl w-full" >
                <i class="text-4xl uil-plus-circle"></i> <span>Add new </span>
            </div>
        </a>
        <a href="#story-modal" uk-toggle="">
            <img src="assets/images/avatars/avatar-lg-1.jpg" alt="" class="w-full lg:h-60 h-40 rounded-md object-cover">
        </a>
        <a href="#story-modal" uk-toggle="">
            <img src="assets/images/post/img2.jpg" alt="" class="w-full lg:h-60 h-40 rounded-md object-cover">
        </a>
        <a href="#story-modal" uk-toggle="">
            <img src="assets/images/post/img7.jpg" alt="" class="w-full lg:h-60 h-40 rounded-md object-cover uk-visible@s">
        </a>
    </div>


    <div class="my-6 grid lg:grid-cols-4 grid-cols-2 gap-1.5 hover:text-yellow-700 uk-link-reset">





</div>




@endsection
@section('scripts')
<script>

</script>
@endsection
