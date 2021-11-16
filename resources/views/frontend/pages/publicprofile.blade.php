@extends('layouts.frontend.messengermaster')
@section('content')
<div class="flex lg:flex-row flex-col items-center lg:py-8 lg:space-x-8">

    <div>
        <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full m-0.5 mr-2  w-56 h-56 relative overflow-hidden uk-transition-toggle">
            @if(!empty($user->image))
            <img src="{{asset('user/images/'.$user->image)}}" class="bg-gray-200 border-4 border-white rounded-full w-full h-full dark:border-gray-900">
            @else
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

        <h2 class="font-semibold lg:text-2xl text-lg mb-2">{{ $user->name }} </h2>
        <p class="lg:text-left mb-2 text-center  dark:text-gray-100">{{ $user->description }}</p>

            <div class="flex font-semibold mb-3 space-x-2  dark:text-gray-10">
                @foreach($user->interests as $interest)<a href="#">{{ $interest->interest }}</a> ,@endforeach
                 {{-- <a href="#">Sports</a>  , <a href="#">Movies</a> --}}
            </div>
            <div class="flex font-semibold mb-3 space-x-2  dark:text-gray-10">
                <a href="#" id="city"></a> , <a href="#" id="state"></a>  , <a href="#">USA</a><a>@if(!empty($profile->zip_code))({{ $profile->zip_code }})@endif</a>
            </div>
            <div class="flex font-semibold mb-3 space-x-2  dark:text-gray-10">
                @if(isset($profile->covid_status))
                    @if($profile->covid_status != "Not Specified")
                    <a href="#"> {{ $profile->covid_status }}</a>
       
                    @endif
                @endif
            </div>
            <div class="capitalize flex font-semibold space-x-3 text-center text-sm my-2">
                <button type="button" id="followBtn"  data-id="{{ $user->id }}" data-follower="{{ Auth::user()->id }}"  class="bg-gray-300 shadow-sm p-2 px-6 rounded-md dark:bg-gray-700">  {{ App\Models\FollowRequest::followStatus($user->id) }}</button>
                {{-- <a href="#" class="bg-pink-500 shadow-sm p-2 pink-500 px-6 rounded-md text-white hover:text-white hover:bg-pink-600"> Send message</a> --}}
                <div>

                {{-- <a href="#" class="bg-gray-300 flex h-12 h-full items-center justify-center rounded-full text-xl w-9 dark:bg-gray-700" aria-expanded="false">
                    <i class="icon-feather-chevron-down"></i>
                </a> --}}

             <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base dark:bg-gray-900 uk-drop" uk-drop="mode: click">

                  {{-- <ul class="space-y-1">
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

                  </ul> --}}

                </div>

                </div>

            </div>

            <div class="divide-gray-300 divide-transparent divide-x grid grid-cols-3 lg:text-left lg:text-lg mt-3 text-center w-full dark:text-gray-100">

                <div class="lg:pl-4 flex lg:flex-row flex-col"> {{ $followers }} @if($followers > 1000) {{ 'k' }} @endif <strong class="lg:pl-2">Followers</strong></div>

            </div>

    </div>

    <div class="w-20"></div>

</div>
@foreach($feeds as $feed)
<div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0">

    <!-- post header-->
    <div class="flex justify-between items-center px-4 py-3">
        <div class="flex flex-1 items-center space-x-4">

            <a href="#">
                <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full">
                    <img src="{{ asset('user/images/'.$user->image) }}" class="bg-gray-200 border border-white rounded-full w-8 h-8">
                </div>
            </a>
            <span class="block capitalize font-semibold dark:text-gray-100"> {{ $user->name }} </span>

        </div>
      <div>
        {{-- <a href="#" aria-expanded="false"> <i class="icon-feather-more-horizontal text-2xl hover:bg-gray-200 rounded-full p-2 transition -mr-1 dark:hover:bg-gray-700"></i> </a> --}}
        <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700 uk-drop" uk-drop="mode: hover;pos: top-right">



        </div>
      </div>
    </div>

    <div uk-lightbox="">
        <p class="py-3 px-4 space-y-3">{!! $feed->feed !!}</p>
        <a href="assets/images/post/img4.jpg">
            <img src="{{ asset('/user/post/images/'.$feed->image) }}" alt="">
        </a>
    </div>
    <div class="py-3 px-4 space-y-3">
        <div class="flex space-x-4 lg:font-bold">
            <a  class="flex items-center space-x-2 likeBtn" type="button" data-feed="{{ $feed->id }}" data-group="{{ $user->id }}">
                <div class="p-2 rounded-full text-black" >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">
                        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                    </svg>
                </div>
                <div class="like{{ $feed->id }}" >@php echo App\Models\FeedLike::LikeStatus($feed->id) @endphp</div>
            </a>
        </div>


    </div>

</div>
@endforeach
@endsection
@section('scripts')
<script>
       $(document).ready(function() {
        $('#followBtn').on('click',function(){


            var following = $(this).data('id');
            var follower = $(this).data('follower');
            var status = 0;

            $.ajax({
                url:"/follow/request",
                type:"POST",
                data:{ _token:"{{csrf_token()}}",
                    following : following,
                    follower : follower,
                    status : status
                },
                success:function(msg){

                 $("#followBtn"+following).html(msg);
                //  if(msg == "Following"){
                //     toastr.success(msg)

                //  }else{
                //     toastr.success(msg)

                //  }



                }
            })

        })

$(".likeBtn").click(function(){

var id = $(this).data('feed');
  $.ajax({
    url:"/like/feed",
    type:'post',
    data:{_token:"{{ csrf_token() }}",id:id,},
    success:function(msg){

        $('.like'+id).html(msg);


    }



})
})

})
</script>
@endsection
