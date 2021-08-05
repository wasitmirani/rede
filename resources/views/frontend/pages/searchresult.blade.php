@extends('layouts.frontend.messengermaster')
@section('content')

<h1 class="text-2xl leading-none text-gray-900 tracking-tight mt-3"> Search Here.... </h1>
<div class="tabs">
<ul class="mt-5 -mr-3 flex-nowrap lg:overflow-hidden overflow-x-scroll uk-tab" id="tabs-nav">


    <li><a href="#tab1">People</a></li>
    <li><a href="#tab2">Groups</a></li>
    <li><a href="#tab3">Events</a></li>

</ul>
<div id="tabs-content">
    <div id="tab1" class="tab-content">

      <div class="">
        <div class="wrapper wrapper--w1070">
            <div class="card card-7">
                <div class="card-body">
                    <form class="form" action="{{ route('search.people') }}" method="post">
                        @csrf
                        <div class="input-group input--medium">
                            <label class="label">Interest</label>
                            <input type="text" name="interest" list="productName"/>
                            <datalist id="productName">
                                @foreach($interests as $interest)
                                <option value="{{ $interest->interest }}">{{ $interest->interest }}</option>
                                @endforeach


                            </datalist>
                        </div>
                        {{-- <div class="input-group input--medium">
                            <label class="label">Location</label>
                            <input type="text" name="location" list="productName"/>
                            <datalist id="productName">
                                <option value="Pen">Pen</option>
                                <option value="Pencil">Pencil</option>
                                <option value="Paper">Paper</option>
                            </datalist>
                        </div> --}}
                        <div class="input-group input--medium">
                            <label class="label">Age</label>
                            <input type="text" name="age" list="age"/>
                            <datalist id="age">
                                <option value="18-25">18-25</option>
                                <option value="26-30">26-30</option>
                                <option value="31-35">31-35</option>
                                <option value="36-40">36-40</option>

                            </datalist>
                        </div>
                        <div class="input-group input--medium">
                            <label class="label">Covide Status</label>
                            <input type="text" name="covid_status" list="covid_status"/>
                            <datalist id="covid_status">

                                <option value="Fully Vaccinated">Fully Vaccinated</option>
                                <option value="Vaccination Inprogress">Vaccination Inprogress</option>
                                <option value="Not Vaccinated">Not Vaccinated</option>
                            </datalist>

                        </div>
                        <input type="hidden" value="1" name="id">
                        <button type="submit" class="btn-submit" type="submit">search</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div id="tab2" class="tab-content">

      <div class="">
        <div class="wrapper wrapper--w1070">
            <div class="card card-7">
                <div class="card-body">
                    <form class="form" method="POST" action="#">
                        <div class="input-group input--large">
                            <label class="label">Interest</label>
                            <input type="text" name="product" list="productName"/>
                            <datalist id="productName">
                                <option value="Pen">Pen</option>
                                <option value="Pencil">Pencil</option>
                                <option value="Paper">Paper</option>
                            </datalist>

                        </div>
                        {{-- <div class="input-group input--medium">
                            <label class="label">Location</label>
                            <input class="input--style-1" type="text" name="checkin" placeholder="mm/dd/yyyy" id="input-start">
                        </div> --}}
                        {{-- <div class="input-group input--medium">
                            <label class="label">Age</label>
                            <input class="input--style-1" type="text" name="checkout" placeholder="mm/dd/yyyy" id="input-end">
                        </div> --}}
                        {{-- <div class="input-group input--medium">
                            <label class="label">Covide Status</label>
                            <div class="input-group-icon js-number-input">
                                <div class="icon-con">
                                    <span class="plus">+</span>
                                    <span class="minus">-</span>
                                </div>
                                <input class="input--style-1 quantity" type="text" name="guests" value="2 Guests">
                            </div>
                        </div> --}}
                        <button class="btn-submit" type="submit">search</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div id="tab3" class="tab-content">

      <div class="">
        <div class="wrapper wrapper--w1070">
            <div class="card card-7">
                <div class="card-body">
                    <form class="form" method="POST" action="#">
                        <div class="input-group input--large">
                            <label class="label">Interest</label>
                            <input class="input--style-1" type="text" placeholder="Destination, hotel name" name="going">
                        </div>
                        {{-- <div class="input-group input--medium">
                            <label class="label">Location</label>
                            <input class="input--style-1" type="text" name="checkin" placeholder="mm/dd/yyyy" id="input-start">
                        </div> --}}
                        {{-- <div class="input-group input--medium">
                            <label class="label">Age</label>
                            <input class="input--style-1" type="text" name="checkout" placeholder="mm/dd/yyyy" id="input-end">
                        </div> --}}
                        {{-- <div class="input-group input--medium">
                            <label class="label">Covide Status</label>
                            <div class="input-group-icon js-number-input">
                                <div class="icon-con">
                                    <span class="plus">+</span>
                                    <span class="minus">-</span>
                                </div>
                                <input class="input--style-1 quantity" type="text" name="guests" value="2 Guests">
                            </div>
                        </div> --}}
                        <button class="btn-submit" type="submit">search</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#tabs-nav li:first-child').addClass('active');
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
    })
</script>
@endsection
