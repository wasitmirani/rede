@extends('layouts.frontend.messengermaster')
@section('content')
<h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mb-2">Create Circle</h1>
<div>
    <div class="mt-5 md:mt-0 md:col-span-2">

        @if (Session::has('message'))
          <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">{{ Session::get('message') }}</div>
        @endif
      <form action="{{ route('store.group') }}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">

              <div class="col-span-12 sm:col-span-12">
                <label for="first-name" class="block text-sm font-medium text-gray-700">Circle Title</label>
                <input type="text" name="title" id="title" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                @if($errors->has('title'))
                  <div  class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">{{ $errors->first('title') }}</div>
                @endif
              </div>

              <div class="col-span-12 sm:col-span-12">
                <label for="last-name" class="block text-sm font-medium text-gray-700"> Type</label>
                  @if($errors->has('type'))
                      <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">{{ $errors->first('type') }}</div>
                  @endif
                <select title="type" name="type">
                    <option value=""><--/--></option>
                    <option value="Family Circle">Family Circle</option>
                    <option value="Business">Business</option>
                    <option value="Cohort">Cohort</option>
                    <option value="Friends Group">Friends Group</option>
                    <option value="Team">Team</option>
                    <option value="Band">Band</option>
                    <option value="Club">Club</option>
                    <option value="Community Network">Community Network</option>
                    <option value="Alumini Association">Alumini Association</option>
                </select>
              </div>
              <div class="col-span-12 sm:col-span-12">
                  @if($errors->has('mcguffin'))
                       <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">{{ $errors->first('mcguffin') }}</div>
                  @endif
                  <label for="street-address" class="block text-sm font-medium text-gray-700">Circle McGuffin</label>
                  <select name="mcguffin">
                      <option>--/--</option>
                      @foreach($interests as $interest)
                      <option value="{{ $interest->interest }}">{{ $interest->interest }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="col-span-12 sm:col-span-12">
                  @if($errors->has('zip'))
                       <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">{{ $errors->first('zip') }}</div>
                  @endif
                <label for="email-address" class="block text-sm font-medium text-gray-700">Zip Code</label>
                <input type="text" name="zip" id="zip" autocomplete="zip" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-12 sm:col-span-12">
                  @if($errors->has('sponsor'))
                       <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">{{ $errors->first('sponsor') }}</div>
                  @endif
                <label for="country" class="block text-sm font-medium text-gray-700">Human Sponsor</label>
                <input type="text" name="sponsor" id="sponsor" autocomplete="sponsor" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>


              <div class="col-span-12 sm:col-span-12">
                  @if($errors->has('start-date'))
                       <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">{{ $errors->first('start-date') }}</div>
                  @endif
                <label for="city" class="block text-sm font-medium text-gray-700">Start Date</label>
                <input type="date" name="startdate" id="start-date" autocomplete="start-date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-12 sm:col-span-12">
                  @if($errors->has('end-date'))
                      <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">{{ $errors->first('end-date') }}</div>
                 @endif
                <label for="region" class="block text-sm font-medium text-gray-700">End Date</label>
                <input type="date" name="enddate" id="end-date" autocomplete="start-date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-12 sm:col-span-12">
                  @if($errors->has('subscription'))
                      <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">{{ $errors->first('subscription') }}</div>
                 @endif
                  <label for="country" class="block text-sm font-medium text-gray-700">Subscription </label>
                  <label class="inline-flex items-center">
                      <input type="radio" class="form-radio" name="subscription" value="Free">
                      <span class="ml-2">Free</span>
                  </label>
                  <label class="inline-flex items-center ml-6">
                      <input type="radio" class="form-radio" name="subscription" value="Premium">
                      <span class="ml-2">Premium</span>
                  </label>
              </div>
              <div class="col-span-12 sm:col-span-12">
                  @if($errors->has('attendance'))
                      <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">{{ $errors->first('attendance') }}</div>
                  @endif
                  <label for="country" class="block text-sm font-medium text-gray-700">Memebership</label>
                      <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="membership" value="open">
                        <span class="ml-2">Open</span>
                      </label>
                      <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="membership" value="limited">
                        <span class="ml-2">Limited</span>
                      </label>
              </div>
              <div class="col-span-12 sm:col-span-12">
                  @if($errors->has('tagline'))
                      <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">{{ $errors->first('tagline') }}</div>
                  @endif
                  <label for="country" class="block text-sm font-medium text-gray-700">Tag Line</label>
                  <input type="text" name="tagline" id="tagline" autocomplete="tagline" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>
              <div class="col-span-12 sm:col-span-12">
                  @if($errors->has('image'))
                      <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">{{ $errors->first('image') }}</div>
                  @endif
                  <label class="block text-sm font-medium text-gray-700">
                   Upload Image
                  </label>
                  <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                      <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>
                      <div class="flex text-sm text-gray-600">
                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                          <span>Upload a file</span>
                          <input id="file-upload" name="image" type="file" class="sr-only">
                        </label>
                        <p class="pl-1">or drag and drop</p>
                      </div>
                      <p class="text-xs text-gray-500">
                        PNG, JPG, GIF up to 10MB
                      </p>
                    </div>
                  </div>
                </div>
            </div>
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Create Circle
            </button>
          </div>

        </div>
      </form>
    </div>

      {{-- <form id="eventForm">
          <div class="flex lg:flex-row flex-col lg:space-x-2">
              <input type="text" placeholder="McGuffin Title" name="title" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
              <input type="date" placeholder="McGuffin Date" name="date" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
          </div>
          <div class="flex lg:flex-row flex-col" >
              <input type="text" placeholder="McGuffin Interest" name="interest" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
              @if(isset($id))
              <input type="hidden" name="group_id" value="{{ $id }}">
              @endif
          </div>
          <div class="flex lg:flex-row flex-col" >
          <textarea placeholder="McGiffun Detail" name="description" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;"></textarea>
          </div>
          {{--<input type="text" placeholder="Confirm Password" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;"> --}}
          {{-- <div class="flex justify-start my-4 space-x-1">
              <div class="checkbox">
                  <input type="file" id="chekcbox1" name="image">
                  <label for="chekcbox1"><span class="checkbox-icon"></span> Upload An Image</label>
              </div>

          </div>
          <button type="submit" class="bg-gradient-to-br from-pink-500 py-3 rounded-md text-white text-xl to-red-400 w-full">Create</button>

      </form> --}}
  </div>


        {{-- <form id="groupForm">
            <div class="flex lg:flex-row flex-col lg:space-x-2">
                <input type="text" placeholder="Group Title" name="title" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
            </div>
            <input type="text" name="interest" placeholder="Group Interest" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
            <textarea placeholder="Group Detail" name="description" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;"></textarea>
            {{-- <input type="text" placeholder="Password" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
            <input type="text" placeholder="Confirm Password" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;"> --}}
            {{-- <div class="flex justify-start my-4 space-x-1">
                <div class="checkbox">
                    <input type="file" id="chekcbox1" name="image">
                    <label for="chekcbox1"><span class="checkbox-icon"></span> Circle Image</label>
                </div>
            </div>
            <button type="submit" class="bg-gradient-to-br from-pink-500 py-3 rounded-md text-white text-xl to-red-400 w-full">Create</button>

        </form> --}}
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
});
$(".select2-selection").css({"height": "2px"})
$('#groupForm').on('submit',function(e){

    e.preventDefault();
    var base_url = '{{ URL::to('/') }}';
    var data = new FormData(this);
    $.ajax({
        url:"/store/group",
        type:"POST",
        data:data,
        processData: false,
        contentType:false,
        success:function(msg){
             toastr.success(msg);
window.location.replace(base_url+'/groups')


        },
        error:function(err){
            if (err.status == 422) {
                        var errors = err.responseJSON.errors

                           jQuery.each(errors, (index, item) => {
                               toastr.error(" "+item)

                        //    $('#errorMessage').fadeIn().append("<p class='alert alert-warning alert-dismissible fade show'>"+item+"<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button><p>");

         });
                     }

        }
    })

})


     });
 </script>


@endsection
