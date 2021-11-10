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
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" ></script> --}}

    <!-- Scripts -->

 <script src="{{asset('/assets/js/popper.min.js')}}"></script>
 {{-- <script src="{{asset('/assets/js/bootstrap.min.js')}}"></script> --}}
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{asset('/assets/js/fontawesome.js')}}"></script>
<script src="{{asset('/assets/js/fontawesome.min.js')}}"></script>
<script src="{{asset('/assets/js/custom.js')}}"></script>
<script src="{{asset('/assets/js/fancybox.js')}}"></script>
<script src="{{asset('/assets/js/bootstrap.bundle.min.js')}}"></script> --}}

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

$(document).ready(function(){

    let startYear = 1800;
    let endYear = new Date().getFullYear();

    for (i = endYear; i > startYear; i--)
    {
      $('#birth_year').append($('<option/>').val(i).html(i));
    }

    $("#birth_year").on('change',function(){
        var yob = $("#birth_year").val();

if(yob != ""){

var today = new Date();
    var birthDate = new Date(yob);

    var age = today.getFullYear() - birthDate.getFullYear();

    var m = today.getMonth() - birthDate.getMonth();

    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }

   if(age == '13' || age== '14' || age == '15' || age == '16' || age == '17'){
      $("#age-range").val('13-27')
      $("#age-msg").text(" ")

   }else if(age == '18' || age== '19' || age == '20' || age == '21' || age == '22'){

       $("#age-range").val('18-22')
       $("#age-msg").text(" ")


   }else if(age == '23' || age== '24' || age == '25' || age == '26' || age == '27' || age == '28' || age == '29')
    {

        $("#age-range").val('23-29')
        $("#age-msg").text(" ")


   }else if(age == '30' || age== '31' || age == '32' || age == '33' || age == '34'){

       $("#age-range").val('30-34')
       $("#age-msg").text(" ")

   }else if(age == '35' || age== '36' || age == '37' || age == '38' || age == '39'){

       $("#age-range").val('35-39')
       $("#age-msg").text(" ")


   }else if(age == '40' || age== '41' || age == '42' || age == '43' || age == '44'){

    $("#age-range").val('40-49')
    $("#age-msg").text(" ")

   }else if(age == '45' || age== '46' || age == '47' || age == '48' || age == '49'){

    $("#age-range").val('40-49')
    $("#age-msg").text(" ")

   }else if(age == '50' || age== '51' || age == '52' || age == '53' || age == '54'){

    $("#age-range").val('50-59')
    $("#age-msg").text(" ")

   }
   else if(age == '55' || age== '56' || age == '57' || age == '58' || age == '59'){

    $("#age-range").val('50-59')
    $("#age-msg").text(" ")

   }
   else if(age == '61' || age== '62' || age == '63' || age == '64' || age == '65'){

    $("#age-range").val('60-69')
    $("#age-msg").text(" ")

   } else if(age == '65' || age== '66' || age == '67' || age == '68' || age == '69'){

    $("#age-range").val('60-69')
    $("#age-msg").text(" ")

   }else{
       $("#age-range").val("You are too young!")
       $("#age-msg").text("You are too young!")
   }



}
    })
})


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

$("#password-field").focus(function(){
   var output = "";
   output +="<ul><li>must contain at least one lowercase letter</li><li>must contain at least one upercase letter</li><li>must contain aleast one digit</li><li>must contain atleast one symbol</li></ul>";
   $("#password-rule").html(output)
})


</script>
@livewireScripts
</body>
</html>
