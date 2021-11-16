@extends('layouts.frontend.messengermaster')
@section('content')
<h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mb-2">My Booksmarks</h1>
<h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mt-8">My McGuffins </h1>
<div class="my-6 grid lg:grid-cols-5 grid-cols-3 gap-2 hover:text-yellow-700 uk-link-reset">
    <a href="{{route('create.bookmark','mcguffin')}}"  >
        <div class="bg-gray-100 border-4 border-dashed flex flex-col h-full items-center justify-center relative rounded-2xl w-full" >
            <i class="text-4xl uil-plus-circle"></i> <span>Add new </span>
        </div>
    </a>

    @foreach($myInterests as $myinterest)
      @foreach($myinterest->interests as $interest)
    <a href="#" uk-toggle="">
        <img src="{{ Avatar::create($interest->interest)->toBase64() }}" alt="" class="w-full lg:h-60 h-40 rounded-md object-cover">
        <p>{{ $interest->interest }}</p>
    </a>
    @endforeach

    @endforeach

</div>


<div class="my-6 grid lg:grid-cols-4 grid-cols-2 gap-1.5 hover:text-yellow-700 uk-link-reset">
    <div class="flex justify-between items-baseline uk-visible@s">
        <h1 class="font-extrabold leading-none mb-6 mt-8 lg:text-2xl text-lg text-gray-900 tracking-tight"> My Circle</h1>
    </div>
</div>
<div class="my-6 grid lg:grid-cols-5 grid-cols-3 gap-2 hover:text-yellow-700 uk-link-reset">
<a href="{{route('create.bookmark','circle')}}">
    <div class="bg-gray-100 border-4 border-dashed flex flex-col h-full items-center justify-center relative rounded-2xl w-full">
        <i class="text-4xl uil-plus-circle"></i> <span> Add new </span>
    </div>
</a>
@foreach($groups as $group)
<a href="{{ route('event.group',$group->id) }}" uk-toggle="">
    <img src="{{ asset('/user/group/images/'.$group->image) }}" alt="" class="w-full lg:h-60 h-40 rounded-md object-cover">
    <p>{{ $group->description }}</p>
</a>
@endforeach

</div>

<div class="my-6 grid lg:grid-cols-4 grid-cols-2 gap-1.5 hover:text-yellow-700 uk-link-reset">



<div class="flex justify-between items-baseline uk-visible@s">
    <h1 class="font-extrabold leading-none mb-6 mt-8 lg:text-2xl text-lg text-gray-900 tracking-tight"> My Happenings
    </h1>

</div>


</div>

<div class="my-6 grid lg:grid-cols-5 grid-cols-3 gap-2 hover:text-yellow-700 uk-link-reset">
<a href="{{route('create.bookmark','happening')}}">
    <div class="bg-gray-100 border-4 border-dashed flex flex-col h-full items-center justify-center relative rounded-2xl w-full">
        <i class="text-4xl uil-plus-circle"></i> <span> Add new </span>
    </div>
</a>
@foreach($events as $event)
<a href="{{ route('event.detail',$event->id) }}" uk-toggle="">
    <img src="{{ asset('/user/event/images/'.$event->image) }}" alt="" class="w-full lg:h-60 h-40 rounded-md object-cover">
    <p>{{ $event->description }}</p>
</a>
@endforeach

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

function toggleModal() {
  document.getElementById('modal').classList.toggle('hidden')
}
$(document).ready(function(){

    $("#addBookmarkBtn").on('click',function(){
        var title = $("#title").val();
        var url = $("#url").val();
        $.ajax({
            type:"Post",
            url:"add/bookmarks",
            data:{_token: "{{ csrf_token() }}",
                  'title':title,
                  'url':url
                },
            success:function(res){
                if(res == '200'){
                    location.reload();
                }else{

                    $("#message").text("res")
                }
            },
            error:function(err){
                if (err.status == 422) {
                    var errors = err.responseJSON.errors
                    $('#message').empty()
                    jQuery.each(errors, (index, item) => {
                        $('#message').fadeIn().append("<p class='alert alert-warning alert-dismissible fade show'>"+item+"<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button><p>");
                    });

                }


            }


        }); //ajax function
    }); //click function
});
</script>
@endsection
