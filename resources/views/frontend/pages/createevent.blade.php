@extends('layouts.frontend.messengermaster')
@section('content')
<h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mb-2">Create Events </h1>
<div>

        <form id="eventForm">
            <div class="flex lg:flex-row flex-col lg:space-x-2">
                <input type="text" placeholder="Event Title" name="title" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
                <input type="date" placeholder="Event Date" name="date" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
            </div>
            <div class="flex lg:flex-row flex-col" >
                <input type="text" placeholder="Event Interest" name="interest" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
                @if(isset($id))
                <input type="hidden" name="group_id" value="{{ $id }}">
                @endif
            </div>
            <div class="flex lg:flex-row flex-col" >
            <textarea placeholder="Event Detail" name="description" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;"></textarea>
            </div>
            {{--<input type="text" placeholder="Confirm Password" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;"> --}}
            <div class="flex justify-start my-4 space-x-1">
                <div class="checkbox">
                    <input type="file" id="chekcbox1" name="image">
                    <label for="chekcbox1"><span class="checkbox-icon"></span> Upload An Image</label>
                </div>

            </div>
            <button type="submit" class="bg-gradient-to-br from-pink-500 py-3 rounded-md text-white text-xl to-red-400 w-full">Create</button>

        </form>
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

$('#eventForm').on('submit',function(e){

    e.preventDefault();

    var data = new FormData(this);
    $.ajax({
        url:"/store/event",
        type:"POST",
        data:data,
        processData: false,
        contentType: false,
        success:function(msg){
            toastr.success("Event Created");

             window.location.replace(base_url+'/events');

        },
       error:function(err){
        if (err.status == 422) {
                        var errors = err.responseJSON.errors
                        $('#errorMessage').empty()
                           jQuery.each(errors, (index, item) => {
                               toastr.error(" "+item)

                        //    $('#errorMessage').fadeIn().append("<p class='alert alert-warning alert-dismissible fade show'>"+item+"<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button><p>");

         });
                     }

       }



});


});
});


</script>
@endsection
