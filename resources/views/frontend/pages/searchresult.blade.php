@extends('layouts.frontend.messengermaster')
@section('content')

@if ($result != null)
<p>Search  By Interest....</p>

<div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">

    @foreach($result as $res)
<div>

    <img src="{{ asset('/user/images/'.$res->users->image) }}" alt=" random imgee" class="w-full object-cover object-center rounded-lg shadow-md">

 <div class="relative px-4 -mt-16  ">
   <div class="bg-white p-6 rounded-lg shadow-lg">
    <div class="flex items-baseline">
      <span class="bg-teal-200 text-teal-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
      {{ $res->interest }}
      </span>
      <div class="ml-2 text-gray-600 uppercase text-xs font-semibold tracking-wider">
    {{-- 2 baths  &bull; 3 rooms --}}
  </div>
    </div>

    <h4 class="mt-1 text-xl font-semibold uppercase leading-tight truncate">{{ $res->users->name }}</h4>

  <div class="mt-1">
    <a href="{{ route('show.member',$res->users->id) }}"><span class="bg-white py-2 px-4 rounded inline-block font-bold shadow">  views </span></a>
    {{-- <span class="text-gray-600 text-sm">   /wk</span> --}}
  </div>
  <div class="mt-4">
    {{-- <span class="text-teal-600 text-md font-semibold">4/5 ratings </span>
    <span class="text-sm text-gray-600">(based on 234 ratings)</span> --}}
  </div>
  </div>
 </div>

</div>
@endforeach
</div>
@endif

<div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">


@foreach($groups as $group)
<div>

    <img src="{{ asset('/user/group/images/'.$group->image) }}" alt=" random imgee" class="w-full object-cover object-center rounded-lg shadow-md">

 <div class="relative px-4 -mt-16  ">
   <div class="bg-white p-6 rounded-lg shadow-lg">
    <div class="flex items-baseline">
      <span class="bg-teal-200 text-teal-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
        {{ $group->interest }}
      </span>
      <div class="ml-2 text-gray-600 uppercase text-xs font-semibold tracking-wider">
    {{-- 2 baths  &bull; 3 rooms --}}
  </div>
    </div>

    <h4 class="mt-1 text-xl font-semibold uppercase leading-tight truncate">{{ $group->title }}</h4>

  <div class="mt-1">
    <a href="{{ route('show.group',$group->id) }}"><span class="bg-white py-2 px-4 rounded inline-block font-bold shadow">  views </span></a>
    <span class="text-gray-600 text-sm">   /wk</span>
  </div>
  <div class="mt-4">
    <span class="text-teal-600 text-md font-semibold">4/5 ratings </span>
    <span class="text-sm text-gray-600">(based on 234 ratings)</span>
  </div>
  </div>
 </div>

</div>
@endforeach
</div>

<div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">

@foreach($events as $event)
<div>

    <img src="{{ asset('/user/event/images/'.$event->image) }}" alt=" random imgee" class="w-full object-cover object-center rounded-lg shadow-md">

 <div class="relative px-4 -mt-16  ">
   <div class="bg-white p-6 rounded-lg shadow-lg">
    <div class="flex items-baseline">
      <span class="bg-teal-200 text-teal-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
        New
      </span>
      <div class="ml-2 text-gray-600 uppercase text-xs font-semibold tracking-wider">
    {{-- 2 baths  &bull; 3 rooms --}}
  </div>
    </div>

    <h4 class="mt-1 text-xl font-semibold uppercase leading-tight truncate">{{ $event->title }}</h4>

  <div class="mt-1">
    <a href="{{ route('book.event',$event->id) }}"><span class="bg-white py-2 px-4 rounded inline-block font-bold shadow">  views </span></a>
    <span class="text-gray-600 text-sm">   /wk</span>
  </div>
  <div class="mt-4">
    {{-- <span class="text-teal-600 text-md font-semibold">4/5 ratings </span>
    <span class="text-sm text-gray-600">(based on 234 ratings)</span> --}}
  </div>
  </div>
 </div>

</div>
@endforeach
</div>








@endsection
