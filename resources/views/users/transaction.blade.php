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
	  <a href="{{ url('password/change') }}" class="list-group-item">Đổi mật khẩu</a>	</div>
	<div class="list-group">
	  <p class="list-group-item active">Giao Dịch</p>
	  <a href="#" class="list-group-item">Chuyển tiền trong hệ thống</a>
	  <a href="#" class="list-group-item">Chuyển tiền ngoài hệ thống</a>
	</div>

	</div>

	<div class="col-md-8 ">
	<div class="info">
		Thông tin giao dịch
	</div>
	<div class="info-action">

	<div class="form-group">
		{!! Form::open(['url' => '#', 'id' => 'transactions']) !!}
		<div class="form-group">
			{!! Form::label('account', 'Số Tài Khoản') !!}
			 <div class="form-controls">
			{!! Form::select('account', $accounts, null, ['class' => 'form-control ', 'placeholder' => 'Mời bạn chọn tài khoản']) !!}
			</div>
		</div>
		<div class="form-group col-sm-6">
			{!! Form::label('from_date', 'Từ ngày') !!}
			 <div class="form-controls">
			{!! Form::date('from_date', null, ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="form-group col-sm-6">
			{!! Form::label('to_date', 'Đến ngày') !!}
			 <div class="form-controls">
			{!! Form::date('to_date',null, ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::submit('Liệt Kê', ['class' => 'btn btn-info', 'id' => 'sublietke']) !!}
		</div>
		{!! Form::close() !!}
	</div>

	<div id="viewtransactions">
		
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#sublietke").on('click', function(e){
				e.preventDefault();

				fdate = $("#from_date").val();
				tdate = $("#to_date").val();
				account_id = $("#account").val();
				_token = $("#transactions").find("input[name='_token']").val();

				$.ajax({
					url:"{{url('transactions/detail')}}",
					type:"post",
					data:{ fdate : fdate, tdate : tdate, _token : _token, id : account_id },
					success:function(result) {

						$.each(result, function(key, item){
							output = "<table class='table table-hover table-bordered'>";
							output += "<tr class='info'><th>STT</th><th>Thời gian</th><th>Địa điểm</th><th>Chi tiết giao dịch</th><th>Số tiền tăng</th><th>Số tiền giảm</th></tr>";
							stt = 1;
							$.each(item, function(key2, transaction){
								output += "<tr> <td>" + stt++ + "</td>";
								output += "<td>" + transaction.time + "</td>";
								output += "<td>" + transaction.place + "</td>";
								output += "<td>" + transaction.detail + "</td>";
								output += "<td>" + "" + "</td>";
								output += "<td>" + transaction.money + "</td></tr>";
							})
							output += "</table>";
						})
						
						$("#viewtransactions").html(output);
					}
				})
			});
		});

	</script>
	</div>
	</div>
</div>
@stop