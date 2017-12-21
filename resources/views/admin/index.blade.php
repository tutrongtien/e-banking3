@extends('layouts.admin')

@section('content')

	<p style="color: #15a4d3; font-weight: bold;">Thông tin tài khoản khách hàng</p>
	<table class="table table-hover">
		<thead style="color: black; font-weight: bold;">
			<tr>
				<td>ID</td>
				<td>ID đăng nhập</td>
				<td>Tên chủ thẻ</td>
				<td>Trạng thái</td>
				<td>Email</td>
				<td>Khóa/Mở</td>
			</tr>
		</thead>
		
		<tbody>	
			@foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td><a href="{{ url('admin/show') . '/' .  $user->id }}">{{ $user->user_name }}</a></td>
				<td>{!! (isset($user->userInfo->name) ? $user->userInfo->name : '') !!}</td>
				<td>{!! ($user->status == 1) ? 'Đã kích hoạt' : 'Chưa kích hoạt' !!}</td>						
				<td>{{ $user->email }}</td>
				<td><a href="{{ url('admin/lock/') . '/' . $user->id }}"> {{ ($user->active == 1) ? 'khóa' : 'mở' }}</a></td>
			</tr>
			@endforeach
		</tbody>	
	</table>
	<div class="row text-center">
		{{ $users->links() }}
	</div>


@stop