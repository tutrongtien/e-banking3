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
		So Du Tai Khoan
	</div>
	<div class="info-action">
	  <table class="table table-hover table-bordered">
	  	<caption>Thông tin tài khoản tính đến ngày : {!! date("Y-m-d h:i:sa") !!} </caption>
	  	<thead>
	  		<tr class="info">
	  			<th>STT</th>
	  			<th>Tên Chủ Thẻ</th>
	  			<th>Số Tài Khoản</th>
	  			<th>Số Dư</th>
	  			<th>Loại Tiền Tệ</th>
	  			<th>Chi Tiết</th>
	  		</tr>
	  	</thead>
	  	<tbody>
	  		@foreach ($accounts as $account)
		  	<tr>
			  	<td>{{ $count++ }}</td>
			  	<td>{{ Auth::user()->userInfo->name }}</td>
			  	<td>{{ $account->bank_number }}</td>
			  	<td>{{ number_format($account->balance,3) }}</td>
			  	<td>{{ $account->currency }}</td>
			  	<td><a href="#" class="link-balance" id="{{ $account->id }}" >Chi tiet</a></td>
			 </tr>
	  		@endforeach
	  	</tbody>
	  </table>
	  <div id="balance">

	  </div>
	  <script language="javascript" type="text/javascript">
	  		$(document).ready(function(){
	  			$(".link-balance").on('click', function(e){
	  				e.preventDefault();
	  				var id = $(this).attr("id");
	  				$.ajax({
	  					url:"{{url('/ajax/balance/')}}/" + id,
	  					type:"get",
	  					
	  					success:function(kq) {
							var output = "<table class ='table table-hover table-bordered'>";
							$.each(kq, function(key, item){
								output += "<tr>";
								output += "<td colspan='2'> Số tài khoản : " + item.bank_number + "</td>";
								output += "</tr>";
								output += "<tr>";
								output += "<td> Số Dư </td>";
								output += "<td>" + item.balance + "</td>";
								output += "</tr>";
								output += "<tr>";
								output += "<td> Loại Tiền </td>";
								output += "<td>" + item.currency + "</td>";
								output += "</tr>";
								output += "<tr>";
								output += "<td> Loại Thẻ </td>";
								output += "<td>" + item.type + "</td>";
								output += "</tr>";
							})
							output += "</table>";
							$("#balance").html(output);
	  					}
	  				})
	  			})
	  		});

	  </script>	


	</div>
</div>
</div>
@stop