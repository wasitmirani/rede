@extends('layouts.frontend.messengermaster')
@section('content')
<h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mb-2"> Groups </h1>



<div class="lg:m-0 -mx-5 flex justify-between py-4 relative space-x-3 uk-sticky dark-tabs" uk-sticky="cls-active: bg-gray-100 bg-opacity-95" style="">

  <div class="flex overflow-x-scroll lg:overflow-hidden lg:pl-0 pl-5 space-x-3">
    <h5 class="text-2xl   leading-none text-gray-900 tracking-tight "> Sort By</h5>
    <input type="text" name="product" list="productName"/>
    <datalist id="productName">
        <option value="Pen">Pen</option>
        <option value="Pencil">Pencil</option>
        <option value="Paper">Paper</option>
    </datalist>
        {{-- <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Shop</a>
        <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> headphones  </a>
        <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Parfums </a>
        <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Fruits </a>
        <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Mobiles  </a>
        <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Laptops </a> --}}
    </div>
    <a href="{{ route('create.group') }}" uk-toggle="target: #offcanvas-create" class="bg-pink-500 hover:bg-pink-600 hover:text-white flex font-bold inline-block items-center px-4 py-2 rounded shadow text-white lg:block hidden"> <i class="-mb-1 mr-1 uil-plus"></i> Create</a>
</div>


<div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
    @foreach($groups as $group)
	<div>
		<img src="{{ asset('user/group/images/'.$group->image) }}" alt=" random imgee" class="w-full object-cover object-center rounded-lg shadow-md">
		<div class="relative px-4 -mt-16  ">
			<div class="bg-white p-6 rounded-lg shadow-lg">
				<div class="flex items-baseline">

				</div>
				<h4 class="mt-1 text-xl font-semibold uppercase leading-tight truncate">{{ $group->title }} </h4>
				<div class="mt-1">
					<a  href="{{ route('show.group',$group->id) }}" data-interest=" Popular Culture" data-id="22" class="btn btn-business addInterest"> visit</a>
				</div>
				<div class="mt-4"></div></div></div></div>

@endforeach

</div>


@endsection
