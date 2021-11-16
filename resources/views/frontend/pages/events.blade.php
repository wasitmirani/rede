@extends('layouts.frontend.messengermaster')
@section('content')
<h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mb-2">My Happening</h1>


<div class="my-6 grid lg:grid-cols-5 grid-cols-3 gap-2 hover:text-yellow-700 uk-link-reset">
  <a href="{{ route('create.event') }}">
      <div class="bg-gray-100 border-4 border-dashed flex flex-col h-full items-center justify-center relative rounded-2xl w-full" >
          <i class="text-4xl uil-plus-circle"></i> <span> Add new </span>
      </div>

  </a>
  @foreach($events as $event)
  <div>
  <a href="{{ route('event.detail',$event->id) }}"  id="gridDemo">
      <img src="{{ asset('/user/event/images/'.$event->image) }}" alt="" class="w-full lg:h-60 h-40 rounded-md object-cover">
      <div class="market-list">
        <div class="item-inner">
            <div class="item-price"> {{ \Carbon\Carbon::parse($event->start_date)->diffForHumans() }} </div>
            <div class="item-title">  {{ $event->title }} </div>
        </div>
    </div>
  </a>

</div>

  @endforeach
  {{-- <a href="#story-modal" uk-toggle="">
      <img src="assets/images/post/img2.jpg" alt="" class="w-full lg:h-60 h-40 rounded-md object-cover">
  </a>
  <a href="#story-modal" uk-toggle="">
      <img src="assets/images/post/img7.jpg" alt="" class="w-full lg:h-60 h-40 rounded-md object-cover uk-visible@s">
  </a> --}}
</div>
{{-- <div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modal">
  <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-900 opacity-75" />
    </div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
    <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <p id="message"></p>
        <form id="addHappening">
        <label>Happening Name</label>
        <input type="text" class="w-full bg-gray-100 p-2 mt-2 mb-3" id="name" />
        <label>Happening Type</label>
        <select id="type">
          <option><-----/---> </option>
          <option value="Party">Party,</option>
          <option value="Festival">Festival</option>
          <option value="Meeting">Meeting</option>
          <option value="Rally">Rally</option>
          <option value="Competition">Competition</option>
          <option value="Outdoor Adventure">Outdoor Adventur</option>
          <option value="Musical Performance">Musical Performance</option>
          <option value="Theatrical Performance">Theatrical Performance</option>
          <option value="Sports Event">Sports Event</option>
        </select>
        <label>Zip Code</label>
        <input type="text" class="w-full bg-gray-100 p-2 mt-2 mb-3" id="zip" />
        <label>Human Sponsor</label>
        <input type="text" class="w-full bg-gray-100 p-2 mt-2 mb-3" id="sponsor" />
        <label>Happening McGuffins</label>
     <select id="mcguffin">
         <option value=""><---/--></option>
         @foreach($interests as $interest)
         <option value="{{ $interest->interest }}">{{ $interest->interest }}</option>
         @endforeach
     </select>
        <label>Start Date</label>
        <input type="text" placeholder="Start Date" class="w-full bg-gray-100 p-2 mt-2 mb-3" id="start_date" />
        <label>End Date</label>
        <input type="text" placeholder="End Date" class="w-full bg-gray-100 p-2 mt-2 mb-3" id="end_date" />
        <label>Subscription</label>
        <div class="mt-2">
          <label class="inline-flex items-center">
            <input type="radio" class="form-radio" name="subscription" value="Free">
            <span class="ml-2">Free</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input type="radio" class="form-radio" name="subscription" value="Premium">
            <span class="ml-2">Premium</span>
          </label>
        </div>
        <label>Attendance</label>
        <div class="mt-2">
          <label class="inline-flex items-center">
            <input type="radio" class="form-radio" name="attendance" value="One Time">
            <span class="ml-2">One Time</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input type="radio" class="form-radio" name="attendance" value="Recurring">
            <span class="ml-2">Recurring</span>
          </label>
        </div>
        <label>Tagline</label>
        <input type="input" placeholder="short notice" name="tagline" id="tagline">


      </div>
      <div class="bg-gray-200 px-4 py-3 text-right">
        <button type="button" class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2" onclick="toggleModal()"><i class="fas fa-times"></i> Cancel</button>
        <button type="button" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2" id="addEvent"><i class="fas fa-plus" ></i> Create</button>
      </div>
    </form>
    </div>
  </div>
</div> --}}
@endsection
@section('scripts')
{{-- <script src="{{ asset('js/sortable.js') }}"></script>
<script src="{{ asset('js/st.js') }}"></script>
<script src="{{ asset('js/sort.js') }}"></script> --}}

 <script  type="application/javascript">

function toggleModal() {
  document.getElementById('modal').classList.toggle('hidden')
}

   $(document).ready(function(){
    // var gridDemo = document.getElementById('gridDemo'),
    // $("#gridDemo").
    // var gridDemo = $("#gridFemo");
    // new Sortable.create(gridDemo, { /* options */ });

// List with handle
// Sortable.create(listWithHandle, {
//   handle: '.glyphicon-move',
//   animation: 150
// });


    $("#addEvent").on('click',function(){
      var name = $("#name").val();
      var type = $("#type").val();
      var zip = $("#zip").val();
      var sponsor = $("#sponsor").val();
      var mcguffin = $("#mcguffin").val();
      var start_date = $("#start_date").val();
      var end_date = $("#end_date").val();
      var attendance = $('input[name="attendance"]:checked').val();
      var subscription = $('input[name="subscription"]:checked').val();
      var tagline = $("#tagline").val();
      $.ajax({
        type:"POST",
        url:"/store/event",
        data:{_token:"{{csrf_token()}}",
              title:name,
              type:type,
              zip:zip,
              sponsor:sponsor,
              mcguffin:mcguffin,
              start_date:start_date,
              end_date:end_date,
              attendance:attendance,
              tagline:tagline,
              sponsor:sponsor,

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
                        toastr.error(" "+item+" ")
                        // $('#message').fadeIn().append("<p class='alert alert-warning alert-dismissible fade show'>"+item+"<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button><p>");
                    });
                }

        }
      })


    })

   })

 </script>
@endsection
