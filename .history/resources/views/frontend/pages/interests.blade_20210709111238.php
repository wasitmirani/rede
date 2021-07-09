@extends('layouts.frontend.messengermaster')

@section('content')
<div class="flex justify-between items-baseline uk-visible@s">
    <h1 class="font-extrabold leading-none mb-6 mt-8 lg:text-2xl text-lg text-gray-900 tracking-tight"> Add Your Interests
    </h1>
    <a href="#" class="text-blue-400 hover:text-blue-500"> See all</a>
</div>
<div class="relative uk-slider" uk-slider="finite: true">

    <div class="uk-slider-container pb-3 -ml-3">
        <form action="{{add.route}}" method="post">
            <div class="mb-4">
        <select class="js-example-tokenizer form-control " data-select2-id="select2-data-10-o7oq" name="interest[]"  multiple="multiple">
            @foreach($interests as $interest)
            <option value="{{$interest->id}}">{{$interest->interest}}</option>
            @endforeach

          </select>
        </div>

          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
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

            @endforeach --}} --}}

        </ul>

        <a class="uk-position-center-left uk-position-small p-3.5 bg-white rounded-full w-10 h-10 flex justify-center items-center -mx-4 mb-6 shadow-md dark:bg-gray-800 dark:text-white uk-icon uk-slidenav-previous uk-slidenav uk-invisible" href="#" uk-slidenav-previous="" uk-slider-item="previous"><svg width="14px" height="24px" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-previous"><polyline fill="none" stroke="#000" stroke-width="1.4" points="12.775,1 1.225,12 12.775,23 "></polyline></svg></a>
        <a class="uk-position-center-right uk-positsion-small p-3.5 bg-white rounded-full w-10 h-10 flex justify-center items-center -mx-4 shadow-md dark:bg-gray-800 dark:text-white uk-icon uk-slidenav-next uk-slidenav" href="#" uk-slidenav-next="" uk-slider-item="next"><svg width="14px" height="24px" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-next"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></a>

    </div>

</div>


@endsection
@section('scripts')
<script>

    $(document).ready(function(){
        $(".js-example-tokenizer").select2({
    tags: true,
    tokenSeparators: [',', ' ']
})

$(".addInterest").on("click",function(){

    var interest_id = $(this).data('id');
    $.ajax({
        url: "/add/interest",
        type: "post",
        data:{
            interest_id: interest_id,
            _token:"{{csrf_token()}}"
        },
        success:function(msg){

            var output = "";
            $("#addInterest"+interest_id).html(msg)

        },
        error:function(err){
           swal('Failed To Add')

        }


    })

})

    })
</script>
@endsection
