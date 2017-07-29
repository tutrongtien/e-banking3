@extends('layouts.master')

@section('content')
	
	<div class="alert alert-info" role="alert">
		Đổi Mật Khẩu
	</div>

	@if (count($errors) > 0)
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
	@endif

	{!! Form::open(['url' => 'password/change', 'method' => 'put']) !!}
	<div class="form-group">
		{!! Form::label('password', 'Mật Khẩu Cũ') !!}
		{!! Form::password('password', ['placeholder' => 'Password', 'required' => 'required', 'class' => 'form-control' ]) !!}
	</div>
		
	<div class="form-group">
		{!! Form::label('password_new', 'Mật Khẩu Mới') !!}
		{!! Form::password('password_new', ['placeholder' => 'New Password', 'required' => 'required', 'class' => 'form-control']) !!}
	</div>
		
	<div class="form-group">
		{!! Form::label('password_confirm', 'Nhập Lại Mật Khẩu Mới') !!}
		{!! Form::password('password_confirm', ['placeholder' => 'Confirm New Password', 'required' => 'required', 'class' => 'form-control']) !!}
	</div>
	
		{!! Form::submit('Change Password',['class' => 'btn btn-warning']) !!}
		
	{!! Form::close() !!}	
	</div>
	
@stop()