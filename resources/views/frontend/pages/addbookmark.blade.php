@extends('layouts.frontend.messengermaster')
@section('content')
<h1 class="font-extrabold leading-none mb-6 mt-8 lg:text-2xl text-lg text-gray-900 tracking-tight">Add Bookmark</h1>
   @if ($bookmark == 'mcguffin')
    <div class="flex justify-between items-baseline uk-visible@s">
       <h1 class="font-extrabold leading-none mb-6 mt-8 lg:text-2xl text-lg text-gray-900 tracking-tight">McGuffin</h1>
       <input type="hidden" value="{{ $bookmark }}" id="type">
    </div>
    <div class="relative mt-4 uk-slider" uk-slider="finite: true">

        <div class="uk-slider-container pb-3">


<div class="my-6 grid lg:grid-cols-5 grid-cols-3 gap-2 hover:text-yellow-700 uk-link-reset">
            @forelse($mcguffins as $mcguffin)
            <div>
                <button type="button" class="mcguffinBtn" data-title="{{ $mcguffin->interest }}" data-participant="{{ Auth::user()->id }}" data-bookmark="{{ $mcguffin->id }}">
                        <div>
                            <img src="{{ Avatar::create($mcguffin->interest)->toBase64() }}" alt="" class="w-full lg:h-60 h-40 rounded-md object-cover">
                        </div>
                        <div class="item-inner">
                            <div class="item-title"> {{ $mcguffin->interest }} </div>
                        </div>
                </button>
            </div>
            @empty
            <div>
                <h3>Add Mcguffins</h3>
            </div>
            @endforelse
            </div>
        </div>

    </div>

   @endif
   @if ($bookmark == 'circle')
    <div class="flex justify-between items-baseline uk-visible@s">
        <input type="hidden" value="{{ $bookmark }}" id="type">
       <h1 class="font-extrabold leading-none mb-6 mt-8 lg:text-2xl text-lg text-gray-900 tracking-tight">Circle</h1>
    </div>
    <div class="my-6 grid lg:grid-cols-5 grid-cols-3 gap-2 hover:text-yellow-700 uk-link-reset">
            @forelse($circles as $circle)
                    <button type="button"  class="mcguffinBtn" data-title="{{ $circle->interest }}" data-participant="{{ Auth::user()->id }}" data-bookmark="{{ $circle->id }}">
                            <div class="item-media"> <img src="{{ Avatar::create($circle->name)->toBase64() }}" alt=""></div>
                            <div class="item-inner">
                                {{-- <div class="item-price"> 20$ </div> --}}
                                <div class="item-title"> {{ $circle->name }} </div>

                            </div>
                    </button>
            @empty
            <h3>Add Circles</h3>
            @endforelse
   @endif
   @if ($bookmark == "happening")
    <div class="flex justify-between items-baseline uk-visible@s">
        <input type="hidden" value="{{ $bookmark }}" id="type">
        <h1 class="font-extrabold leading-none mb-6 mt-8 lg:text-2xl text-lg text-gray-900 tracking-tight">Happening</h1>
    </div>
    <div class="my-6 grid lg:grid-cols-5 grid-cols-3 gap-2 hover:text-yellow-700 uk-link-reset">

        @foreach($happenings  as $happening)

                <button type="button"  class="mcguffinBtn" data-title="{{ $happening->title }}" data-participant="{{ Auth::user()->id }}" data-bookmark="{{ $happening->id }}">

                        <div class="item-media"> <img src="{{ asset('/user/event/images/'.$happening->image) }}" alt=""></div>

                        <div class="item-inner">
                            {{-- <div class="item-price"> 20$ </div> --}}
                            <div class="item-title"> {{ $happening->title }} </div>

                        </div>

                </button>

        @endforeach

    </div>

   @endif


@endsection
@section('scripts')
   <script>
    $(document).ready(function(){
        $(".mcguffinBtn").click(function(){

            var title = $(this).data('title');
            var participents = $(this).data('participant');
            var bookmark = $(this).data('bookmark');
            var type = $("#type").val();
            $.ajax({
                'type':'POSt',
                'url':'/add/bookmarks',
                'data':{_token:"{{ csrf_token() }}",
                    title: title,
                    participents : participents,
                    bookmark : bookmark,
                    type:type

                },
                success:function(res){
                    if(res == "200"){

                        toastr.success(" BookMarked ")

                    }else if(res == "300"){

                        toastr.success("Already Bookmarked")

                    }else{
                        toastr.error(res);
                    }
                },
                error:function(err){
                    if (err.status == 422) {
                    var errors = err.responseJSON.errors
                    $('#message').empty()
                    jQuery.each(errors, (index, item) => {
                        toastr.error(" "+item+" ")
                        // $('#message').fadeIn().append("<p class='alert alert-warning alert-dismissible fade show'>"+item+"<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button><p>");
                    });
                }


                }
            })

        })

    })
   </script>
@endsection
