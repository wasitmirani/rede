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
                <img src="{{asset('/assets/images/dummyuser.jpg')}}" class="bg-gray-200 border-4 border-white rounded-full w-full h-full dark:border-gray-900">

                @endif


                <div class="absolute -bottom-3 custom-overly1 flex justify-center pt-4 pb-7 space-x-3 text-2xl text-white uk-transition-slide-bottom-medium w-full uk-transition-toggle">
                    <a href="#story-modal" class="hover:text-white" uk-toggle="">
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
                doming id quod mazim placerat facer possim assum
            </p>
            <div class="flex font-semibold mb-3 space-x-2  dark:text-gray-10">
                <a href="#">Portland</a> , <a href="#">Oregon</a>  , <a href="#">USA</a>
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



        </div>

        <div class="w-20"></div>

    </div>
    <div class="lg:m-0 -mx-5 flex justify-between items-center py-2 relative space-x-3 dark-tabs uk-sticky" uk-sticky="cls-active: bg-gray-100 bg-opacity-95; media : @m ; media @m">
        <div class="flex overflow-x-scroll lg:overflow-hidden lg:pl-0 pl-5 space-x-3 lg:py-2">
            <a href="{{ route("new.feeds") }}" class="bg-white py-2 px-4 rounded inline-block font-bold shadow" style="background-color: #b74b4b;
            color: #fff;">My Story</a>
            <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow" style="background-color: #b74b4b;
            color: #fff;">My Particulars </a>
            <a href="{{ route('friend.list') }}" class="bg-white py-2 px-4 rounded inline-block font-bold shadow" style="background-color: #b74b4b;
            color: #fff;">My Crew</a>
            <a href="{{ route('my.calendar') }}" class="bg-white py-2 px-4 rounded inline-block font-bold shadow" style="background-color: #b74b4b;
            color: #fff;">My Calendar</a>

        </div>
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
            <h1 class="font-extrabold leading-none mb-6 mt-8 lg:text-2xl text-lg text-gray-900 tracking-tight"> My Connections
            </h1>
            {{-- <a href="#" class="text-blue-400 hover:text-blue-500"> See all</a> --}}
        </div>


</div>
<div class="my-6 grid lg:grid-cols-5 grid-cols-3 gap-2 hover:text-yellow-700 uk-link-reset">
    <a href="#">
        <div class="bg-gray-100 border-4 border-dashed flex flex-col h-full items-center justify-center relative rounded-2xl w-full">
            <i class="text-4xl uil-plus-circle"></i> <span> Add new </span>
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
        <h1 class="font-extrabold leading-none mb-6 mt-8 lg:text-2xl text-lg text-gray-900 tracking-tight"> My McGuffins
        </h1>

    </div>


</div>

<div class="my-6 grid lg:grid-cols-5 grid-cols-3 gap-2 hover:text-yellow-700 uk-link-reset">
    <a href="#">
        <div class="bg-gray-100 border-4 border-dashed flex flex-col h-full items-center justify-center relative rounded-2xl w-full">
            <i class="text-4xl uil-plus-circle"></i> <span> Add new </span>
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


<!-- Modal -->
<div id="story-modal" class="uk-modal-container uk-modal" uk-modal="">
    <div class="uk-modal-dialog story-modal">
        <button class="uk-modal-close-default  shadow-lg bg-white rounded-full p-4 transition dark:bg-gray-200 dark:text-white uk-icon uk-close" type="button" uk-close="">
            <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" data-svg="close-icon">
                <line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line>
                <line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line>
            </svg>
        </button>
        <img id="blah"  style="width:548px;"  />
        <div class="flex-1 bg-white dark:bg-gray-900 dark:text-gray-100" style="margin-left: 282px; margin-top: 329px;">

            <div class="border-b flex items-center justify-between px-5 py-3 dark:border-gray-600">
                <form id="profileImageForm">
                    <div class="flex lg:flex-row flex-col lg:space-x-2">
                    <input type="file" name="image" id="imageField">
                    </div>
                    <button type="submit" class="bg-gradient-to-br from-pink-500 py-3 rounded-md text-white text-xl to-red-400 w-full">Upload</button>
                </form>

            </div>



        </div>







    </div>
</div>



@endsection
@section('scripts')
<script>
$(document).ready(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    imageField.onchange = evt => {

  const [file] = imageField.files
  if (file) {

    // blah.src = URL.createObjectURL(file)
    blah.src = URL.createObjectURL(event.target.files[0]);

  }
}

$('#profileImageForm').on('submit',function(e){

 e.preventDefault();
 var data = new FormData(this);
 $.ajax({
     url:"/update/image",
     type:"POST",
     data:data,
     processData: false,
    contentType: false,
     success:function(msg){
         if(msg == '200'){

            location.reload();

         }else{
             toastr.success('Something Went Wrong!')
         }


     }

 })

})
})

</script>
@endsection
