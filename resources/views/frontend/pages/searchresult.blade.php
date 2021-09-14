@extends('layouts.frontend.messengermaster')
@section('content')

<p>Search  By Interest....</p>
<div class="relative mt-4 uk-slider" uk-slider="finite: true">

    <div class="uk-slider-container pb-3">
<h2>Individuals</h2>
        <ul id="tabs-nav" class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid" style="transform: translate3d(0px, 0px, 0px);">


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
<div class="my-3 grid lg:grid-cols-4 grid-cols-2 gap-3 hover:text-yellow-700 uk-link-reset">
    @if(isset($users))
    @foreach($users as $user)


    <div>
        <div class="bg-red-400 max-w-full lg:h-56 h-48 rounded-lg relative overflow-hidden shadow uk-transition-toggle">
            <a href="#story-modal" uk-toggle="">
                <img src="{{ asset('/user/images/'.$user->user->image) }}" class="w-full h-full absolute object-cover inset-0 scale-150 transform">
            </a>
            <div class="flex flex-1 items-center absolute bottom-0 w-full p-3 text-white custom-overly1 uk-transition-slide-bottom-medium">
                <a href="profile.html" class="lg:flex flex-1 items-center hidden">
                    <div> {{ $user->user->name }} </div>
                </a>
                <div class="flex space-x-2 flex-1 lg:flex-initial justify-around">
                    <a href="#"> <i class="uil-heart"></i> 150 </a>
                    <a href="#"> <i class="uil-heart"></i> 30 </a>
                </div>
            </div>

        </div>
    </div>

    @endforeach
    @endif
    @if(isset($groups))
      @foreach($groups as $group)
    <div>
        <div class="bg-yellow-400 max-w-full lg:h-56 h-48 rounded-lg relative overflow-hidden shadow uk-transition-toggle">
            <a href="#story-modal" uk-toggle="">
                <img src="{{ asset('/user/group/images/'.$group->image) }}" class="w-full h-full absolute object-cover inset-0 scale-150 transform">
            </a>
            <div class="flex flex-1 items-center absolute bottom-0 w-full p-3 text-white custom-overly1 uk-transition-slide-bottom-medium">
                <a href="#" class="lg:flex flex-1 items-center hidden">
                    <div> {{ $group->title }} </div>
                </a>
                <div class="flex space-x-2 flex-1 lg:flex-initial justify-around">
                    <a href="#"> <i class="uil-heart"></i> 150 </a>
                    <a href="#"> <i class="uil-heart"></i> 30 </a>
                </div>
            </div>

        </div>
    </div>
    @endforeach
@endif
@if(isset($data))
    @foreach($data as $dat)

    <div>
        <div class="bg-green-400 max-w-full lg:h-56 h-48 rounded-lg relative overflow-hidden shadow uk-transition-toggle">
            <a href="#story-modal" uk-toggle="">
                <img src="{{ asset('/user/images/'.$dat->user->image) }}" class="w-full h-full absolute object-cover inset-0">
            </a>
            <div class="flex flex-1 items-center absolute bottom-0 w-full p-3 text-white custom-overly1 uk-transition-slide-bottom-medium">
                <a href="#" class="lg:flex flex-1 items-center hidden">
                    <div> {{ $dat->user->name }} </div>
                </a>
                <div class="flex space-x-2 flex-1 lg:flex-initial justify-around">
                    <a href="#"> <i class="uil-heart"></i> 150 </a>
                    <a href="#"> <i class="uil-heart"></i> 30 </a>
                </div>
            </div>

        </div>
    </div>
    @endforeach
@endif


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
