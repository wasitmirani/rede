@extends('layouts.frontend.master')

@section('content')

<section class="signup pass-sec ">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-5 dis-flex" data-aos="fade-right">
				<div class="logo mb-5 text-center"><img src="{{asset('/assets/images/new-logo.png')}}" class="img-fluid w-75" alt=""></div>
				<div class="img-box text-center"><img src="{{asset('/assets/images/welcome-img.jpg')}}" class="img-fluid" alt=""></div>
			</div>
			<div class="col-lg-7 pass-in dis-flex" data-aos="fade-left">
				<h2 class="heading-one">Welcome to <strong class="color-red">RedE</strong></h2>
				<div class="content">
					<p class="para-three">We want to transform the online world into a tool for making connections in the real world.</p>
					<p class="para-three">We need your help.</p>
					<p class="para-three">If you’ve been given the confidential password, please log on, create a free account, and play around a little. Then give us your feedback.</p>
					<p class="para-three"><strong class="color-black">The site you’re going to visit is not live, however. It’s just a demo version that highlighs our current thinking.</strong> Before we make it final, we want to hear from you.</p>
					<p class="para-three">Please keep in mind that we’ve only given the password to a select group of friends and other social media experts. Thus, when you search for people and events, you may not find any that meet your criteria. Not yet at last. For now, you’ll have to use your imagination.</p>
					<p class="para-three">There’s a link labeled <strong class="color-black">“Provide Feedback”</strong> on the bottom right corner of every page. You can use that link to share your impressions and insights, to take a brief survey, or to email us directly.</p>
					<p class="para-three">Thank you. Your ideas, even if they may seem trivial to you, are important to us. So don’t hold back. Tell us everything you think or feel. Above all, we want to get this right.</p>
					<p class="para-three">And have fun ... because we know you’re ready!</p>
					<a href="{{route('index')}}" class="btn btn-business ">PROCEED TO WEBSITE</a>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
