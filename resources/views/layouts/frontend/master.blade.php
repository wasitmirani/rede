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

@livewireScripts
</body>
</html>
