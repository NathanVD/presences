<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
    <title>{{ config('app.name', 'Knowledge') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <!-- Facebook and Twitter integration -->
      <meta property="og:title" content=""/>
      <meta property="og:image" content=""/>
      <meta property="og:url" content=""/>
      <meta property="og:site_name" content=""/>
      <meta property="og:description" content=""/>
      <meta name="twitter:title" content="" />
      <meta name="twitter:image" content="" />
      <meta name="twitter:url" content="" />
      <meta name="twitter:card" content="" />
    --}}

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">
    

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <!-- Flaticons  -->
    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">
    <!-- Theme style  -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

	</head>
	<body>

    <div id="app">
			<main>
					@yield('content')
			</main>
    </div>

  {{-- <script src="{{asset('js/app.js')}}"></script> --}}

  <script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('js/jquery.flexslider-min.js')}}"></script>
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/jquery.countTo.js')}}"></script>
	<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('js/magnific-popup-options.js')}}"></script>

  <script src="{{asset('js/main.js')}}"></script>
  
  @include('sweetalert::alert')
  
	</body>
</html>
