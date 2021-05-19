@extends('layouts.frontend.master')

@section('content')
<!-- Main Banner -->
<section class="banner" style="background:url(/assets/images/congs-banner.jpg); ">
	<div class="container">
		<div class="row">
		</div>
	</div>
</section>
<!-- Main Banner -->
<!-- Signup -->
<section class="signup congs">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="img-box"><img src="/assets/images/logo-img.png" class="img-fluid mb-4" alt=""></div>
				<h2 class="heading-one color-red">Congratulations</h2>
				<p class="para-two">You’ve created an account. Welcome to RedE.<br>
				There are two ways to get started:</p>
				<ul class="list-unstyled">
					<li class="list-inline-item"><a href="{{route('timeline')}}" class="btn btn-business">Choose My Interests</a></li>
					<li class="list-inline-item"><a href="{{route('timeline')}}" class="btn btn-business">Start Browsing Now</a></li>
				</ul>
				<p class="para-two">To add an interest, either type in the search bar to see what pops up, or follow our interests map until you find what you’re looking for.  Add as many as you like. But don’t worry - you can always add or change interests later. When you’re ready to move on, click “continue.”</p>
				<div class="row">
					<div class="col-lg-6">
						<div class="box">
							<div class="head">
								<p>Search</p>
							</div>
							<div class="body">
								<form action="">
									<div class="input-group">
										<div class="form-outline">
											<input type="search" id="form1" class="form-control" />
										</div>
										<button type="button" class="btn btn-primary">
										<i class="fas fa-search"></i>
										</button>
									</div>
											<ul class="list-unstyled search">
												<li>karaoke <a href="#">Choose</a></li>
												<li>karaoke <a href="#">Choose</a></li>
												<li>karaoke <a href="#">Choose</a></li>
												<li>karaoke <a href="#">Choose</a></li>
												<li>karaoke <a href="#">Choose</a></li>
											</ul>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="box">
							<div class="head">
								<p>Follow our Interests Map</p>
							</div>
							<div class="body">
								<ul class="list-unstyled">
									<li>Arts & Entertainment</li>
									<li>Sports & Exercise</li>
									<li>Fun & Games</li>
									<li>Religion & Politics</li>
									<li>Learn Something New</li>
									<li>Volunteer Opportunities</li>
									<li>Just Hang Out</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-10">
						<a href="#" class="btn btn-business grad">Don’t see what you’re looking for?  <strong class="color-red">Suggest a new interest.</strong></a>

					</div>
					<div class="col-lg-2">
						<a href="{{route('timeline')}}" class="btn btn-business">Continue</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>


@endsection
