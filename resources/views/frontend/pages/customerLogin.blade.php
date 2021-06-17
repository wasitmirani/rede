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
				<h2 class="heading-one">Login</h2>
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
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

					<button type="submit" class="btn btn-business">Login</button>
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
