<p>Ngân hàng Ecombanking thông báo !! </p>
<p>Bạn vừa thực hiên chuyển tiền thành công !!!</p>

<div>
	Số tài khoản chuyển : {{ $account->bank_number }}
</div>
<div>
	Số dư khả dụng : {{ number_format($transaction->balance) }} VND 
</div>
<hr>
<div>
	Số tài khoản nhận : {{ $transaction->bank_number}}
</div>

<div>
	Thời gian giao dịch : {{ $transaction->time }}
</div>

<div>
	Sồ tiền : {{ number_format($transaction->money) }} VND 
</div>

<hr>
<div>
	Số tiền còn lại : {{ number_format($account->balance) }} VND
</div>