<!DOCTYPE html>
<html>
<head>
	<title>EBanking</title>
	
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    @yield('script')
</head>
<body>
	<header id="header" class="container">
		<div class="col-md-3 logo">
			
			<div class="row">
				<a href="{{ url('/') }}" title="">ECOMBANKING</a>
			</div>
		</div>
		<div class="col-7">
			Banner
		</div>
		<div class="col-md-offset-7 col-md-2 banner">
		<div class="pull-right">
			@if (Auth::guest())
               	<a class = "pull-right" href="{{ url('register') }}">Register </a>
               	<a class = "pull-right" href="{{ url('login') }}"> Login |</a> 
			</div>              
            @else
            	<a class = "pull-right" href="{{ url('/logout') }}" title="">Logout</a>
            	<a class = "pull-right" href="{{ url('show') }}" title="">{{ $user->userInfo->name }}|</a> 
  
            @endif
             </div>
		</div>
	</header>
		
	
	<div class="container">
		
		@yield('content')	
		
	</div>

	<footer class="container-pluid fixed-bottom"">
		
		Copyright &copy; Ecombanking 2017	
	</footer>

</body>
</html>