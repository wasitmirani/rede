@extends('layouts.frontend.master')

@section('content')

<!-- Signup -->
<section class="signup pass-sec">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-5 dis-flex" data-aos="fade-right">
				<div class="logo mb-5 text-center"><img src="/assets/images/logo.png" class="img-fluid" alt=""></div>
				<div class="img-box"><img src="/assets/images/pass-img.jpg" class="img-fluid" alt=""></div>
			</div>
			<div class="col-lg-7 pass-in dis-flex" data-aos="fade-left">
				<h2 class="heading-one">Enter your Password</h2>
				<form action="{{route('login')}}" method="POST">
                    @csrf
					<div class="form-group">
						<label>Password

                           </label>
						<div class="input-group" id="show_hide_password">
                            <input type="hidden" name="username" value="$2y$10$92IX">
							<input class="form-control" type="password" name="password">
							<div class="input-group-addon">
								<a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
							</div>
						</div>

                        @if(session('message'))

                        <small class="alert alert-danger mt-4 mb-4" role="alert" style="padding: 0px;">
                            <strong>{{ session('message') }}</strong>
                        </small>
                        @endif
					</div>
					<button type="submit" class="btn btn-business">Proceed</button>
				</form>
			</div>
		</div>
	</div>
</section>

@endsection
