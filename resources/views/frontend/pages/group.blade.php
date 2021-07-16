@extends('layouts.frontend.messengermaster')
@section('content')
<div class="container m-auto">



    <div class="lg:flex justify-center lg:space-x-10 lg:space-y-0 space-y-5">

        <!-- left sidebar-->
        <div class="space-y-5 flex-shrink-0 lg:w-8/12">

            <div class="flex lg:flex-row flex-col items-center lg:py-8 lg:space-x-8">

                <div>
                    <div style="width: 143px; height: 140px;" class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full m-0.5 mr-2  w-56 h-56 relative overflow-hidden uk-transition-toggle">
                        <img src="{{ asset('/user/group/images/'.$group->image) }}" class="bg-gray-200 border-4 border-white rounded-full w-full h-full dark:border-gray-900">

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

                    <h2 class="font-semibold lg:text-2xl text-lg mb-2"> {{ $group->title }}</h2>
                    <p class="lg:text-left mb-2 text-center  dark:text-gray-100"> {!! $group->description !!}</p>

                        <div class="flex font-semibold mb-3 space-x-2  dark:text-gray-10">
                            <a href="#">{{ $group->interest }}</a>
                        </div>


                        <div class="capitalize flex font-semibold space-x-3 text-center text-sm my-2">
                            <a type="button" data-id={{ $group->id }} id="joinBtn" class="bg-gray-300 shadow-sm p-2 px-6 rounded-md dark:bg-gray-700">

                                @if($member != null)
                                @if($member->user_id == $group->user_id && $member->group_id == $group->id)

                                Joined


                                @endif
                                @endif

                                Join Group

                            </a>
                            <a href="#" class="bg-pink-500 shadow-sm p-2 pink-500 px-6 rounded-md text-white hover:text-white hover:bg-pink-600"> Send message</a>
                            <div>

                            <a href="#" class="bg-gray-300 flex h-12 h-full items-center justify-center rounded-full text-xl w-9 dark:bg-gray-700" aria-expanded="false">
                                <i class="icon-feather-chevron-down"></i>
                            </a>

                            <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base dark:bg-gray-900 uk-drop" uk-drop="mode: click">

                                <ul class="space-y-1">
                                    <li>
                                        <a href="{{ route('create.group.event',$group->id) }}" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-700">
                                         <i class="uil-user-minus mr-2"></i>Create Event
                                        </a>
                                    </li>

                                  </ul>

                            </div>

                            </div>

                        </div>



                </div>

                <div class="w-20"></div>

            </div>
            <div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0" id="postArea">
                <div class="grid grid-cols-2 gap-3 lg:p-6 p-4">
                    <form id="postForm" method="post">
                        <div class="col-span-2">
                            <label for="about">Share Your Ideas....</label>
                            <textarea id="about" name="post"  class="shadow-none bg-gray-100" data-emojiable="true"></textarea>
                            <input type="hidden" name="group_id" value="{{ $group->id }}">
                        </div>

                        <div class="col-span-2">
                            <button type="submit" class="bg-pink-500 flex font-bold hidden hover:bg-pink-600 hover:text-white inline-block items-center lg:block max-h-10 mr-4 px-4 py-2 rounded shado text-white" aria-expanded="false" id="uploadBtn">Upload</button>
                            <div class="checkbox">
                                <input type="file" id="chekcbox1" name="image">
                                <label for="chekcbox1"><span class="checkbox-icon"></span></label>
                            </div>

                        </div>

                    </form>
                </div>
            </div>

            <!-- post 1-->
            <div id="postArea"></div>
            @foreach($posts as $post)
            <div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0">

                <!-- post header-->
                <div class="flex justify-between items-center px-4 py-3">
                    <div class="flex flex-1 items-center space-x-4">
                        <a href="#">
                            <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full">
                                <img src="{{ asset('/user/images/'.$post->member->image) }}" class="bg-gray-200 border border-white rounded-full w-8 h-8">
                            </div>
                        </a>
                        <span class="block capitalize font-semibold dark:text-gray-100"> {{ $post->member->name }}</span>

                    </div>
                  <div>
                    <a href="#" aria-expanded="false"> <i class="icon-feather-more-horizontal text-2xl hover:bg-gray-200 rounded-full p-2 transition -mr-1 dark:hover:bg-gray-700"></i> </a>

                  </div>
                </div>
                <div class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 h-full relative lg:ml-5 ml-2 lg:mr-20  dark:bg-gray-800 dark:text-gray-100">
                    <p class="leading-6">{{ $post->content }}
                    </p>
                    <div class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>
                </div>
                <div uk-lightbox="">
                    <a href="{{ asset('/user/group/post/images/'.$post->file) }}">
                        <img src="{{ asset('/user/group/post/images/'.$post->file) }}" alt="">
                    </a>
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
                        <a href="#" class="flex items-center space-x-2">
                            <div class="p-2 rounded-full text-black">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">
                                    <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div> Comment</div>
                        </a>

                    </div>




                    <div class="bg-gray-100 bg-gray-100 rounded-full rounded-md relative dark:bg-gray-800">
                        <input type="text" placeholder="Add your Comment.." class="bg-transparent max-h-10 shadow-none">
                        <div class="absolute bottom-0 flex h-full items-center right-0 right-3 text-xl space-x-2">
                            <a href="#"> <i class="uil-image"></i></a>
                            <a href="#"> <i class="uil-video"></i></a>
                        </div>
                    </div>

                </div>

            </div>
            @endforeach

            <!-- post 2-->



            <!-- Load more-->


            <!-- post 3-->

            <!-- post 4-->


            <!-- Load more-->



        </div>

        <!-- right sidebar-->
        <div class="lg:w-4/12">

            <div class="bg-white dark:bg-gray-900 shadow-md rounded-md overflow-hidden">

                <div class="bg-gray-50 dark:bg-gray-800 border-b border-gray-100 flex items-baseline justify-between py-4 px-6 dark:border-gray-800">
                    <h2 class="font-semibold text-lg">Members</h2>

                </div>

                <div class="divide-gray-300 divide-gray-50 divide-opacity-50 divide-y px-4 dark:divide-gray-800 dark:text-gray-100">
                    @foreach($groupMembers as $groupMember)


                    <div class="flex items-center justify-between py-3">
                        <div class="flex flex-1 items-center space-x-4">
                            <a href="profile.html">
                                <img src="{{ asset('user/images/'.$groupMember->members->image) }}" class="bg-gray-200 rounded-full w-10 h-10">
                            </a>
                            <div class="flex flex-col">
                                <span class="block capitalize font-semibold">{{ $groupMember->members->name }} </span>

                            </div>
                        </div>


                    </div>

                    @endforeach


                </div>

            </div>

            <div class="mt-5 uk-sticky" uk-sticky="offset:28; bottom:true ; media @m">
                <div class="bg-white dark:bg-gray-900 shadow-md rounded-md overflow-hidden">



                </div>
            </div><div class="uk-sticky-placeholder" hidden="" style="height: 381px; margin: 20px 0px 0px;"></div>

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


        $('#joinBtn').click(function(){

              var group_id = $(this).data('id');
              $.ajax({
                  url:"/join/group",
                  type:"get",
                  data:{_token:"{{ csrf_token() }}",group_id : group_id},
                  success:function(msg){
                      if(msg == 'Joined'){

                        $("#joinBtn").html(msg)
                        toastr.success('Group Join Successfully');

                      }else if(msg == 'Join'){
                        $("#joinBtn").html('Join Group')

                      }


                  }
              })

        })

        $('#postForm').on('submit',function(e){

            e.preventDefault();
            var data = new FormData(this);
            $.ajax({
                url:'/create/group/post',
                type:'POST',
                data:data,
                processData: false,
                contentType: false,
                success:function(msg){
                    var member = msg.member;


                     toastr.success();
                     var output = "";
                     output +='<div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0"><div class="flex justify-between items-center px-4 py-3">'
                            +'<div class="flex flex-1 items-center space-x-4">'
                            +'<a href="#">'
                            +'<div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full">'
                            +'<img src="{{ asset('user/images/') }}/'+member.image+'" class="bg-gray-200 border border-white rounded-full w-8 h-8">'
                            +'</div>'
                            +'</a>'
                            +'<span class="block capitalize font-semibold dark:text-gray-100">'+member.name+'</span>'
                            +'</div>'
                            +'<div>'
                            +'<a href="#" aria-expanded="false"> <i class="icon-feather-more-horizontal text-2xl hover:bg-gray-200 rounded-full p-2 transition -mr-1 dark:hover:bg-gray-700"></i> </a></div></div><div uk-lightbox="">'
                            +'<p>'+msg.content+'</p>'
                            +'<a href="{{ asset('/user/group/post/images/') }}/'+msg.file+'">'
                            +'<img src="assets/images/post/img4.jpg" alt="">'
                            +'</a></div><div class="py-3 px-4 space-y-3"><div class="flex space-x-4 lg:font-bold">'
                            +'<a href="#" class="flex items-center space-x-2">'
                            +'<div class="p-2 rounded-full text-black">'
                            +'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">'
                            +'<path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>'
                            +'</svg></div><div> Like</div></a><a href="#" class="flex items-center space-x-2"><div class="p-2 rounded-full text-black">'
                           +'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">'
                           +'<path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>'
                            +'</svg>'
                          +'</div><div> Comment</div></a></div><div class="bg-gray-100 bg-gray-100 rounded-full rounded-md relative dark:bg-gray-800">'
                          +'<input type="text" placeholder="Add your Comment.." class="bg-transparent max-h-10 shadow-none">'
                          +'<div class="absolute bottom-0 flex h-full items-center right-0 right-3 text-xl space-x-2">'
                          +'<a href="#"> <i class="uil-image"></i></a>'
                          +'<a href="#"> <i class="uil-video"></i></a>'
                        +'</div></div></div></div>';

                        $("#postArea").append(output);


                }
            })



        })

    })
</script>
@endsection
