
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <link rel="shortcut icon" href="{{ asset('img/icons/favicon.ico') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body class="background">
  <div class="container-fluid">
    <div>
      <div id="login-pading" class="login-color col-md-offset-6">
      <div> <h3>Đăng nhập hệ thống Ebanking</h3> </div>
      <hr>

          {!!Form::open(['url' => '/profile'])!!}

        <div class="form-group">
          {!! Form::label('username', 'Tên Đăng Nhập', ['class' => 'control-label']) !!}
          <div>
          {!! Form::text('username', '' ,['class' => 'form-control', 'placeholder' => 'Username', 'required' => 'required']) !!}
          </div>
        </div>

        <div class="form-group">
          {!! Form::label('password', 'Mật Khẩu', ['class' => 'control-label']) !!}
          <div>
         {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required' ]) !!}
          </div>
        </div>

        <div class="form-group">
          <div class="g-recaptcha" data-sitekey="6Lc47SkUAAAAAOIKcRs8A6XOAu8qgyEKGNIWo9il"></div>
        </div>
        
     
        <div class="form-group">
          <div>
          {!! Form::submit('Login', ['class' => 'btn btn-success']) !!}
          <span><a href="" class="" title="">Registe here</a> |</span>
          <span><a href="" class="" title="">Forgot Password</a></span>        
          </div>
        </div>
          {!! Form::close() !!} 
      </div>
    </div>
</div>
</body>
</html>

