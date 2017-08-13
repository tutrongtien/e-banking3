@extends('layouts.admin')

@section('content')
<p style="color: #15a4d3; font-weight: bold; font-size: 120%;">Thêm mới tài khoản</p>
	{!! Form::open(['url' => 'admin/store' , 'method' => 'post']) !!}
		@include('partials.forms.user')
	{!! Form::close() !!}
@stop