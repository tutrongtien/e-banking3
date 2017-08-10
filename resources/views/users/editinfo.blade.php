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
	<div class="col-md-8">

	<div class="info-action">

		{!! Form::model($info, ['url' => '/info/', 'method' => 'put', 'class' => 'form-horizontal']) !!}
		<div class="form-group  col-sm-8">
			{!! Form::label('identity_card', 'Số CMDD') !!}
			 <div class="form-controls">
			{!! Form::text('identity_card', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group col-sm-8">
			{!! Form::label('date_of_identity_card', 'Ngày Cấp') !!}
			 <div class="form-controls">
			{!! Form::date('date_of_identity_card', null, ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="form-group col-sm-8">
			{!! Form::label('date_of_birth', 'Ngày Sinh') !!}
			 <div class="form-controls">
			{!! Form::date('date_of_birth',null, ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="form-group col-sm-8">
			{!! Form::label('phone', 'Số Điện Thoại') !!}
			 <div class="form-controls">
			{!! Form::text('phone', null, ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="form-group col-sm-8">
			{!! Form::label('address', 'Địa Chỉ') !!}
			 <div class="form-controls">
			{!! Form::text('address', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group col-sm-8">
			{!! Form::label('city', 'Tỉnh / Thành') !!}
			 <div class="form-controls">
			{!! Form::text('city', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group col-sm-8">
			{!! Form::label('district', 'Quận /Huyện') !!}
			 <div class="form-controls">
			{!! Form::text('district', null, ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="form-group col-sm-8">
			{!! Form::label('ward', 'Phường / Xã') !!}
			 <div class="form-controls">
			{!! Form::text('ward', null, ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="form-group col-sm-8">
			{!! Form::label('job', 'Công Việc') !!}
			 <div class="form-controls">
			{!! Form::text('job', null, ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="form-group col-sm-8">
			{!! Form::submit('Lưu Thông Tin', ['class' => 'btn btn-info']) !!}
		</div>
		{!! Form::close() !!}
	</div>
	</div>
</div>
</div>
@stop