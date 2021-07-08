@extends('layouts.frontend.messengermaster')
@section('content')
<div class="container m-auto">

    <h1 class="text-2xl leading-none text-gray-900 tracking-tight mt-3"> Account Setting </h1>
    <ul class="mt-5 -mr-3 flex-nowrap lg:overflow-hidden overflow-x-scroll uk-tab">
        <li class="uk-active"><a href="#">General</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Privacy</a></li>
        <li><a href="#">Notification</a></li>
        <li><a href="#">Social links</a></li>
        <li><a href="#">Billing</a></li>
        <li><a href="#">Security</a></li>
    </ul>

    <div class="grid lg:grid-cols-3 mt-12 gap-8">

        <div class="bg-white rounded-md lg:shadow-lg shadow col-span-2">
            @if(Session::has('message'))
            <div class="bg-indigo-900 text-center py-4 lg:px-4">
              <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3"></span></span>
                <span class="font-semibold mr-2 text-left flex-auto">{{Session::get('message')}}</span>
                <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
              </div>
            </div>
            @endif
<form action="{{route('edit.profile')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-cols-2 gap-3 lg:p-6 p-4">
        <div>
            <label for=""> First name</label>
            <input type="text" placeholder="Your name.." class="shadow-none bg-gray-100" name="name" value="{{$user->name}}">
        </div>
        <div>
         <label for=""> Email</label>
         <input type="text" placeholder="Your name.." class="shadow-none bg-gray-100" name="email" value="{{$user->email}}">
         </div>
         <div>
             <label for=""> Username</label>
             <input type="text" placeholder="Your name.." class="shadow-none bg-gray-100" name="username" value="{{$user->username}}">
         </div>
         <div>
          <label for="">Phone </label>
          <input type="text" placeholder="Your name.." class="shadow-none bg-gray-100" name="phone_number" value="{{$user->phone_number}}">
          </div>

         <div class="col-span-2">
             <label for="about">Upload Image</label>
             <input type="file" name="image" class="shadow-none bg-gray-100">
             @if($user->image != null)
             <input type="hidden" name="old_image"  value={{$user->image}}}>
             @endif
         </div>


    </div>

    <div class="bg-gray-10 p-6 pt-0 flex justify-end space-x-3">

        <button type="submit" class="button bg-blue-700"> Update </button>
    </div>


</form>

        </div>


    </div>

</div>

@endsection
