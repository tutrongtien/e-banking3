<div class="form-group">
	{!! Form::label('account', 'So tai Khoan') !!}
	 <div class="form-controls">
	{!! Form::select('account', '', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('from_date', 'Tu ngay') !!}
	 <div class="form-controls">
	{!! Rorm::date('from_date') !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('to_date', 'Den ngay') !!}
	 <div class="form-controls">
	{!! Rorm::date('to_date') !!}
	</div>
</div>