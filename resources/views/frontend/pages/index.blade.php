
@extends('layouts.frontend.master')


@section('content')
<!-- Main Banner -->
<section class="banner" style="background:url(assets/images/banner.jpg); ">
	<div class="container">
		<div class="row">
		</div>
	</div>
</section>
<!-- Main Banner -->
<!-- About -->
<section class="about ">
	<div class="container">
		<div class="row ">
			<div class="col-sm-12 col-md-7 col-lg-7 dis-flex">
				<h2 class="heading-two">Welcome to <strong>RedE</strong>.</h2>
				<p class="para-one">Use <strong class="color-black bold">RedE</strong> to find the hobbies and events that
				electrify you.</p>
				<p class="para-one">Then use <strong class="color-black bold">RedE</strong> to connect with member who
					share your enthusiasm.
				</p>
				<p class="para-one"> “sometimes” – thus “But be careful. Sometimes, when we play together, we can’t help but become ”<strong class="color-red">Friends</strong>.</p>
			</div>
			<div class="col-sm-12 col-md-5 col-lg-5 ">
				<div class="img-box">
					<img src="/assets/images/about-side-img.jpg" class="img-fluid" alt="">
				</div>
			</div>
		</div>
		<div class="row mt8">
			<div class="col-sm-12 col-md-12 col-lg-6 ">
				<video controls poster="/assets/images/video-img.jpg">
					<source src="/assets/images/dummy-video.mp4" type="video/mp4">
					<source src="movie.ogg" type="video/ogg">
					Your browser does not support the video tag.
				</video>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-6 dis-flex text-center">
				<p class="para-two text-left pl-4">Don't miss out an your chance for adventure
				and community. Get <strong class="color-black bold" >RedE</strong> Now.</p>
				<a href="{{route('signup')}}" class="btn btn-business">Try It Out!</a>
				<p class="para-three"><strong class="color-black bold">FREE</strong>-no credit card needed <br>
				no in-app purchases or other hidden charges</p>

			</div>
		</div>
	</div>
</section>
<!-- About -->
<!-- Portfolio -->
<section class="portfolio" style="background:url(assets/images/img-bg.jpg); ">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="img-box img1"><img src="/assets/images/img1.jpg" alt="">
					{{-- <div class="overlay"><a href="#">“Gaming With Friends.”</a></div> --}}
				</div>
				<div class="img-box img2"><img src="/assets/images/img2.jpg" alt="">
					{{-- <div class="overlay"><a href="#">“Gaming With Friends.”</a></div> --}}
				</div>
				<div class="img-box img2"><img src="/assets/images/img3.jpg" alt="">
					{{-- <div class="overlay"><a href="#">“Gaming With Friends.”</a></div> --}}
				</div>
			</div>
			<div class="col-lg-8">
				<div class="row">
					<div class="col-lg-6">
						<div class="img-box img2"><img src="/assets/images/img4.jpg" alt="">
							{{-- <div class="overlay"><a href="#">“Gaming With Friends.”</a></div> --}}
						</div>
					</div>
					<div class="col-lg-6">
		                <div class="img-box img2"><img src="/assets/images/img5.jpg" alt="">
		                	{{-- <div class="overlay"><a href="#">“Gaming With Friends.”</a></div> --}}
		                </div>
					</div>
					<div class="col-lg-12 ">
		                <div class="img-box img2"><img src="/assets/images/img6.jpg" alt="">
		                	{{-- <div class="overlay"><a href="#">“Gaming With Friends.”</a></div> --}}
		                </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="img-box img1"><img src="/assets/images/img7.jpg" alt="">
							{{-- <div class="overlay"><a href="#">“Gaming With Friends.”</a></div> --}}
						</div>
					</div>
					<div class="col-lg-6">
		                <div class="img-box img2"><img src="/assets/images/img8.jpg" alt="">
		                	{{-- <div class="overlay"><a href="#">“Gaming With Friends.”</a></div> --}}
		                </div>
		                <div class="img-box img3"><img src="/assets/images/img9.jpg" alt="">
		                	{{-- <div class="overlay"><a href="#">“Gaming With Friends.”</a></div> --}}
		                </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Portfolio -->
<!-- Testimonial -->
@include('layouts.frontend.components.testimonials')
<!-- Testimonial -->
<!-- Ready  -->
<section class="ready" style="background:url(assets/images/bg.jpg); ">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<a href="#" class="btn btn-business">Take our quiz to find out if you’re ready for  <strong class="color-red">RedE</strong>?  </a>
			</div>
		</div>
	</div>
</section>
<!-- Ready  -->
<!-- Learn More  -->
<section class="learn">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 dis-flex">
				<p class="para-two">Sometimes, all that we need to make a new friend is an excuse to get together. It’s something we like to call a <strong class="color-red">“McGuffin.” </strong></p>
				<p class="para-two">It’s something that film makers call a “McGuffin.” . </p>
				<p class="para-two">It doesn’t matter what we choose to do. All that matters is that we do it together. Because when we share our interests and pursue the same goals, we can’t help but build mutual respect and understanding. And those are the foundations of real friendship. </p>
			</div>
			<div class="col-lg-6 text-center">
				<div class="img-box"><img src="/assets/images/img-side.jpg" class="img-fluid" alt=""></div>
				<a href="{{ route('mcguffin.deatil') }}" class="btn btn-business" >Learn More About McGuffins</a>
			</div>
		</div>
	</div>
</section>
<!-- Learn More  -->
<!-- Try It Out   -->
<section class="try" style="background:url(assets/images/ready-bg.jpg)no-repeat; ">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<p class="para-two text-left">Don`t miss out an your chance for adventure
				and community. Get <strong class="color-red bold" >RedE</strong> Now.</p>
				<a href="{{route('signup')}}" class="btn btn-business">Try it out</a>
				<p class="para-three"><strong class="color-red bold">FREE</strong>-no credit card needed <br>
				no in-app purchases or other hidden charges</p>
			</div>
		</div>
	</div>
</section>

<!-- Try It Out   -->

@endsection
@section('scripts')
<script>

</script>
@endsection
