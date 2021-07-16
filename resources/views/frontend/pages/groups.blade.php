@extends('layouts.frontend.messengermaster')
@section('content')
<h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mb-2"> Groups </h1>

<div class="lg:m-0 -mx-5 flex justify-between py-4 relative space-x-3 uk-sticky dark-tabs" uk-sticky="cls-active: bg-gray-100 bg-opacity-95" style="">
  <div class="flex overflow-x-scroll lg:overflow-hidden lg:pl-0 pl-5 space-x-3">
        {{-- <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Shop</a>
        <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> headphones  </a>
        <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Parfums </a>
        <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Fruits </a>
        <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Mobiles  </a>
        <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Laptops </a> --}}
    </div>
    <a href="{{ route('create.group') }}" uk-toggle="target: #offcanvas-create" class="bg-pink-500 hover:bg-pink-600 hover:text-white flex font-bold inline-block items-center px-4 py-2 rounded shadow text-white lg:block hidden"> <i class="-mb-1 mr-1 uil-plus"></i> Create</a>
</div>
<div class="relative mt-4" uk-slider="finite: true">

    <div class="uk-slider-container pb-3">

        <ul class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid">
  @foreach($groups as $group)


            <li>
                <a href="#" uk-toggle="target: #offcanvas-preview">
                    <div class="market-list">
                        <div class="item-media"> <img src="{{ asset('/user/group/images/'.$group->image) }}" alt=""></div>

                        <div class="item-inner">
                            <div class="item-price">{{ $group->title }} </div>
                            <div class="item-title"> {!! $group->description !!} </div>
                            <div class="item-statistic">
                                <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> {{ $group->interest }}</a>

                                <a href="{{ route('show.group',$group->id) }}" uk-toggle="target: #offcanvas-create" class="bg-pink-500 hover:bg-pink-600 hover:text-white flex font-bold inline-block items-center px-4 py-2 rounded shadow text-white lg:block hidden">Visit</a>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
  @endforeach

        </ul>

        <a class="-left-5 absolute bg-white bottom-1/2 flex h-11 items-center justify-center mb-8 p-2 rounded-full shadow text-2xl w-11 z-10 dark:bg-gray-800 dark:text-white" href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i> </a>
        <a class="-right-5 absolute bg-white bottom-1/2 flex h-11 items-center justify-center mb-8 p-2 rounded-full shadow text-2xl w-11 z-10 dark:bg-gray-800 dark:text-white" href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>

    </div>

</div>
@endsection
