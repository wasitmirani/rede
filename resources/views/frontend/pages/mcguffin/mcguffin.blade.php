@extends('layouts.frontend.master')
@section('style')
<style>
    .mc-guffin-1 {
    justify-content: center;
    flex-direction: column;
    display: flex;
}

.mc-guffin-section h2 {
    font-size: 50px;
    font-weight: 700;
    line-height: 83px;
    color: #000;
}

.mc-guffin-section p {
    font-size: 16px;
    font-weight: 300;
    line-height: 30px;
    color: #231F20;
}

.mc-guffin-section a.read-btn {
    font-size: 18px;
    font-weight: 500;
    text-transform: capitalize;
    background-color: #c04438;
    color: #fff;
    padding: 10px 20px;
    border-radius: 40px;
    box-shadow: -2px 5px 15px 0px rgb(243 149 140);
    transition: all .4s ease;
    bottom: 0;
    position: relative;
    margin-top: 20px;
    width: 15%;
    text-align: center;
}

.mc-guffin-section a.read-btn:hover {
    text-decoration: none;
    bottom: -10px;
    position: relative;
    background-color: #fff;
    color: #c04438;
    box-shadow: -2px 10px 15px 0px rgb(240 210 207);
}

.mc-guffin-section {
    padding-top: 50px;
    padding-bottom: 30px;
}
.mc-section-2 .mc-vid-sec {
    position: relative;
    margin-top: -100px;
}

.mc-section-2 video.vid-02 {
    width: 100%;
    border-radius: 10px;
}

.mc-section-2 video.vid-01 {
    width: 85%;
}

.mc-section-2 h2 {
    font-size: 50px;
    font-weight: 700;
    line-height: 83px;
    color: #000;
    padding-bottom: 10px !important;
}

.mc-section-2 {
    padding: 30px 0 130px 0 !important;
    position: relative;
}

.mc-section-2:before {
    position: absolute;
    content: "";
    background: linear-gradient(3deg, #f1d6d3, #fcf5d7);
    height: 60%;
    width: 100%;
    bottom: 0;
}
.mc-section-3 {
    padding: 80px 0;
}

.mc-section-3 h2 {
    font-size: 50px;
    font-weight: 700;
    line-height: 83px;
    color: #000;
    padding-bottom: 20px !important;
}

.mc-section-3 .mc-img-1 img {
    height: 630px !important;
    width: 100%;
}

.mc-section-3 .mc-img-2 img {
    width: 100%;
    height: 300px !important;
    margin-bottom: 30px;
}

.mc-section-3 .mc-img-3 img {
    width: 100%;
    height: 300px;
}
/*McGuffin-page*/

/* mcguffin-page-responsive */
@media only screen and (max-width: 1620px){
    .mc-guffin-section a.read-btn {
    width: 20%;
}
}
</style>
@endsection
@section('content')
<section class="banner" style="background:url(/assets/images/mcbanner.jpg); " data-aos="fade-down">
	<div class="container">
		<div class="row">
		</div>
	</div>
</section>
<!-- Main Banner -->
<!-- Section-2 -->
<section class="mc-guffin-section">
	<div class="container-fluid p-lg-5">
		<div class="row">
			<div class="col-lg-7 mc-guffin-1">
				<h2>What’s a “McGuffin?”</h2>
				<p>According to legendary film director Alfred Hitchcock, it’s “the thing the spies are after” but that fades in importance as time goes on. In other words, it’s an excuse for the characters in a movie to interact.</p>

                <p>It doesn’t matter whether Indiana Jones is chasing an ark, a grail, or something else. The point is that the ark gives him and his friends an excuse to run about the jungle having a grand old time.</p>

                <p>The nature and identity of the McGuffin itself doesn’t matter at all. It could have been a Maltese Falcon that Indy was searching for, or a briefcase, or an Iron Throne, or the Infinity Stones, or a sled called Rosebud. What matters is only that there is a McGuffin and that it’s driving the characters together.</p>

                <p>So what do McGuffins have to do with friendship? We believe that the only thing people need in order to connect is an excuse to interact: let’s play tennis together. Or pickleball. Or soccer. Or a board game. Let’s go watch a Jazz band. Or a horror movie. Or the ballet. Let’s learn how to knit. Or to kayak. Or to restore an old arcade game. What it is that you do doesn’t matter. What matters is that you do it together.
               </p>
               <a href="#" class="read-btn">Read More</a>
			</div>
			<div class="col-lg-5 text-center">
				<img src="{{ asset('/assets/images/mc-sec-2.png') }}" alt="">
			</div>
		</div>
	</div>
</section>
<!-- Section-2 -->
<!-- Section-3 -->
<section class="mc-section-2">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2>McGuffin Videos<h2>
				<video controls="" poster="{{ asset('/assets/images/mc-vid-1.png') }}" class="vid-01">
					<source src="{{ asset('/assets/images/dummy-video.mp4') }}" type="video/mp4">
					<source src="movie.ogg" type="video/ogg">
					Your browser does not support the video tag.
				</video>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="mc-vid-sec">
		    <div class="row">
				<div class="col-lg-6 col-vid">
				<video controls="" poster="{{ asset('/assets/images/mc-vid-2.png') }}" class="vid-02">
					<source src="{{ asset('/assets/images/dummy-video.mp4') }}" type="video/mp4">
					<source src="{{ asset('assets/images/movie.ogg') }}" type="video/ogg">
					Your browser does not support the video tag.
				</video>
			</div>
			<div class="col-lg-6 col-vid">
				<video controls="" poster="{{ asset('/assets/images/mc-vid-3.png') }}" class="vid-02">
					<source src="{{ asset('/assets/images/dummy-video.mp4') }}" type="video/mp4">
					<source src="{{ asset('assets/images/movie.ogg') }}" type="video/ogg">
					Your browser does not support the video tag.
				</video>
			</div>
			</div>
		</div>
	</div>
</section>
<!-- Section-3 -->
<!-- Section-4 -->
<section class="mc-section-3 text-center">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>McGuffin Gallery</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="mc-img-1">
				<img src="{{ asset('/assets/images/mc-gel-1.png') }}" alt="">
				</div>
			</div>
			<div class="col-lg-8">
				<div class="row">
					<div class="col-lg-6">
						<div class="mc-img-2">
				            <img src="{{ asset('/assets/images/mc-gel-2.png') }}" alt="">
				        </div>
					</div>
					<div class="col-lg-6">
						<div class="mc-img-2">
				            <img src="{{ asset('/assets/images/mc-gel-3.png') }}" alt="">
				        </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="mc-img-3">
				            <img src="{{ asset('/assets/images/mc-gel-4.png') }}" alt="">
				        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Section-4 -->
@endsection
