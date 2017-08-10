@extends('layouts.master')

@section('content')
<div class="row">
	<div class="f-info">

		<div class="col-md-4">
			
			<div class="list-group">
			  <p class="list-group-item active ">Quản Lý Người Dùng</p>
			  <a href="{{ url('show') }}" class="list-group-item">Thông tin cá nhân</a>
			  <a href="{{ url('view/transactions') }}" class="list-group-item">Thông tin giao dịch</a>
			  <a href="{{ url('view/balance') }}" class="list-group-item">Thông tin tài khoan</a>
			  <a href="{{ url('password/change') }}" class="list-group-item">Đổi mật khẩu</a>
			</div>
			<div class="list-group">
			  <p class="list-group-item active">Giao Dịch</p>
			  <a href="#" class="list-group-item">Chuyển tiền trong hệ thống</a>
			  <a href="#" class="list-group-item">Chuyển tiền ngoài hệ thống</a>
			</div>
		</div>

		<div class="col-md-8 ">
			<div class="info">
				Đổi Mật Khẩu
			</div>
			<div class="info-action">
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
		</div>
	</div>
</div>
@stop()