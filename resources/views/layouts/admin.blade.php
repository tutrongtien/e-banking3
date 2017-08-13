@extends('layouts.main')



@section('user')
<div class="content_info">
    <div class="paddings">
        <div class="container">                      
               <div class="row user-area">
	<div class="col-md-4">                               
	    <div class="item-team">
	        <h4>{{ Auth::user()->userInfo->name }}</h4>
	        <span class="country">Admin</span>
	    </div>
	    <div class="panel panel-default">
	        <ul class="list-group">
	            <li class="list-group-item {{is_current_route('admin/index')}}"><a href="{{ url('admin/index') }}">Thông tin khách hàng</a>
	            </li>
	            <li class="list-group-item {{is_current_route('admin/create')}}"><a href="{{ url('admin/create') }}">Thêm tài khoản</a>
	            </li>
	        </ul>
	    </div>
	</div>

	<div class="col-md-8">
	    @yield('content')
	</div>
</div>

@stop