@extends('layouts.frontend.messengermaster')
@section('content')
<div class="flex justify-between mt-6 mb-4">
    <h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight"> My McGuffins </h1>
    <a href="{{route('all.interest')}}" class="text-blue-400 hover:text-blue-500 bg-white py-2 px-4 font-bold shadow"> Add More</a>
</div>
<div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
    @foreach($myInterests as $myInterest)
    <div>
        <img src="{{ Avatar::create($myInterest->interest)->toBase64() }}" alt=" random imgee" class="w-full object-cover object-center rounded-lg shadow-md">
     <div class="relative px-4 -mt-16  ">
       <div class="bg-white p-6 rounded-lg shadow-lg">
     <div class="flex items-baseline">
          {{-- <span class="bg-teal-200 text-teal-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
            New
          </span> --}}
          <div class="ml-2 text-gray-600 uppercase text-xs font-semibold tracking-wider">
        {{-- 2 baths  &bull; 3 rooms --}}
      </div>
        </div>

        <h4 class="mt-1 text-xl font-semibold uppercase leading-tight truncate">{{ $myInterest->interest }}</h4>

      <div class="mt-1">

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
  {{ $myInterests->links() }}

</div>





@endsection
