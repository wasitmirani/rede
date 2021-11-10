@extends('layouts.frontend.messengermaster')
@section('content')
<h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mb-2"> Circles </h1>



<div class="lg:m-0 -mx-5 flex justify-between py-4 relative space-x-3 uk-sticky dark-tabs" uk-sticky="cls-active: bg-gray-100 bg-opacity-95" style="">

  <div class="flex overflow-x-scroll lg:overflow-hidden lg:pl-0 pl-5 space-x-3">
    {{-- <h5 class="text-2xl   leading-none text-gray-900 tracking-tight "> Sort By</h5> --}}
    {{-- <input type="text" name="product" list="productName"/> --}}
    {{-- <datalist id="productName">
        <option value="Pen">Art</option>
        <option value="Pencil">Books</option>
        <option value="Paper">Religion</option>
    </datalist> --}}
        {{-- <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Shop</a>
        <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> headphones  </a>
        <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Parfums </a>
        <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Fruits </a>
        <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Mobiles  </a>
        <a href="#" class="bg-white py-2 px-4 rounded inline-block font-bold shadow"> Laptops </a> --}}
    </div>
    <a href="#" type="button" uk-toggle="target: #offcanvas-create" class="bg-pink-500 hover:bg-pink-600 hover:text-white flex font-bold inline-block items-center px-4 py-2 rounded shadow text-white lg:block hidden" onclick="toggleModal()"> <i class="-mb-1 mr-1 uil-plus"></i>Add New</a>
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

<section>
    <div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modal">
        <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            
          <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-900 opacity-75" />

          </div>
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
          <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <p id="message"></p>
                <form>
              <label>Name</label>
              <input type="text" class="w-full bg-gray-100 p-2 mt-2 mb-3" id="name" />
              <label>Circle Type</label>
              <select class="w-full bg-gray-100 p-2 mt-2 mb-3" id="circle_type">
                  <option>Select Type</option>
                  <option>Family Unit</option>
                  <option>Friend Group</option>
                  <option>Cohort</option>
                  <option>Team</option>
                  <option>Band</option>
                  <option>Club</option>
                  <option> Business</option>
                  <option>Community Network</option>
                  <option>Alumni Association</option>
              </select>
              <label>Zip Code</label>
              <input type="text" class="w-full bg-gray-100 p-2 mt-2 mb-3" id="zip" />
              <label>Human Sponsor</label>
              <input type="text" class="w-full bg-gray-100 p-2 mt-2 mb-3" id="sponsor" />
              <label>Circle McGuffins</label>
              <input type="text" class="w-full bg-gray-100 p-2 mt-2 mb-3" id="mcguffin"/>
              <label>Membership</label>
              <div class="mt-2">
                <label class="inline-flex items-center">
                  <input type="radio" class="form-radio" name="membership" value="personal" >
                  <span class="ml-2">Open</span>
                </label>
                <label class="inline-flex items-center ml-6">
                  <input type="radio" class="form-radio" name="membership" value="busines">
                  <span class="ml-2">Limited Membership</span>
                </label>
              </div>
            
              <label>Subscription</label>
              <div class="mt-2">
                <label class="inline-flex items-center">
                  <input type="radio" class="form-radio" name="subscription" value="personal">
                  <span class="ml-2">Free</span>
                </label>
                <label class="inline-flex items-center ml-6">
                  <input type="radio" class="form-radio" name="subscription" value="busines">
                  <span class="ml-2">Premium</span>
                </label>
              </div>
              <label>Tagline</label>
              <textarea class="w-full bg-gray-100 " id="tagline"></textarea>
              <div class="bg-gray-200 px-4 py-3 text-right">
                <button type="button" class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2" onclick="toggleModal()"><i class="fas fa-times"></i> Cancel</button>
                <button type="button" id="addCircle" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2" ><i class="fas fa-plus"></i> Create</button>
              </div>
            </div>
           
        </form>
          </div>
        </div>
      </div>
</section>
@endsection
@section('scripts')
<script>
    function toggleModal() {
  document.getElementById('modal').classList.toggle('hidden')
}

$(document).ready(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $("#addCircle").on('click',function(){
        var name = $("#name").val();
        var zip = $("#zip").val();
        var circle_type = $("#circle_type").val();
        var sponsor = $("#sponsor").val();
        var mcguffin = $("#mcguffin").val();
        var  membership = $('input[name="membership"]:checked').val();
        var subscription = $('input[name="subscription"]:checked').val();
        var tagline = $("textarea#tagline").val();
    
      
        $.ajax({
            type:"POST",
            url:"/store/group",
            data:{
                _token: "{{ csrf_token() }}",
                 name : name,
                 zip : zip,
                 type : circle_type,
                 sponsor : sponsor,
                 mcguffin : mcguffin,
                 membership : membership,
                 subscription : subscription,
                 tagline : tagline
                
            },
            success:function(res){
                if(res == '200'){
                    reload.location()
                }else{
                    $("#message").val('Something Went Wrong')
                }
            },
            error:function(err){
                if (err.status == 422) {
                    var errors = err.responseJSON.errors
                    $('#message').empty()
                    jQuery.each(errors, (index, item) => {
                        $('#message').fadeIn().append("<p class='alert alert-warning alert-dismissible fade show'>"+item+"<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button><p>");
                    });
                }
                
            }
        })

    })
})

</script>
@endsection


