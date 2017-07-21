@extends('layouts.master')

@section('content')
<div class="container-pluid">
    <div class="row background">
    <div id="login-pading" class="login-color">
        {!!Form::open(['url' => 'form/login', 'class' => 'form-horizontal' ])
            !!}

      <div class="form-group">
        {!! Form::label('username', 'User Name', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
        {!! Form::text('username', '' ,['class' => 'form-control']) !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('password', 'Password', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
       {!! Form::password('password',['class' => 'form-control ']) !!}
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
@endsection
