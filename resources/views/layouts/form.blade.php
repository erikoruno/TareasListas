<!DOCTYPE html>
<html lang="en">

<head>

	<title>{{ config('app.name')}} | @yield('title')</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	
	
	<!-- Favicon icon -->
	<link rel="icon" href="{{ asset('images/favicon.ico')}}" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{ asset('css/style.css')}}">
	
	<style>
        .header-text {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #e5f0f4;
            margin-bottom: 0px;
        }
       
       
    </style>


</head>

<!-- [ auth-signin ] start -->
<div class="header-text">@yield('title', 'Bienvenido a Tareas que harás!!!!')</div>
@yield('content')
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="{{ asset('js/vendor-all.min.js')}}"></script>
<script src="{{ asset('js/plugins/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/ripple.js')}}"></script>
{{-- <script src="{{ asset('js/pcoded.min.js')}}"></script> --}}



</body>
<footer>
	<div class="header-text">
		@ 2024 <a href="/">{{ config('app.name')}}</a>
	</div>
</footer>
</html>
