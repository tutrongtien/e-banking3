<div style="font-size: 90%;">
	<div class="form-group">
		{!! Form::label('email', "Email") !!}
		<div class="form-controls">
			{!! Form::text('email', null, ['class' => 'form-control']) !!}
		</div>
		@if ($errors->has('email'))
	        <span class="text-warning">
	            <strong>{{ $errors->first('email') }}</strong>
	        </span>
	    @endif
	</div>

	<div class="form-group">
		{!! Form::label('password', 'Mật khẩu') !!}
		<div class="form-controls">
			{!! Form::password('password', ['class' => 'form-control']) !!}
		</div>
		@if ($errors->has('password'))
	        <span class="text-warning">
	            <strong>{{ $errors->first('password') }}</strong>
	        </span>
	    @endif
	</div>

	<div class="form-group">
		{!! Form::label('password_confirmation', 'Nhập lại mật khẩu') !!}
		<div class="form-controls">
			{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
		</div>
		@if ($errors->has('password_confirmation'))
	        <span class="text-warning">
	            <strong>{{ $errors->first('password_confirmation') }}</strong>
	        </span>
	    @endif
	</div>



	<div class="form-group">	
		<div class="form-controls">
			{!! Form::checkbox('is_admin', '1') !!}
			{!! Form::label('is_admin', 'Admin') !!}
			
		</div>
		
	</div>
</div>
{!! Form::submit('Go', ['class' => 'btn btn-primary'] ) !!}