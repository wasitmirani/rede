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
				<h2 class="heading-one">Signup</h2>
				<p class="para-two">Signing up for RedE is a three-step process that is simple, quick, and free. And we won’t ask for credit card information.</p>
			 {{-- Form --}}

             <signup-component></signup-component>
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
