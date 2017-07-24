@extends('layouts.master')

@section('content')
<div class="row">
<div class="f-info">

	<div class="col-md-4">
		
	<div class="list-group">
	  <p class="list-group-item active ">Quản Lý Người Dùng</p>

	  <a href="#" class="list-group-item">Thông tin cá nhân</a>
	  <a href="#" class="list-group-item">Thông tin giao dịch</a>
	  <a href="#" class="list-group-item">Đổi mật khẩu</a>
	</div>
	<div class="list-group">
	  <p class="list-group-item active">Giao Dịch</p>
	  <a href="#" class="list-group-item">Chuyển tiền trong hệ thống</a>
	  <a href="#" class="list-group-item">Chuyển tiền ngoài hệ thống</a>
	</div>

	</div>

	<div class="col-md-7 ">
	<div class="info">
		Thông Tin Cá Nhân
	</div>
	<div class="info-action">
	  <div class="alert alert-info" role="alert">
	  	Tên khách hàng : {{ $info->name }}
	  </div>
	  <div class="alert alert-info" role="alert">
	  	Chứng minh nhân dân : {{ $info->identity_card }}
	  </div>
	  <div class="alert alert-info" role="alert">
	  	 Ngày cấp : {{ $info->date_of_identity_card }}
	  </div>
	  <div class="alert alert-info" role="alert">
	  	Sinh nhật : {{ $info->date_of_birth }}
	  </div>
	  <div class="alert alert-info" role="alert">
	  	Số điện thoại : {{ $info->phone }}
	  </div>
	  <div class="alert alert-info" role="alert">
	  	Địa chỉ : {{ $info->address }}
	  </div>
	  <div class="alert alert-info" role="alert">
	  	Thành phố : {{ $info->city }}
	  </div>
	  <div class="alert alert-info" role="alert">
	  	Quận / Huyện : {{ $info->district }}
	  </div>
	  <div class="alert alert-info" role="alert">
	  	Phường / Xã : {{ $info->ward }}
	  </div>
	  <div class="alert alert-info" role="alert">
	  	Công việc: {{ $info->job }}
	  </div>
	  <div class="alert alert-info" role="alert">
	  	Email: {{ $user->email }}
	  </div>  
	  <a class="btn btn-default btn-lg btn-block" href="{{ url('/edit/info') }}" title="">Sửa Thông Tin</a>
	 </div>

	</div>
</div>
</div>
@stop