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
                <div class="d-flex justify-content-center">
					<div class="brand_logo_container">
				<h2 class="heading-one float-center">Login</h2>
                    </div>
                </div>
				<p class="para-two">Login for RedE is a three-step process that is simple, quick, and free. And we won’t ask for credit card information.</p>
                <br>
                @if(session('message'))
                <small class="alert alert-danger mt-4 mb-4" role="alert" style="padding: 0px;">
                    <strong>{{ session('message') }}</strong>
                </small>
                <br>
            @endif
                <form action="{{route('customer.user.login')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
                        <div class="col-md-12">
                        <div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input id="username" type="text" name="username" class="form-control input_user  @error('username') is-invalid @enderror"  value="{{ old('username') }}" required autocomplete="username" placeholder="Username*">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
                    </div>
                </div>

                        {{-- <div class="col-md-6">
                            <input id="email" type="email" class="form-control float-center" placeholder="Your Email *" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">


                    </div> --}}

                    <div class="form-group row">
                        {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                        <div class="col-md-12">
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input id="password" type="password" name="password" class="form-control input_pass @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="password*">
                            </div>
                            {{-- <input id="password" type="password" class="form-control float-center" placeholder="Your Password *" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"> --}}

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="brand_logo_container">
					<button type="submit" class="btn btn-business ">Login</button>
                        </div>
                    </div>
				</form>
			</div>
			<div class="col-lg-6" data-aos="fade-left">
				<div class="img-box"><img src="/assets/images/signup-img.jpg" class="img-fluid" alt=""></div>
			</div>
		</div>
	</div>
</section>
<!-- Signup -->

@endsection
