<!-- Meta -->
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="robots" content="noindex, nofollow">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
		<!-- <link rel="stylesheet" href="{{asset('/assets/css/all.min.css')}}"> -->
		<link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
		<link rel="stylesheet" href="{{asset('/assets/css/fancybox.css')}}">
		<link rel="stylesheet" href="{{asset('/assets/css/slick.min.css')}}">
		<link rel="stylesheet" href="{{asset('/assets/css/slick-theme.css')}}">

        <!-- Meta -->
        <title>{{config('app.name')}} </title>
        @livewireStyles
</head>
@yield('style')
<body>
<!-- Header -->

@if(Auth::check() && request()->route()->getName()!="welcome")
@include('layouts.frontend.components.header')
@endif
<!-- Header -->
<div id="app">
    @yield('content')
</div>



<!-- Contact Form -->
<!-- Contact Form -->
<!-- Footer -->

@if(Auth::check() && request()->route()->getName()!="welcome")

@include('layouts.frontend.components.footer')
@endif
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="top: 200px;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div id="message"></div>
            <form action="{{route('customer.user.login')}}" method="POST" id="loginForm">
                @csrf
                <div class="form-group row">
                    {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
                    <div class="col-md-12">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input id="username" type="text" name="username" class="form-control input_user  @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Username*">

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

                    </div>
                </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="#loginBtn" class="btn btn-secondary">Login</button>

        </div>
    </form>
      </div>
    </div>
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" ></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{asset('/assets/js/fontawesome.js')}}"></script>
<script src="{{asset('/assets/js/fontawesome.min.js')}}"></script>
<script src="{{asset('/assets/js/custom.js')}}"></script>
<script src="{{asset('/assets/js/fancybox.js')}}"></script>
<script src="{{asset('/assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('/assets/js/popper.min.js')}}"></script>
<script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/js/slick.min.js')}}"></script>
@yield('scripts')
<script>
        $(document).ready(function(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

        $("#loginForm").on('submit',function(e){
            var base_url = '{{ URL::to('/') }}';
            e.preventDefault();
            var data = new FormData(this);

            $.ajax({
                url:"/customer/login",
                type:"POST",
                data:data,
                processData: false,
                contentType: false,
                success:function(msg){
                    if(msg == '1'){
                        window.location.replace(base_url+'/my/profile')
                    }else{
                        var output = ""
                        output += "<p class='alert alert-danger'>Incorrect Credentials</p>"
                        $("#message").html(output)
                    }

                },
                error:function(err){


                }
            })







        })
    })
</script>
<script>
    $(".toggle-password").click(function() {

$(this).removeClass("fa fa-eye-slash");
$(this).addClass("fas fa-eye");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
    $(this).addClass("fa fa-eye-slash");
$(this).removeClass("fas fa-eye");

  input.attr("type", "password");
}
});
</script>
@livewireScripts
</body>
</html>
