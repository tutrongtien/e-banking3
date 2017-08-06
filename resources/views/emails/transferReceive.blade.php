<div>
	Số dư hiện tại : {{ $account_pre->balance }} VND
</div>

<div>
	Số tài khoản chuyển đến :	{{ $transaction->bank_number }}
</div>

<div>
	Thời gian giao dich: {{ $transaction->time }}
</div>

<div>
	Số tiền chuyển đến :	{{ $transaction->money }} VND
</div>

<div>
	Số tiền sau khi nhận : {{ $account->balance }} VND
</div>