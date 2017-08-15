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
<div>Thông Tin Giao Dịch :</div>
<body>
	<div>
		<table>
		<thead>
			<tr>
				<th>STT</th>
				<th>Thời gian</th>
				<th>Địa điểm</th>
				<th>Chi tiết giao dịch</th>
				<th>Số tiền tăng</th>
				<th>Số tiền giảm</th>
			</tr>
		</thead>
		@foreach( $transactions as $transaction )
		<tbody>
			<tr>
				<td>{{ $count++ }}</td>
				<td>{{ $transaction->time }}</td>
				<td>{{ $transaction->place }}</td>
				<td>{{ $transaction->detail }}</td>
				@if($transaction->type == 0)
				<td>{{ number_format($transaction->money, 2) }}</td>
				@else
				<td></td>
				@endif
				@if($transaction->type == 1)
				<td>{{ number_format($transaction->money, 2) }}</td>
				@else
				<td></td>
				@endif
			</tr>
		</tbody>
		@endforeach
	</table>
	</div>
</body>
</html>