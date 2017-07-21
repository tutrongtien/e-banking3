<!DOCTYPE html>
<html>
<head>
	<title>EBanking</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    @yield('script')
</head>
<body>
	<header id="header" class="container">
		<div class="col-md-4 logo">
			md4
		</div>
		<div class="col-md-8 banner">
			md8
		</div>
	</header><!-- /header --> <!-- class="container" style="height: 100px; border: 1px solid"> -->
		
	
	<div class="container">
		@yield('content')
	</div>

	<footer class="container">
		copyright@ Ecombanking 2017
	</footer>

</body>
</html>