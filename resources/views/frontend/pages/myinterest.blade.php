@extends('layouts.frontend.messengermaster')
@section('content')
<div class="flex justify-between mt-6 mb-4">
    <h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight"> My Interests </h1>
    <a href="{{route('all.interest')}}" class="text-blue-400 hover:text-blue-500 bg-white py-2 px-4 font-bold shadow"> Add More</a>
</div>
<div class="flex overflow-x-scroll lg:overflow-hidden lg:pl-0 pl-5 space-x-3 lg:py-2">
    <div class="relative uk-slider" uk-slider="finite: true">

        <div class="uk-slider-container pb-3">
    @foreach($myInterests as $myInterest)
     

      @foreach($myInterest->interests as $int)
          
     <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow">  {{$int->interest}}</a> 
     @endforeach


  @endforeach
</div>
</div>
</div>





@endsection
