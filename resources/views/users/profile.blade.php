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
		Thông Tin Cá Nhân
	</div>
	<div class="info-action">
	<table class="table table-hover table-striped">
	  <tr>
	    <th>Chứng minh nhân dân</th>
	    <th>{{ $info->identity_card }}</th>
	  </tr>
	  <tr>
	    <td>Ngày cấp</td>
	    <td>{{ $user->userInfo->date_of_identity_card }}</td>
	  </tr>
	  <tr>
	    <td>Sinh nhật</td>
	    <td>{{ $info->date_of_birth }}</td>
	  </tr>
	  <tr>
	    <td>Số điện thoại</td>
	    <td>{{ $info->phone }}</td>
	  </tr>
	  <tr>
	    <td>Địa chỉ</td>
	    <td>{{  $info->address }}</td>
	  </tr>
	  <tr>
	    <td>Tỉnh / Thành</td>
	    <td>{{ $info->city }}</td>
	  </tr>
	  <tr>
	    <td>Quận / Huyện</td>
	    <td>{{ $info->district }}</td>
	  </tr>
	  <tr>
	    <td>Phường / Xã</td>
	    <td>{{ $info->ward }}</td>
	  </tr>
	  <tr>
	    <td>Công việc</td>
	    <td>{{ $info->job }}</td>
	  </tr>
	  <tr>
	    <td>Email</td>
	    <td>{{ $user->email }}</td>
	  </tr>
	</table>
	<a href="{{ url('/edit/info/' . $info->id) }}" class="btn btn-info" title="">Sua Thong Tin</a>
	</div>
</div>
</div>
</div>
@stop