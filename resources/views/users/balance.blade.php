@extends('layouts.user')

@section('content')
<div class="info">
	Số Dư Tài Khoản
</div>

<div class="f-info">
	<div>
	   
	   <table  class="table table-hover table-bordered t-info">
	  	<caption>Thông tin tài khoản tính đến ngày : {!! date("Y-m-d h:i:sa") !!} <a href="{{ url('balance/pdf') }}" class="btn btn-info pull-right" title=""><span class="glyphicon glyphicon-download-alt
">PDF</span></a> </caption>
	  	<thead>
	  		<tr class="success">
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
			  	<td>{{ number_format($account->balance,2) }}</td>
			  	<td>{{ $account->currency }}</td>
			  	<td><a href="#" class="link-balance" id="{{ $account->id }}" >Chi tiet</a></td>
			 </tr>
	  		@endforeach
	  	</tbody>
	  </table>
	  {{ $accounts->links() }}
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
								output += "<tr class='info' >";
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
@stop