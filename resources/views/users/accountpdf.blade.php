<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<style type="text/css" media="screen">
		table {
			border: 2px solid;
		}
	</style>
</head>
<body>
		<table>
		<caption>Tên Khách Hàng : {{ Auth::user()->userInfo->name }} </caption>
		<thead>
			<tr>
	  			<th>Số Tài Khoản</th>
	  			<th>Số Dư</th>
	  			<th>Loại Tiền Tệ</th>
	  			<th>Loại Thẻ</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $accounts as $account)
			<tr>			
				<td>{{ $account->bank_number }}</td>
			  	<td>{{ number_format($account->balance,3) }}</td>
			  	<td>{{ $account->currency }}</td>
			  	<td>{{ $account->type }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
	<table class="table table-hover table-bordered">
		<caption>Tên Khách Hàng : {{ Auth::user()->userInfo->name }} </caption>
		<thead>
			<tr class="info">
	  			<th>Số Tài Khoản</th>
	  			<th>Số Dư</th>
	  			<th>Loại Tiền Tệ</th>
	  			<th>Loại Thẻ</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $accounts as $account)
			<tr>			
				<td>{{ $account->bank_number }}</td>
			  	<td>{{ number_format($account->balance,3) }}</td>
			  	<td>{{ $account->currency }}</td>
			  	<td>{{ $account->type }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

