<!DOCTYPE html>
<html>
<head>
	<title>EBanking</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    @yield('script')
</head>
<body>
	<div class="container" style="height: 100px; border: 1px solid">
		<div class="col-md-4">
			md4
		</div>
		<div class="col-md-8">
			md8
		</div>
	</div>
	<div class="container">
		@yield('content')
	</div>

</body>
</html>