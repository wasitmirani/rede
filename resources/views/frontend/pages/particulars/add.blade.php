@extends('layouts.frontend.messengermaster')
@section('content')
<div class="flex lg:flex-row flex-col items-center lg:py-8 lg:space-x-8">

    <div>
        <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full m-0.5 mr-2  w-56 h-56 relative overflow-hidden uk-transition-toggle">  
            <img src="assets/images/avatars/avatar-7.jpg" class="bg-gray-200 border-4 border-white rounded-full w-full h-full dark:border-gray-900">

            <div class="absolute -bottom-3 custom-overly1 flex justify-center pt-4 pb-7 space-x-3 text-2xl text-white uk-transition-slide-bottom-medium w-full">
                <a href="#" class="hover:text-white">
                    <i class="uil-camera"></i>
                </a>
                <a href="#" class="hover:text-white">
                    <i class="uil-crop-alt"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="lg:w/8/12 flex-1 flex flex-col lg:items-start items-center"> 

        <h2 class="font-semibold lg:text-2xl text-lg mb-2"> Stella Jonathan</h2>
        <p class="lg:text-left mb-2 text-center  dark:text-gray-100"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet 
            doming id quod mazim placerat facer possim assum</p>


            
            <div class="capitalize flex font-semibold space-x-3 text-center text-sm my-2">
           
             
                <div>

            
                    
                <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base dark:bg-gray-900 uk-drop" uk-drop="mode: click">
              
              
                </div>

                </div>

            </div>

            <div class="divide-gray-300 divide-transparent divide-x grid grid-cols-3 lg:text-left lg:text-lg mt-3 text-center w-full dark:text-gray-100">
                <div class="flex lg:flex-row flex-col"> Vaccinated <strong class="lg:pl-2">(Zip)</strong></div>
                <div class="lg:pl-4 flex lg:flex-row flex-col"> 420k <strong class="lg:pl-2">Followers</strong></div>
                <div class="lg:pl-4 flex lg:flex-row flex-col"> 530k <strong class="lg:pl-2">Following</strong></div>
            </div>

    </div>

    <div class="w-20"></div>

</div>
<h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mt-8">Add Particulars </h1>
<div class="mt-6 grid lg:grid-cols-1 grid-cols-2 gap-3 hover:text-yellow-700 uk-link-reset">
 
        <form action="{{route('store.particular')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Particular Category
                </label>
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="particular" id="name" type="text" placeholder="Particular Category">
            </div>
            <div class="new-row"></div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    <button id="add_row" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                        Add  Attributes
                      </button>
                  </label>
               
            </div>
            <div class="flex items-center justify-between">
              <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                  Submit
                </button>
            </div>
        </form>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $("#add_row").on('click',function(){
            var output = "";
            output +="<div class='mb-4'>"
                   +"<label class='block text-gray-700 text-sm font-bold mb-2' for='name'>Title"
                   +"</label>"
                   +"<input class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' name='title[]' id='name' type='text' placeholder='Title'>"
                   +"</div>"
                   +"<div class='mb-4'>"
                   +"<label class='block text-gray-700 text-sm font-bold mb-2' for='name'>"
                   +"Value"
                   +"</label>"
                   +"<input class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' name='value[]' id='name' type='text' placeholder='Value'>"
                   +"</div>"
                   +"<div class='mb-4'>"
                   +"<label class='block text-gray-700 text-sm font-bold mb-2'>"
                   +"Upload Image"
                   +"<input type='file' name='image[]'>"
                   +"</label>"
                   +"</div>"
                   $(".new-row").append(output)
        });//end jquery function
    });

</script>
@endsection