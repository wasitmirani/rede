@extends('layouts.frontend.messengermaster')

@section('content')

<div class="lg:flex justify-center lg:space-x-10 lg:space-y-0 space-y-5">


    <!-- left sidebar-->


    <div class="space-y-5 flex-shrink-0 lg:w-10/12">
        <div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0" id="postArea">
            <div class="grid p-4">
                <form id="postForm" method="post">
                    <div class="col-span-2">
                        <label for="about">Update Your Story.....</label>
                        <textarea id="about" name="post"  class="resize-none border rounded-md"></textarea>
                        <img id="blah"  style="width:548px;"  />
                    </div>

                    <div class="col-span-2 m-4	">
                        <div class="grid grid-cols-3 gap-4">
                        <button type="submit" class="bg-blue-500 flex font-bold hidden hover:bg--600 hover:text-white inline-block items-center lg:block max-h-10 mr-4 px-4 py-2 rounded shado text-white" aria-expanded="false" id="uploadBtn">Update Story</button>
                        <input type="file"  id="chekcbox1" name="image">
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0" id="postArea">
            <div class="grid p-4">
                <form id="postForm" method="post">
                    <div class="col-span-2">
                        <label for="about">Write Your Feed Here</label>
                        <textarea id="about" name="post"  class="resize-none border rounded-md"></textarea>
                        <img id="blah"  style="width:548px;"  />
                    </div>

                    <div class="col-span-2 m-4	">
                        <div class="grid grid-cols-3 gap-4">
                        <button type="submit" class="bg-blue-500 flex font-bold hidden hover:bg--600 hover:text-white inline-block items-center lg:block max-h-10 mr-4 px-4 py-2 rounded shado text-white" aria-expanded="false" id="uploadBtn">Post</button>
                        <input type="file"  id="chekcbox1" name="image">
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div id="postCollection"></div>


        <!-- post 1-->
@if(!empty($posts))
        @foreach($posts as $post)
        <div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0">



            <!-- post header-->

            <div class="flex justify-between items-center px-4 py-3">
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
                    <span class="block capitalize font-semibold dark:text-gray-100"> {{ $post->user->name }}  </span><span> {{ $post->feedShareBy ? 'Shared '.$post->feedShareBy->name.' Post' : '' }}<span>
                </div>
              {{-- <div>
                <a href="#" aria-expanded="false"> <i class="icon-feather-more-horizontal text-2xl hover:bg-gray-200 rounded-full p-2 transition -mr-1 dark:hover:bg-gray-700"></i> </a>

                <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700 uk-drop" uk-drop="mode: hover;pos: top-right">

                    <ul class="space-y-1">
                      <li>
                          <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                           <i class="uil-share-alt mr-1"></i> Share
                          </a>
                      </li>
                      <li>
                          <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                           <i class="uil-edit-alt mr-1"></i>  Edit Post
                          </a>
                      </li>
                      <li>
                          <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                           <i class="uil-comment-slash mr-1"></i>   Disable comments
                          </a>
                      </li>
                      <li>
                          <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                           <i class="uil-favorite mr-1"></i>  Add favorites
                          </a>
                      </li>
                      <li>
                        <hr class="-mx-2 my-2 dark:border-gray-800">
                      </li>
                      <li>
                          <a href="#" class="flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600">
                           <i class="uil-trash-alt mr-1"></i>  Delete
                          </a>
                      </li>
                    </ul>

                </div>

              </div> --}}
            </div>


            <div uk-lightbox="">
                <a href="{{asset('assets/images/post/img4.jpg')}}">
                    @if($post->image != null)
                    <img src="{{asset('/user/post/images/'.$post->image)}}" alt="" style="width:665px;">
                    @endif
                </a>
            </div>



            <div class="py-3 px-4 space-y-3">



                <div class="border-t pt-4 space-y-4 dark:border-gray-600">
                    <div class="flex">


                        {!! $post->feed !!}



                    </div>
                    <div class="flex">


                    </div>
                </div>
                <div class="flex space-x-4 lg:font-bold">
                    <button type="button" data-id="{{ Auth::user()->id }}" data-post="{{ $post->id }}" class="flex items-center space-x-2 like">
                        <div class="p-2 rounded-full text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">
                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                            </svg>
                        </div>


                        <div class="likeStatus{{ $post->id }}">@php echo App\Models\FeedLike::likeStatus($post->id) @endphp</div>


                    </button>
                    <button type="button" data-id="{{ $post->user->id }}" data-post={{ $post->id }} class="flex items-center space-x-2 comment">
                        <div class="p-2 rounded-full text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">
                                <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div> Comment</div>
                    </button>
                    <a type="button" class="flex items-center space-x-2 flex-1 justify-end shareBtn" data-post="{{ $post->id }}" data-user="{{ Auth::user()->id  }}" data-id="{{ $post->user->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">
                            <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"></path>
                        </svg>
                        <div> Share</div>
                    </a>
                </div>

                <div class="bg-gray-100 bg-gray-100 rounded-full rounded-md relative dark:bg-gray-800">
                    <form class="commentForm" data-id="{{ Auth::user()->id }}" data-post="{{ $post->id }}">
                    <input  type="text" placeholder="Add your Comment.." class="bg-transparent max-h-10 shadow-none comment-input"  name="comment">
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                    <input type="hidden" id="postId{{ $post->id }}" name="postId" value="{{ $post->id }}">
                    <div class="absolute bottom-0 flex h-full items-center right-0 right-3 text-xl space-x-2">
                    <button type="submit" id="send{{ $post->id }}" > <i class="uil-comment"></i></button>

                    </div>
                </form>
                </div>

            </div>
            @foreach($comments as $comment)
              @if($comment->post_id == $post->id)
            {{-- <div class="flex">
                <div class="w-10 h-10 rounded-full relative flex-shrink-0 ml-4 mb-4">
                    <img src="{{asset('user/images/'.$comment->user->image)}}" alt="" class="absolute h-full rounded-full w-full">
                </div>
                <div class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 h-full relative lg:ml-5 ml-2 lg:mr-20  dark:bg-gray-800 dark:text-gray-100">
                    <p class="leading-6" >{{$comment->comment }} <urna class="i uil-heart"></urna> <i class="uil-grin-tongue-wink"> </i> </p>
                    <div class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>
                </div>
            </div> --}}

            @endif
            @endforeach
            <div  id="moreComment{{ $post->id }}"></div>
            <button class="showMore" data-id="{{ $post->id }}" class="flex items-center space-x-2 comment">Show Comments</button>

        </div>

        @endforeach
@endif

        <!-- post 2-->



        <!-- Load more-->
        {{-- <div class="flex justify-center mt-6" id="toggle" uk-toggle="target: #toggle ;animation: uk-animation-fade">
            <a href="#" class="bg-white dark:bg-gray-900 font-semibold my-3 px-6 py-2 rounded-full shadow-md dark:bg-gray-800 dark:text-white">
                Load more ..</a>
        </div> --}}

        <!-- post 3-->


        <!-- post 4-->


        <!-- Load more-->


    </div>

    <!-- right sidebar-->


    </div>

</div>

@endsection
@section('scripts')
<script >

    $(document).ready(function(){

        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


chekcbox1.onchange = evt => {
  const [file] = chekcbox1.files
  if (file) {

    // blah.src = URL.createObjectURL(file)
    blah.src = URL.createObjectURL(event.target.files[0]);

  }
}

        $('#postForm').on('submit',function(e){

            e.preventDefault();


            var data = new FormData(this);
            $.ajax({
                url:'/store/feed',
                type:'POST',
                data:data,
                processData: false,
                contentType: false,
                success:function(msg){
                    var output = '';
                    output +='<div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0"><div class="flex justify-between items-center px-4 py-3">'
                            +'<div class="flex flex-1 items-center space-x-4">'
                            +'<a href="#">'
                            +'<div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full">'
                            +'<img src="{{ asset('user/images/') }}/'+msg.image+'" class="bg-gray-200 border border-white rounded-full w-8 h-8">'
                            +'</div>'
                            +'</a>'
                            +'<span class="block capitalize font-semibold dark:text-gray-100">'+user.name+'</span>'
                            +'</div>'
                            +'<div>'
                            +'<a href="#" aria-expanded="false"> <i class="icon-feather-more-horizontal text-2xl hover:bg-gray-200 rounded-full p-2 transition -mr-1 dark:hover:bg-gray-700"></i> </a></div></div><div uk-lightbox="">'
                            +'<p>'+msg.feed+'</p>'
                            +'<a href="{{ asset('/user/post/images/') }}/'+msg.image+'">'
                            +'<img src="{{ asset('/user/post/images/') }}/'+msg.image+'" alt="" style="width:665px;">'
                            +'</a></div><div class="py-3 px-4 space-y-3"><div class="flex space-x-4 lg:font-bold">'
                            +'<a href="#" class="flex items-center space-x-2">'
                            +'<div class="p-2 rounded-full text-black">'
                            +'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">'
                            +'<path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>'
                            +'</svg></div><div>{{App\Models\FeedLike::likeStatus('+msg.post_id+')}}</div></a><a href="#" class="flex items-center space-x-2"><div class="p-2 rounded-full text-black">'
                           +'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">'
                           +'<path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>'
                            +'</svg>'
                          +'</div><div> Comment</div></a></div><div class="bg-gray-100 bg-gray-100 rounded-full rounded-md relative dark:bg-gray-800">'
                          +'<input type="text" placeholder="Add your Comment.." class="bg-transparent max-h-10 shadow-none">'
                          +'<div class="absolute bottom-0 flex h-full items-center right-0 right-3 text-xl space-x-2">'
                          +'<a href="#"> <i class="uil-image"></i></a>'
                          +'<a href="#"> <i class="uil-video"></i></a>'
                        +'</div></div></div></div>';
                    $("#postCollection").append(output);
                    toastr.success('Your Feed Posted')


                },
                error:function(err){
                    if(err.status == 422){
                        toastr.error("You Can't Share Empty Feed")




                    }



                }


            })

        })

        $('.followBtn').on('click',function(){
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

        $('.like').on('click',function(){

            var likedBy = $(this).data('id');
            var like = 1;
            var postId = $(this).data('post');
            $.ajax({
                url:"/like/feed",
                type:"POST",
                data:{
                    _token:"{{ csrf_token() }}",
                    likedBy:likedBy,
                    like:like,
                    id:postId
                },
                success:function(msg){

                        $(".likeStatus"+postId).html(msg);


                }
            })

        })

        $('.commentForm').on('submit',function(e){
            e.preventDefault();

            var data = new FormData(this);
            var id = $(this).data('post');
            $.ajax({
                url:"/post/comment",
                type:"POST",
                processData: false,
                contentType: false,
                data:data,
                succss:function(msg){

                  var output = "";

                        output +='<div class="flex"><div class="w-10 h-10 rounded-full relative flex-shrink-0 ml-4 mb-4">'
                               +'<img src="" alt="" class="absolute h-full rounded-full w-full">'
                               +'</div>'
                               +'<div class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 h-full relative lg:ml-5 ml-2 lg:mr-20  dark:bg-gray-800 dark:text-gray-100">'
                               +'<p class="leading-6" ><urna class="i uil-heart"></urna> <i class="uil-grin-tongue-wink"></i></p>'
                               +'<div class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>'
                               +'</div></div>'
                               $(".comment-input").val("");
                               $("#commentDisplay"+id).fadeIn().append(output);




                }

            })


     })

        $('.showMore').on('click',function(){
          var id = $(this).data('id');
          $.ajax({
              url:"/show/more/"+id,
              type:"POST",
              data:{_token:"{{ csrf_token() }}", id:id},
              success:function(msg){
                var output = "";
                  jQuery.each(msg,function(index, item){


                      output +='<div class="flex"><div class="w-10 h-10 rounded-full relative flex-shrink-0 ml-4 mb-4">'
                               +'<img src="{{asset('user/images/')}}/'+item.user.image+'" alt="" class="absolute h-full rounded-full w-full">'
                               +'</div>'
                               +'<div class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 h-full relative lg:ml-5 ml-2 lg:mr-20  dark:bg-gray-800 dark:text-gray-100">'
                                +'<p class="leading-6" >'+item.comment+'<urna class="i uil-heart"></urna> <i class="uil-grin-tongue-wink"></i></p>'
                                +'<div class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>'
                               +'</div></div>'

                  })
                  $("#moreComment"+id).fadeIn().append(output);



              }
          })
        });

        $('.acceptBtn').on('click',function(){

            var id = $(this).data('id');

            $.ajax({
                url:"/accept/follow/request",
                type:'POST',
                data:{id:id},
                success:function(msg){
                     $('#acceptBtn'+id).html(msg)


                }
            });

        })

        $(".shareBtn").click(function(){

            var user_id = $(this).data('user');
            var post_id = $(this).data('post');
            var share_id = $(this).data('id')
            $.ajax({
                url:'/share/feed',
                type:'POST',
                data:{
                user_id:user_id,
                post_id:post_id,
                share_id:share_id
            },
                success:function(msg){
                    var output = '';
                    output +='<div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0"><div class="flex justify-between items-center px-4 py-3">'
                            +'<div class="flex flex-1 items-center space-x-4">'
                            +'<a href="#">'
                            +'<div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full">'
                            +'<img src="{{ asset('user/images/') }}/'+msg.image+'" class="bg-gray-200 border border-white rounded-full w-8 h-8">'
                            +'</div>'
                            +'</a>'
                            +'<span class="block capitalize font-semibold dark:text-gray-100">'+user.name+'</span>'
                            +'</div>'
                            +'<div>'
                            +'<a href="#" aria-expanded="false"> <i class="icon-feather-more-horizontal text-2xl hover:bg-gray-200 rounded-full p-2 transition -mr-1 dark:hover:bg-gray-700"></i> </a></div></div><div uk-lightbox="">'
                            +'<p>'+msg.feed+'</p>'
                            +'<a href="{{ asset('/user/post/images/') }}/'+msg.image+'">'
                            +'<img src="{{ asset('/user/post/images/') }}/'+msg.image+'" alt="" style="width:665px;">'
                            +'</a></div><div class="py-3 px-4 space-y-3"><div class="flex space-x-4 lg:font-bold">'
                            +'<a href="#" class="flex items-center space-x-2">'
                            +'<div class="p-2 rounded-full text-black">'
                            +'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">'
                            +'<path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>'
                            +'</svg></div><div>{{App\Models\FeedLike::likeStatus('+msg.post_id+')}}</div></a><a href="#" class="flex items-center space-x-2"><div class="p-2 rounded-full text-black">'
                           +'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">'
                           +'<path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>'
                            +'</svg>'
                          +'</div><div> Comment</div></a></div><div class="bg-gray-100 bg-gray-100 rounded-full rounded-md relative dark:bg-gray-800">'
                          +'<input type="text" placeholder="Add your Comment.." class="bg-transparent max-h-10 shadow-none">'
                          +'<div class="absolute bottom-0 flex h-full items-center right-0 right-3 text-xl space-x-2">'
                          +'<a href="#"> <i class="uil-image"></i></a>'
                          +'<a href="#"> <i class="uil-video"></i></a>'
                        +'</div></div></div></div>';
                    $("#postCollection").append(output);
                    toastr.success('Post Shared')


                }
            })

        })
    })

</script>
@endsection
