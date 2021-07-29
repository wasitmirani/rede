@extends('layouts.frontend.messengermaster')

@section('content')
<div class="container container max-w-xl m-auto flex flex-wrap flex-col md:flex-row items-center justify-start">

    <div class="w-full lg:w-1/2 p-3">
      <div class="flex flex-col lg:flex-row rounded overflow-hidden h-auto lg:h-32 border shadow shadow-lg">
        <img class="block h-auto w-full lg:w-48 flex-none bg-cover h-24" src="https://pbs.twimg.com/media/DrM0nIdU0AEhG5b.jpg">
        <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
          <div class="text-black font-bold text-xl mb-2 leading-tight">Can life make you a bitter developer?</div>
          <p class="text-grey-darker text-base">Read more</p>
        </div>
      </div>
    </div>
</div>
@endsection
