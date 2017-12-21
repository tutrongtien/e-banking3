<p>Ngân hàng Ecombanking thông báo !! </p>
<p>Bạn vừa được chuyển khoản thông qua internet banking !!!!</p>

<div>
	Số dư hiện tại : {{ number_format($account_pre->balance) }} VND
</div>
<hr>
<div>
	Số tài khoản chuyển đến :	{{ $transaction->bank_number }}
</div>

<div>
	Thời gian giao dich: {{ $transaction->time }}
</div>

<div>
	Số tiền chuyển đến :	{{ number_format($transaction->money) }} VND
</div>
<hr>
<div>
	Số tiền sau khi nhận : {{ number_format($account->balance) }} VND
</div>