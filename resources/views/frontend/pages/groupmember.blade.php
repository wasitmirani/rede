@extends('layouts.frontend.messengermaster')
@section('content')
<h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mb-2">Group Members</h1>

<div class="flex items-center justify-between mt-8 space-x-3">
    <h1 class="flex-1 font-extrabold leading-none lg:text-2xl text-lg text-gray-900 tracking-tight uk-heading-line"><span>Explore</span></h1>
    <div class="bg-white border border-2 border-gray-300 divide-gray-300 divide-x flex rounded-md shadow-sm dark:bg-gray-100">
        <a href="#" class="bg-gray300 flex h-10 items-center justify-center  w-10" data-tippy-placement="top" title="Grid view"> <i class="uil-apps"></i></a>
        <a href="#" class="flex h-10 items-center justify-center w-10" data-tippy-placement="top" title="List view"> <i class="uil-list-ul"></i></a>
    </div>
</div>
<div class="my-6 grid lg:grid-cols-4 grid-cols-2 gap-1.5 hover:text-yellow-700 uk-link-reset">
@foreach($members as $member)
    <div>
        <div class="bg-red-500 max-w-full lg:h-64 h-40 rounded-md relative overflow-hidden uk-transition-toggle" tabindex="0">
                <img src="{{asset('/user/images/'.$member->members->image)}}" class="w-full h-full absolute object-cover inset-0">
                <div class="absolute bg-black bg-opacity-40 bottom-0 flex h-full items-center justify-center space-x-5 text-lg text-white uk-transition-scale-up w-full">
                </div>
            </div>
        </div>
    <div>
@endforeach
    </div>
</div>



@endsection
