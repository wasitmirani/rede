@extends('layouts.frontend.messengermaster')
@section('content')
<div class="flex justify-between items-baseline uk-visible@s">
    <h1 class="font-extrabold leading-none mb-6 mt-8 lg:text-2xl text-lg text-gray-900 tracking-tight"> Search By Name</h1>
    {{-- <a  href="{{ route('my.interest',Auth::user()->id) }}" class="text-blue-400 hover:text-blue-500"> Your McGuffin</a> --}}
</div>
<div class="space-y-4">
    <select class="js-example-basic-single" name="name" id="name">
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
        <option><h3>Group</h3></option>
        @foreach ($groups as $group)
            <option value="{{ $group->id }}">{{ $group->title }}</option>
        @endforeach
    </select>
</div>

<div class="grid lg:grid-cols-4 grid-cols-2 gap-2 hover:text-yellow-700 uk-link-reset " id="nameSearch"></div>



@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('.js-example-basic-single').select2();
        $("#name").on('change',function(){
            var name = $("#name").val();
            var name_value = $("#name option:selected").text();
            var  APP_URL = {!! json_encode(url('/')) !!}+'/user/images/';

            $.ajax({
                'type':'POST',
                'url':"/search/"+name_value,
                'data':{
                    _token:"{{ csrf_token() }}",
                    name : name_value
                },
                success:function(res){

                    var keyword = "";
                    var searchResult = "";


                    jQuery.each(res, function(index, val){

                        var path = APP_URL+val.image;
                        var name = val.name;
                        var profile = {!! json_encode(url('/')) !!}+"/profile/"+val.id+"/"+name;
                        if(val != null){
                            searchResult +='<div class="bg-green-400 max-w-full lg:h-64 my-5 h-40 rounded-md relative overflow-hidden uk-transition-toggle shadow-sm">'
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
                        }else{

                            nameSearch +="<div class='max-w-full lg:h-64 h-40 rounded-md'>OOPs No Search Result Found</div>"

                        }


                        $("#nameSearch").html(searchResult);

                    });

                },
                error:function(err){
                    console.log(err)
                }
            });

    });

});
</script>
@endsection
