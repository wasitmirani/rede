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
            <div class="flex bg-teal-lighter max-w-sm mb-4">
                <div class="w-16 bg-teal">
                    <div class="p-4">
                        <svg class="h-8 w-8 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M437.019 74.981C388.667 26.629 324.38 0 256 0S123.333 26.63 74.981 74.981 0 187.62 0 256s26.629 132.667 74.981 181.019C123.332 485.371 187.62 512 256 512s132.667-26.629 181.019-74.981C485.371 388.667 512 324.38 512 256s-26.629-132.668-74.981-181.019zM256 470.636C137.65 470.636 41.364 374.35 41.364 256S137.65 41.364 256 41.364 470.636 137.65 470.636 256 374.35 470.636 256 470.636z"/><path d="M256 235.318c-11.422 0-20.682 9.26-20.682 20.682v94.127c0 11.423 9.26 20.682 20.682 20.682 11.423 0 20.682-9.259 20.682-20.682V256c0-11.422-9.259-20.682-20.682-20.682zM270.625 147.248A20.826 20.826 0 0 0 256 141.19a20.826 20.826 0 0 0-14.625 6.058 20.824 20.824 0 0 0-6.058 14.625 20.826 20.826 0 0 0 6.058 14.625A20.83 20.83 0 0 0 256 182.556a20.826 20.826 0 0 0 14.625-6.058 20.826 20.826 0 0 0 6.058-14.625 20.839 20.839 0 0 0-6.058-14.625z"/></svg>
                    </div>
                </div>
                <div class="w-auto text-grey-darker items-center p-4">
                    <span class="text-lg font-bold pb-4">
                        Heads Up!
                    </span>
                    <p class="leading-tight">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, labore, voluptatem. Deserunt illum laborum maxime?
                    </p>
                </div>
            </div>
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
