<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<style type="text/css">
		*{
			font-family: "Times New Roman ", Times, cursive, sans-serif;
		}
	    table,th,td{
	        border:1px solid black;
	        border-collapse: collapse;
	        font-family: ;
	     }
	     th, td{
	       	padding: 10px;
		}
	</style>					
</head>
<body>
	<div>
	<h3>Thông tin khách hàng : {{ $info->name }}</h3>
	<table>
		<thead>
			<tr>
				<th>Số Tài Khoản</th>
				<th>Số dư</th>
				<th>Loại tiền tệ</th>
				<th>Tình trạng</th>
			</tr>
		</thead>
		@foreach( $accounts as $account )
		<tbody>
			<tr>
				<td>{{ $account->bank_number }}</td>
				<td>{{ $account->balance }}</td>
				<td>{{ $account->currency }}</td>
				@if( $user->status == 1 )
					<td>Kích hoạt</td>
				@else
					<td>Chưa kích hoạt</td>
				@endif	
			</tr>
		</tbody>
		@endforeach
	</table>
	</div>
</body>
</html>