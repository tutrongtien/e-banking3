@extends('layouts.admin')

@section('content')
<p style="color: #15a4d3; font-weight: bold; font-size: 120%;">Sửa thông tin tài khoản</p>
	{!! Form::model($user, ['url' => '/admin/update/' . $user->id, 'method' => 'put']) !!}
		@include('partials.forms.user')
	{!! Form::close() !!}
@stop