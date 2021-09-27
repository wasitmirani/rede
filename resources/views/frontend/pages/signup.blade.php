@extends('layouts.frontend.master')

@section('content')

<!-- Main Banner -->
<section class="banner" style="background:url(/assets/images/signup-banner.jpg); " data-aos="fade-up">
	<div class="container">
		<div class="row">
		</div>
	</div>
</section>
<!-- Main Banner -->
<!-- Signup -->
<section class="signup">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<h2 class="heading-one">Sign Up</h2>
				<p class="para-two">Signing up for RedE is simple, quick and free. We won’t ask you for credit card information, and we won’t hit you with in-app purchases or unexpected fees for premium services</p>
			 {{-- Form --}}

             @if(session('message'))
             <small class="alert alert-danger mt-4 mb-4" role="alert" style="padding: 0px;">
                 <strong>{{ session('message') }}</strong>
             </small>
             <br>
         @endif
             <form  action="{{ route('signup.user') }}" method="POST">
                @csrf
                <div class="form-group row">
                    {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
                    <div class="col-md-12">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input id="name" type="text" name="name" class="form-control input_user  @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" placeholder="Given Name*">

                        @error('name')
                            <span class="" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
               </div>
               <div class="form-group row">
                {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                <div class="col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input id="username" type="text" name="username" class="form-control input_pass @error('username') is-invalid @enderror"  required autocomplete="username" placeholder="Username*">
                    </div>
                    {{-- <input id="password" type="password" class="form-control float-center" placeholder="Your Password *" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"> --}}

                    @error('username')
                        <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                <div class="col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input id="email" type="email" name="email" class="form-control input_pass @error('email') is-invalid @enderror"  required autocomplete="email" placeholder="Email*">
                    </div>
                    {{-- <input id="password" type="password" class="form-control float-center" placeholder="Your Password *" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"> --}}

                    @error('email')
                        <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                <div class="col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-file-archive"></i></span>
                        </div>
                        <input id="password" type="password" name="password" class="form-control input_pass @error('password') is-invalid @enderror"  required autocomplete="password" placeholder="Password*">
                    </div>
                    {{-- <input id="password" type="password" class="form-control float-center" placeholder="Your Password *" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"> --}}

                    @error('password')
                        <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                <div class="col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-file-archive"></i></span>
                        </div>
                        <input id="zipcode" type="text" name="zipcode" class="form-control input_pass @error('zipcode') is-invalid @enderror"  required autocomplete="zipcode" placeholder="Zipcode*  should contain 5 digits">
                    </div>
                    {{-- <input id="password" type="password" class="form-control float-center" placeholder="Your Password *" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"> --}}

                    @error('zipcode')
                        <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                <div class="col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        {{-- <input id="" type="text" name="zipcode" class="form-control input_pass @error('zipcode') is-invalid @enderror"  required autocomplete="zipcode" placeholder="Zipcode*"> --}}
                        <select class="form-control input_pass @error('pronounce') is-invalid @enderror" name="pronouns">
                            <option value="null">Pronouns</option>
                            <option value="null">Pronouns</option>
                            <option value="null">Pronouns</option>
                        </select>
                    </div>
                    {{-- <input id="password" type="password" class="form-control float-center" placeholder="Your Password *" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"> --}}

                    @error('pronouns')
                        <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                <div class="col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-exchange-alt"></i></span>
                        </div>
                        {{-- <input id="" type="text" name="zipcode" class="form-control input_pass @error('zipcode') is-invalid @enderror"  required autocomplete="zipcode" placeholder="Zipcode*"> --}}
                        <select class="form-control input_pass @error('age') is-invalid @enderror" name="age">
                            <option value="">Age Range</option>
                            <option value="18-25">18-25</option>
                            <option value="26-30">26-30</option>
                            <option value="31-35">31-35</option>
                            <option value="36-40">36-40</option>
                        </select>
                    </div>
                    {{-- <input id="password" type="password" class="form-control float-center" placeholder="Your Password *" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"> --}}

                    @error('age')
                        <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

                <div class="form-group row">
                    {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                    <div class="col-md-12">
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-thermometer-half"></i></span>
                            </div>
                            <select class="form-control float-center" name="status">
                                <option value="">Covid Status</option>
                                <option value="Fully Vaccinated">Fully Vaccinated</option>
                                <option value="Vaccination Inprogress">Vaccination Inprogress</option>
                                <option value="Not Vaccinated">Not Vaccinated</option>
                            </select>
                       @error('status')
                           <span class="" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
                        </div>
                        {{-- <input id="password" type="password" class="form-control float-center" placeholder="Your Password *" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"> --}}

                    </div>
                </div>

               <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
            <button type="submit" class="btn btn-business ">Sign Up</button>
                </div>
            </div>
            </form>
             {{-- @component('frontend.components.signupForm')

             @endcomponent --}}
			</div>
			<div class="col-lg-6" data-aos="fade-left">
				<div class="img-box"><img src="/assets/images/signup-img.jpg" class="img-fluid" alt=""></div>
			</div>
		</div>
	</div>
</section>
<!-- Signup -->
@endsection
