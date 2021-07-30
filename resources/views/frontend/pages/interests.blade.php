@extends('layouts.frontend.messengermaster')

@section('content')
<div class="flex justify-between items-baseline uk-visible@s">
    <h1 class="font-extrabold leading-none mb-6 mt-8 lg:text-2xl text-lg text-gray-900 tracking-tight"> Add Your Interests
    </h1>
    <a  href="{{ route('my.interest',Auth::user()->id) }}" class="text-blue-400 hover:text-blue-500"> Your Interest</a>
</div>
<div class="flex space-x-2">
    @foreach($tags as $tag)
    <a data-tag="{{ $tag->tag }}" type="button" data-id="{{ $tag->id }}" class="tag"><div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="text-sm px-3 bg-red-200 text-red-800 rounded-full">{{ $tag->tag }}</div></a>
    @endforeach

</div>
<div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
    @foreach($interests as $interest)
    <div>

        <img src="https://source.unsplash.com/random/350x350" alt=" random imgee" class="w-full object-cover object-center rounded-lg shadow-md">

     <div class="relative px-4 -mt-16  ">
       <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="flex items-baseline">
          {{-- <span class="bg-teal-200 text-teal-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
            New
          </span> --}}
          {{-- <div class="ml-2 text-gray-600 uppercase text-xs font-semibold tracking-wider">
        2 baths  &bull; 3 rooms
      </div> --}}
        </div>

        <h4 class="mt-1 text-xl font-semibold uppercase leading-tight truncate">{{ $interest->interest }}</h4>

    <div class="mt-1">
         <button class="btn btn-business addInterest" type="button" id="addInterest{{ $interest->id }}" data-interest="{{ $interest->interest }}" data-id="{{ $interest->id }}">{{ App\Http\Controllers\InterestController::my_interest($interest->interest) }}</button>
        {{-- <span class="text-gray-600 text-sm">   /wk</span> --}}
      </div>
      <div class="mt-4">
        {{-- <span class="text-teal-600 text-md font-semibold">4/5 ratings </span> --}}
        {{-- <span class="text-sm text-gray-600">(based on 234 ratings)</span> --}}
      </div>
      </div>
     </div>

    </div>
    @endforeach

</div>
{{ $interests->links() }}
{{-- <div class="relative uk-slider" uk-slider="finite: true">
    @if(Session::has('message'))
          <div class="alert alert-select">{{Session::get('message')}}</div>
    @endif
    <div class="uk-slider-container pb-3 -ml-3">
        <form action="{{route('add.interest')}}" method="post">
            @csrf
            <div class="mb-4">
        <select class="js-example-tokenizer form-control " data-select2-id="select2-data-10-o7oq" name="interests[]"  multiple="multiple">
            @foreach($interests as $interest)
            <option value="{{$interest->interest}}">{{$interest->interest}}</option>
            @endforeach

        </select>
        </div>
        <div class="mb-4">

          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        </div>
        <div class="mb-4">
            <button class="btn btn-business " type="submit">Add</button>
        </div>
        </form>

        <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-grid-small" style="transform: translate3d(0px, 0px, 0px);">

            {{-- @foreach($interests as $interest)

            <li tabindex="-1" class="uk-active">
                <div class="bg-gray-200 max-w-full lg:h-64 h-52 rounded-lg relative overflow-hidden">
                    <a href="profile.html">
                        <img src="{{asset('assets/images/post/img7.jpg')}}" class="w-full h-full absolute object-cover inset-0">
                    </a>
                    <a e  class="absolute right-3 top-3 bg-black align-right  bg-opacity-60 rounded-full mb-4" data-id="" data-tippy-placement="left" data-tippy="" data-original-title="Hide">
                       <button id="addInterest{{$interest->id}}" class="btn btn-dark addInterest" data-id="{{$interest->id}}"> Add </button>
                    </a>

                    <div class="absolute bottom-0 p-4 w-full custom-overly1">
                        <div class="flex justify-between align-bottom flex-wrap text-white">
                            {{-- <div class="w-full truncate text-lg" > </div> --}}
                            {{-- <div class="leading-5 text-sm">
                                <div> {{$interest->interest}}  </div>

                            </div>

                        </div>
                    </div>
                </div>
            </li>

            @endforeach --}}

        </ul>

        {{-- <a class="uk-position-center-left uk-position-small p-3.5 bg-white rounded-full w-10 h-10 flex justify-center items-center -mx-4 mb-6 shadow-md dark:bg-gray-800 dark:text-white uk-icon uk-slidenav-previous uk-slidenav uk-invisible" href="#" uk-slidenav-previous="" uk-slider-item="previous"><svg width="14px" height="24px" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-previous"><polyline fill="none" stroke="#000" stroke-width="1.4" points="12.775,1 1.225,12 12.775,23 "></polyline></svg></a>
        <a class="uk-position-center-right uk-positsion-small p-3.5 bg-white rounded-full w-10 h-10 flex justify-center items-center -mx-4 shadow-md dark:bg-gray-800 dark:text-white uk-icon uk-slidenav-next uk-slidenav" href="#" uk-slidenav-next="" uk-slider-item="next"><svg width="14px" height="24px" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-next"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></a>

    </div>

</div> --}}


@endsection
@section('scripts')
<script>

    $(document).ready(function(){


        $.ajax({
            url:'/api/all/interest',
            type:"GET",
            success:function(response){




                jQuery.each(response, (index, item) => {
                    console.log(item.data)

                })

            }
        });
        $(".js-example-tokenizer").select2({
    tags: true,
    tokenSeparators: [',', ' ']
})


$(".addInterest").on("click",function(e){
    e.preventDefault();

    var interest_id = $(this).data('id');
    var interest = $(this).data('interest');
    $.ajax({
        url: "/add/interest",
        type: "post",
        data:{
            interest_id: interest_id,
            interest : interest,
            _token:"{{csrf_token()}}"
        },
        success:function(msg){

            var output = "";
            $("#addInterest"+interest_id).html(msg)

            if(msg == 'Added'){
                toastr.success('Interest Added')
                $("#addInterest"+interest_id).css({"background-color":"red"});

            }else{
                toastr.success('Interest Removed From Your List')

            }



        },
        error:function(err){
           swal('Failed To Add')

        }


    })

})
$(".tag").click(function(){
    var tag = $(this).data('tag')
    var id = $(this).data('id')

    $.ajax({
        url:'/search/tag/'+tag,
        type:"POST",
        data:{_token:"{{ csrf_token() }}",
        id:id,
        tag:tag
    },
        success:function(response){
            console.log(response)

        }
    })
})

    })
</script>
@endsection
