
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body class="background">
  <div class="container-fluid">
    <div>
    <div id="login-pading" class="login-color">
        {!!Form::open(['url' => '/profile', 'class' => 'form-horizontal' ])
            !!}

      <div class="form-group">
        {!! Form::label('username', 'User Name', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-8">

        {!! Form::text('username', '' ,['class' => 'form-control', 'placeholder' => 'Username', 'required' => 'required']) !!}
        
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('password', 'Password', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
       {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required' ]) !!}
        </div>
      </div>

      <div class="form-group col-sm-10">

      <div class="g-recaptcha col-sm-offset-3 " data-sitekey="6Lc47SkUAAAAAOIKcRs8A6XOAu8qgyEKGNIWo9il"></div>
       
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">

          <div class="checkbox">
            <label>
              {!! Form::checkbox('checklogin', 'Remember me') !!} Remember me 
            </label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}        
        </div>
      </div>
    {!! Form::close() !!}   
    </div>
    <div class="login-center">
        <span class="login-color">New User?  <a href="" class="" title="">Registe here</a></span>
        <span class="login-color">Forgot Password?  <a href="" class="" title="">Click here</a></span>
    </div>
    
    
    </div>
</div>
</body>
</html>

