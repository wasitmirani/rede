@extends('layouts.frontend.messengermaster')
@section('style')
<style>
    .toggle-checkbox:checked {
  @apply: right-0 border-green-400;
  right: 0;
  border-color: #68D391;
}
.toggle-checkbox:checked + .toggle-label {
  @apply: bg-green-400;
  background-color: #68D391;
}
</style>
@endsection
@section('content')

<div class="container m-auto tabs">
    {{-- <a href="{{ route('create.event') }}" uk-toggle="target: #offcanvas-create" class="bg-pink-500 hover:bg-pink-600 hover:text-white flex font-bold inline-block items-center px-4 py-2 rounded shadow text-white lg:block hidden"> <i class="-mb-1 mr-1 uil-plus"></i> Create Event</a>
    <a href="" uk-toggle="target: #offcanvas-create" class="bg-pink-500 hover:bg-pink-600 hover:text-white flex font-bold inline-block items-center px-4 py-2 rounded shadow text-white lg:block hidden"> <i class="-mb-1 mr-1 uil-plus"></i> Create Group</a> --}}
    <h1 class="text-2xl leading-none text-gray-900 tracking-tight mt-3"> Account Setting </h1>
    @if (Session::has('message'))
      <p  class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">{{ Session::get('message') }}</p>
    @endif
    <ul class="mt-5 -mr-3 flex-nowrap lg:overflow-hidden overflow-x-scroll uk-tab" id="tabs-nav">
        <li class=""><a href="#tab1">General</a></li>
        <li><a href="#tab2">Privacy</a></li>
        {{-- <li><a href="#tab3">Event</a></li>
        <li><a href="#tab4">Group</a></li> --}}
    </ul>
  <div class="grid lg:grid-cols-3 mt-12 gap-8 tab-content " id="tab1">
        <div class="bg-white rounded-md lg:shadow-lg shadow col-span-2">
            <div class="bg-red-900 text-center py-4 lg:px-4">
              <div class="p-2 bg-red-800 items-center text-red-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                <span class="flex rounded-full bg-red-500 uppercase px-2 py-1 text-xs font-bold mr-3"></span></span>
                <span class="font-semibold mr-2 text-left flex-auto">{{Session::get('message')}}</span>
                <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
              </div>
            </div>
    <form action="{{route('edit.profile')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-cols-2 gap-3 lg:p-6 p-4">

        <div>
            <label for=""> Name</label>
            <input type="text" placeholder="Your name.." class="shadow-none bg-gray-100" name="name" value="{{$user->name}}">
        </div>
        <div>
         <label for=""> Email</label>
         <input type="text" placeholder="Your Email.." class="shadow-none bg-gray-100" name="email" value="{{$user->email}}">
         </div>
         <div>
             <label for=""> Username</label>
             <input type="text" placeholder="Your Username" class="shadow-none bg-gray-100" name="username" value="{{$user->username}}">
         </div>

        <div>
            <label for=""> Pronouns </label>
            <select class="shadow-none bg-gray-100" name="pronouns">
                <option value=""><--/--></option>
                <option value="he/him" @if($user->profile->pronoun == "he/him") selected @endif >he/him</option>
                <option  value="she/her"  @if($user->profile->pronoun == "she/her") selected @endif>she/her</option>
                <option value="they/them"  @if($user->profile->pronoun == "they/them") selected @endif>they/them</option>
            </select>
          </div>
        <div>
            <label for=""> Covid Status</label>
           <select class="shadow-none bg-gray-100" name="covid_status">
               <option value=""><--/--></option>
               <option @if($user->profile->covid_status == "Vaccinated") selected @endif value="Male">Vaccinated</option>
               <option @if($user->profile->covid_status == "Not Vaccinated") selected @endif value="female">Not Vaccinated</option>
               <option @if($user->profile->covid_status == "Not Specified") selected @endif value="Not Specified">Not Specified</option>
           </select>
        </div>
        <div>
            <label for="">Gender</label>
            <select class="shadow-none bg-gray-100" name="gender">
                <option value=""><--/--></option>
                <option @if($user->profile->gender == "Male") selected @endif  ptionvalue="Male">Male</option>
                <option @if($user->profile->gender == "Female") selected @endif value="Female">Female</option>
                <option @if($user->profile->gender == "Binary") selected @endif value="Binary">Binary</option>
                <option @if($user->profile->gender == "None") selected @endif value="None">None</option>
                <option @if($user->profile->gender == "not specified") selected @endif value="not specified">none specified</option>
            </select>
        </div>
         <div>
          <label for="">zip_code</label>
          <input type="text" placeholder="Enter Zip Code" class="shadow-none bg-gray-100" name="zip" value="{{$user->profile->zip_code}}">
          </div>

         <div class="col-span-2">
             <label for="about">Upload Image</label>
             <input type="file" name="image" class="shadow-none bg-gray-100">
             @if($user->image != null)
             <input type="hidden" name="old_image"  value={{$user->image}}>
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
  <div class="grid lg:grid-cols-3 mt-12 gap-8 tab-content" id="tab2">
    <div class="bg-white rounded-md lg:shadow-lg shadow col-span-2">
        <form>
        <div class="grid grid-cols-2 gap-3 lg:p-6 p-4">
            <div>
                <label for=""> Privacy</label>
            </div>

        </div>
         <div class="grid grid-cols-2 gap-3 lg:p-6 p-4">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 gap-3 md:mb-0">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                Show Covid Status
              </label>

            </div>
            <div class="w-full md:w-1/2 px-3">
                <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                <input type="checkbox"  name="toggle" data-id="covid" id="toggle1" {{ $privacy->show_covid_status == 'true' ? 'checked' : '' }} class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer privacyBtn"/>
                <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                </div>

            </div>
        </div>
        </div>
        <div class="grid grid-cols-2 gap-3 lg:p-6 p-4">
         <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 gap-3 mb-6 md:mb-0">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                Show Age Range
              </label>

            </div>
            <div class="w-full md:w-1/2 px-3">
                <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                <input type="checkbox" name="toggle"  data-id="age" id="toggle2" {{ $privacy->show_age == 'true' ? 'checked' : '' }} class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer privacyBtn"/>
                <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                </div>

            </div>
        </div>
        </div>
        <div class="grid grid-cols-2 gap-3 lg:p-6 p-4">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6  md:mb-0">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                Show Pronouns
              </label>

            </div>
            <div class="w-full md:w-1/2 px-3">
                <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                <input type="checkbox" name="toggle" data-id="pronouns" id="toggle3" {{ $privacy->show_pronouns == 'true' ? 'checked' : '' }} class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer privacyBtn"/>
                <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                </div>

            </div>
        </div>
        </div>


        <div class="bg-gray-10 p-6 pt-0 flex justify-end space-x-3">


        </div>
    </form>
     </div>
  </div>
  <div class="grid lg:grid-cols-3 mt-12 gap-8 tab-content" id="tab3">
    <div class="bg-white rounded-md lg:shadow-lg shadow col-span-2">
     <form id="updateEvents">
        <div class="grid grid-cols-2 gap-3 lg:p-6 p-4">
            <div>
                <label for=""> Event Title</label>
                <input type="text" name="title" placeholder="Event Title" class="shadow-none bg-gray-100">
            </div>
            <div>
                <label for="">Event Date</label>
                <input type="date" name="date" class="shadow-none bg-gray-100">
            </div>
            <div class="col-span-2">
                 <label for="">Event Description</label>
                 <input type="text" name="description" placeholder="Event Description" class="shadow-none bg-gray-100">
            </div>
            <div class="col-span-2">
                 <label for="about">Interest</label>
                 <textarea id="about" name="interest" rows="3" class="shadow-none bg-gray-100" placeholder="Interest"></textarea>
            </div>
            <div class="col-span-2">
                 <label for=""> Image</label>
                 <input type="text" placeholder="" name="image" class="shadow-none bg-gray-100">
            </div>

        </div>

        <div class="bg-gray-10 p-6 pt-0 flex justify-end space-x-3">

            <button type="submit" class="button bg-blue-700"> Update </button>
        </div>
    </form>
     </div>
  </div>
  <div class="grid lg:grid-cols-3 mt-12 gap-8 tab-content" id="tab4">
    <div class="bg-white rounded-md lg:shadow-lg shadow col-span-2">

        <div class="grid grid-cols-2 gap-3 lg:p-6 p-4">
            <div>
                <label for=""> Group Title</label>
                <input type="text" placeholder="Your name.." class="shadow-none bg-gray-100">
            </div>
            <div>
                <label for=""> Group Interest</label>
                <input type="text" placeholder="Your name.." class="shadow-none bg-gray-100">
             </div>
             <div class="col-span-2">
                 <label for="">Group Description</label>
                 <input type="text" placeholder="Your name.." class="shadow-none bg-gray-100">
             </div>
             <div class="col-span-2">
                 <label for="about">Image</label>
                 <textarea id="about" name="about" rows="3" class="shadow-none bg-gray-100"></textarea>
             </div>


        </div>

        <div class="bg-gray-10 p-6 pt-0 flex justify-end space-x-3">
            <button class="p-2 px-4 rounded bg-gray-50 text-red-500"> Cancel </button>
            <button type="button" class="button bg-blue-700"> Save </button>
        </div>

     </div>
  </div>


</div>

@endsection
@section('scripts')
<script>



    $(document).ready(function(){
        $.ajaxSetup({
             headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".js-example-tokenizer").select2({
                tags: true,
               tokenSeparators: [',', ' ']

        })
        $('.select2-selection').css({"width": "604px","height":"1px"});
        $('#tabs-nav li:first-child').addClass('active');
         console.log($('#tabs-nav li:first-child'))
        $('.tab-content').hide();
        $('.tab-content:first').show();

// Click function
        $('#tabs-nav li').click(function(){
            $('#tabs-nav li').removeClass('active');
            $(this).addClass('active');
            $('.tab-content').hide();

              var activeTab = $(this).find('a').attr('href');
           $(activeTab).fadeIn();
              return false;
        });

        $("#updateInterest").on('click',function(){


            // var interest = $("#interests").val();
            var interests = $( "#interests" ).val() || [];
            $.ajax({
                url:'/edit/interest',
                type:"POST",
                data:{_token:"{{ csrf_token() }}",interests:interests},
                success:function(msg){
                    toastr.success(' '+msg)

                }
            });

        });

        $("#updateEvents").on('submit',function(e){
            e.preventDefault();
            var data = new FormData(this);
            $.ajax({
                url:'/edit/event',
                type:"POSt",
                data:data,
                success:function(msg){
                    console.log(msg);
                }
            });

        })

        $(".privacyBtn").on('change',function(){

            var covid_switch = {{$privacy->show_covid_status}}
            var age_switch = {{$privacy->show_age}};
            var pronouns_switch =  {{$privacy->show_pronouns}}
    
            if ($(this).is(':checked')) {
                if($(this).data("id") == "covid"){
                    covid_switch = $(this).is(':checked');
                }else if($(this).data("id") == "age"){
                    age_switch = $(this).is(':checked')
                }else if($(this).data("id") == "pronouns"){
                    pronouns_switch = $(this).is(':checked')
                }    
            }
            else {
                if($(this).data("id") == "covid"){
                    covid_switch = $(this).is(':checked');
                }else if($(this).data("id") == "age"){
                    age_switch = $(this).is(':checked')
                }else if($(this).data("id") == "pronouns"){
                    pronouns_switch = $(this).is(':checked')
                }
            }
            $.ajax({
                url:"/privacy",
                type:"post",
                data:{
                _token:"{{csrf_token()}}",
                covid_switch:covid_switch,
                age_switch: age_switch,
                pronouns_switch : pronouns_switch
                },
                success:function(res){
                 console.log(res)
                },
                error:function(error){
                  cosnole.log(error)
                }
        })    
        })

        //     $("#toggle2").on('change',function(){
        //     if ($(this).is(':checked')) {
        //         switchStatus = $(this).is(':checked');   
        //     }
        //     else {
        //         switchStatus = $(this).is(':checked');
        //     }

        //     $.ajax({
        //         url:"/privacy",
        //         type:"post",
        //         data:{
        //         _token:"{{csrf_token()}}",
        //         age_switch:switchStatus
        //         },
        //         success:function(res){
        //          console.log(res)
        //         },
        //         error:function(error){
        //           cosnole.log(error)
        //         }
        // })    
        // })

        //         $("#toggle3").on('change',function(){
        //     if ($(this).is(':checked')) {
        //         switchStatus = $(this).is(':checked');   
        //     }
        //     else {
        //         switchStatus = $(this).is(':checked');
        //     }

        //     $.ajax({
        //         url:"/privacy",
        //         type:"post",
        //         data:{
        //         _token:"{{csrf_token()}}",
        //         pronoun_switch:switchStatus
        //         },
        //         success:function(res){
        //          console.log(res)
        //         },
        //         error:function(error){
        //           cosnole.log(error)
        //         }
        // })    
        // })

    })


</script>

@endsection
