<!DOCTYPE html>
<html lang="en">

<head>

	<title>Ablepro v8.0 bootstrap admin template by Phoenixcoded</title>
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
	
	<div class="row align-items-center text-center">
		<h1>Bienvenido a Tareas por hacer</h1>
	</div>
	<!-- Favicon icon -->
	<link rel="icon" href="{{ asset('images/favicon.ico')}}" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{ asset('css/style.css')}}">
	
	


</head>

<!-- [ auth-signin ] start -->

@yield('content')
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="{{ asset('js/vendor-all.min.js')}}"></script>
<script src="{{ asset('js/plugins/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/ripple.js')}}"></script>
{{-- <script src="{{ asset('js/pcoded.min.js')}}"></script> --}}



</body>

</html>
