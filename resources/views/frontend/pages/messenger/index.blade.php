@extends('layouts.frontend.messengermaster')

@section('content')

<div class="lg:flex justify-center lg:space-x-10 lg:space-y-0 space-y-5">


    <!-- left sidebar-->


    <div class="space-y-5 flex-shrink-0 lg:w-10/12">
        <div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0" id="postArea">
            <div class="grid p-4">
                <form  method="post" action="{{ route('my.story') }}">
                    @csrf
                    <div class="col-span-2">
                        <label for="about">Update Your Story.....</label>
                        <textarea id="about" name="description"  class="resize-none border rounded-md"></textarea>

                    </div>

                    <div class="col-span-2 m-4	">
                        <div class="grid grid-cols-3 gap-4">
                        <button type="submit" class="bg-blue-500 flex font-bold hidden hover:bg--600 hover:text-white inline-block items-center lg:block max-h-10 mr-4 px-4 py-2 rounded shado text-white" aria-expanded="false" id="uploadBtn">Update Story</button>

                        </div>
                    </div>

                </form>
            </div>
    </div>
        <div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0" id="postArea">
            <div class="grid p-4">
                <p>Share Your Feed</p>
                <form id="postForm" method="post">
                    <div class="col-span-2 mcgufin">
                        <select id="interest" name="interest[]" class="js-example-basic-multiple" multiple="multiple">
                            <option>Select Mcguffin</option>
                            @foreach ($mcguffins->interests  as $mcguffin)
                               <option value="{{ $mcguffin->interest }}">{{ $mcguffin->interest }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="about">Write Your Feed Here</label>
                        <textarea id="about" id="post" name="post"  class="resize-none border rounded-md"></textarea>
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



        <!-- post 1-->

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
<script  type="application/javascript">

    $(document).ready(function(){


    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.js-example-basic-multiple').select2();
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


    $('.select2-container').css({'height':'42px;'})



});


</script>
@endsection
