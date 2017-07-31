<div>
	Số tài khoản chuyển: {{ $account->bank_number }}
</div>
<div>
	Số dư khả dụng : {{ $transaction->balance}} VND 
</div>

<div>
	Số tài khoản nhận : {{ $transaction->bank_number}}
</div>

<div>
	Thời gian giao dich: {{ $transaction->time }}
</div>

<div>
	Sồ tiền : {{ $transaction->money}} VND 
</div>

<div>
	Phí chuyển : 3300 VND 
</div>

<div>
	Số tiền còn lại : {{ $account->balance }} VND
</div>