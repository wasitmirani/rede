@extends('layouts.frontend.messengermaster')
@section('content')
<div class="flex justify-between items-baseline uk-visible@s">
    <h1 class="font-extrabold leading-none mb-6 mt-8 lg:text-2xl text-lg text-gray-900 tracking-tight"> Search By McGuffin</h1>
    {{-- <a  href="{{ route('my.interest',Auth::user()->id) }}" class="text-blue-400 hover:text-blue-500"> Your McGuffin</a> --}}
</div>
<div class="space-y-4">
    <select class="js-example-basic-single" name="mcguffin" id="mcguffin">
        @foreach ($interests as $interest)
            <option value="{{ $interest->id }}">{{ $interest->interest }}</option>
        @endforeach
      </select>
</div>
<div class="flex overflow-x-scroll lg:overflow-hidden lg:pl-0 pl-5 space-x-3"  id="searchKeyword"></div>
<div class="grid lg:grid-cols-4 grid-cols-2 gap-2 hover:text-yellow-700 uk-link-reset " id="searchResult2"></div>



@endsection
@section('scripts')
<script>
$(document).ready(function(){

$('.js-example-basic-single').select2();


$("#mcguffin").on('change',function(){

    var interest = $("#mcguffin").val();
    var mcguffin = $("#mcguffin option:selected").text();
    var  APP_URL = {!! json_encode(url('/')) !!}+'/user/images/';



    $.ajax({
        'type':'POST',
        'url':"/search/interest/"+mcguffin,
        'data':{
            _token:"{{ csrf_token() }}",
            interest : interest
    },
    success:function(res){

        var keyword = "";

        var searchResult = "";


        var users = "";
        jQuery.each(res, function(index, item) {
            users = item.users;
            keyword +='<div><a href="#" class="bg-white py-2 px-4 my-5 rounded inline-block font-bold shadow">'+item.interest+'</a>';


        });

        

        jQuery.each(users, function(index, val){

             var path = APP_URL+val.image;
             var name = val.name;
             var profile = {!! json_encode(url('/')) !!}+"/profile/"+val.id+"/"+name;
            searchResult +='<div class="bg-green-400 max-w-full lg:h-64 h-40 rounded-md relative overflow-hidden uk-transition-toggle shadow-sm">'
                    +'<a href="'+profile+'" uk-toggle="">'
                    +'<img src="'+path+'" class="w-full h-full absolute object-cover inset-0"></a>'
                    +'<a href="'+profile+'" uk-toggle="" class="absolute flex h-full items-center justify-center w-8 w-full uk-transition-scale-up bg-black bg-opacity-10">'
                    +'<img src="'+path+'" alt="" class="w-16 h-16">'
                    +'</a>'
                    +'<div class="absolut absolute bottom-0 flex items-center justify-between px-4 py-3 space-x-2 text-white w-full custom-overly1">'
                    +'<a href="'+profile+'">'+val.name+'</a>'
                    +'<div class="flex space-x-3">'
                    +'<a href="#" class="flex items-center"> <ion-icon name="heart" class="mr-1 md hydrated" role="img" aria-label="heart"></ion-icon>  150 </a>'
                    +'<a href="#" class="flex items-center"> <ion-icon name="chatbubble-ellipses" class="mr-1 md hydrated" role="img" aria-label="chatbubble ellipses"></ion-icon> 30 </a>'
                    +'</div>'
                    +'</div>'
                    +'</div></div>'
                    $("#searchResult2").html(searchResult);
        })

        $("#searchKeyword").html(keyword);

    },
    error:function(err){
        console.log(err)
    }
    });
})

        $('#tabs-nav li:first-child').addClass('active');
$('.tab-content').hide();
$('.tab-content:first').show();

// Click function
$('#tabs-nav li').click(function(){
  $('#tabs-nav li').removeClass('active');
  $(this).addClass('active');
  $('.tab-content').hide();

  var activeTab = $(this).find('a').attr('href');
  $(activeTab).fadeIn();
  return false;
});
})
</script>
@endsection
