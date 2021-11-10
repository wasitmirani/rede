@extends('layouts.frontend.messengermaster')
@section('content')
<h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mb-2">My Booksmarks </h1>
<div class="my-6 grid lg:grid-cols-5 grid-cols-3 gap-2 hover:text-yellow-700 uk-link-reset">
    <a type="button"  onclick="toggleModal()">
        <div class="bg-gray-100 border-4 border-dashed flex flex-col h-full items-center justify-center relative rounded-2xl w-full">
            <i class="text-4xl uil-plus-circle"></i> <span> Add new </span>
        </div>
    </a>
    @foreach($bookmarks as $bookmark)
    <a href="{{ $bookmark->url }}" uk-toggle="">

        <img src="{{ Avatar::create($bookmark->title)->toBase64() }}" alt="" class="w-full lg:h-60 h-40 rounded-md object-cover">
    </a>
    @endforeach

</div>
<div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modal">
    <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-900 opacity-75" />
      </div>
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
      <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
         <p id="message"></p>
          <label>Title</label>
          <input type="text" id="title" class="w-full bg-gray-100 p-2 mt-2 mb-3" />
          <label>Url</label>
          <input type="text" id="url" class="w-full bg-gray-100 p-2 mt-2 mb-3" />
        </div>
        <div class="bg-gray-200 px-4 py-3 text-right">
          <button type="button" class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2" onclick="toggleModal()"><i class="fas fa-times"></i> Cancel</button>
          <button type="button" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2" id="addBookmarkBtn"><i class="fas fa-plus"></i> Create</button>
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
