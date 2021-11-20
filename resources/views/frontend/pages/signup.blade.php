@extends('layouts.frontend.master')

@section('content')

<!-- Main Banner -->
{{-- <section class="banner" style="background:url(/assets/images/signup-banner.jpg); " data-aos="fade-up">
	<div class="container">
		<div class="row">
		</div>
	</div>
</section> --}}
<!-- Main Banner -->
<!-- Signup -->
@section('style')
<style>
.col-md-12 .input-group-addon {

}
</style>
@endsection
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
                <div class="col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input id="username" type="text" name="username" class="form-control input_pass @error('username') is-invalid @enderror" value="{{ old('username') }}" required autocomplete="username" placeholder="Username*">
                    </div>


                    @error('username')
                        <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input id="email" type="email" name="email" class="form-control input_pass @error('email') is-invalid @enderror"  required autocomplete="email" placeholder="Email*" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-file-archive"></i></span>
                        </div>
                        <input id="password-field" type="password" name="password" class="form-control input_pass @error('password') is-invalid @enderror"  required autocomplete="password" placeholder="Password should be of atleast 8 characters*">
                        <div class="input-group-addon">
                            <a><span class="toggle-password fa fa-eye-slash" toggle="#password-field" aria-hidden="true"></span></a>
                        </div>
                    </div>
                    <div id="password-rule"></div>
                    @error('password')
                        <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-file-archive"></i></span>
                        </div>
                        <input id="password" type="password" name="password_confirmation" class="form-control "  required autocomplete="password" placeholder="Confirm Password">
                        <div class="input-group-addon">
                            <a ><span class="toggle-password fa fa-eye-slash" toggle="#password" aria-hidden="true"></span></a>
                        </div>
                    </div>
            </div>

            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-file-archive"></i></span>
                        </div>
                        <select id="birth_year" name="year_of_birth" class="form-control" >
                            <option>Select Year Of Birth</option>
                        </select>

                        {{-- <input id="birth_year" type="text" name="year_of_birth" class="form-control"   placeholder=""> --}}
                    </div>
                    <p id="age-msg">

                    </p>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-exchange-alt"></i></span>
                        </div>
                        <input type="text" name="age" class="form-control" readonly id="age-range" placeholder="Age Range">

                        {{-- <select class="form-control input_pass @error('age') is-invalid @enderror" name="age">

                        </select> --}}
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
                <div class="col-md-6">
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-thermometer-half"></i></span>
                        </div>
                        <select class="form-control float-center" name="gender" id="gender-field">
                            <option>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Binary">Binary</option>
                            <option value="None">None</option>
                            <option value="none specified">none specified</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        {{-- <input id="" type="text" name="zipcode" class="form-control input_pass @error('zipcode') is-invalid @enderror"  required autocomplete="zipcode" placeholder="Zipcode*"> --}}
                        <select class="form-control input_pass @error('pronounce') is-invalid @enderror" name="pronouns">
                            <option>Pronoun</option>
                            <option value="he/him">he/him</option>
                            <option value="she/her">she/her</option>
                            <option value="they/them">they/them</option>
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

                <div class="col-md-6">
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
                <div class="col-md-6">
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-thermometer-half"></i></span>
                        </div>
                        <select class="form-control float-center" name="status">
                            <option value="">Covid Status</option>
                            <option value="Fully Vaccinated">Fully Vaccinated</option>
                            <option value="Vaccination Inprogress">Vaccination Inprogress</option>
                            <option value="Not Vaccinated">Not Vaccinated</option>
                            <option value="Not Specified">Not Specified</option>
                        </select>
                   @error('status')
                       <span class="" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                    </div>


                </div>
            </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="terms" value="Accepted" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                               Accept Terms & Privacy Policy
                            </label>
                          </div>
                          @error('terms')
                          <span class="" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
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

