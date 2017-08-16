@extends('layouts.user')


@section('content')
<div class="info">
		Thông Tin Cá Nhân
</div>
<div class="f-info">
		<table class="table table-hover t-info">
		  <tr>
		    <td>Chứng minh nhân dân</td>
		    <td>{{ $info->identity_card }}</td>
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
</div>
@stop