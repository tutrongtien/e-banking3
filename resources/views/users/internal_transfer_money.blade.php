@extends('layouts.master')

@section('script')
	<script type="text/javascript" src="{{ asset('js/transfer.js') }}"></script>
@stop

@section('content')
    <div id="test">
    	<form method="post" action="/transfer" id="form_transfer" class="well form-horizontal">
    		{{ csrf_field() }}
    		<fieldset>
    			<legend>Chuyển tiền đến một tài khoản trong Ngân Hàng</legend>

    			<div class="form-group">
                    <label class="col-md-4 control-label">Tài khoản chuyển</label>
                    <div class="col-md-4 inputGroupContainer">
                            <select name="account_id" class="form-control" id="account_id">
                            	@foreach($accounts as $account)
                            	<option value="{{ $account->bank_number }}">{{ $account->bank_number }} - {{ $account->user->userInfo->name}}</option>
                            	@endforeach
                            </select>
                    </div>
                </div>

                <!-- Số tiền trong tài khoản-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Số dư khả dụng (VND)</label>  
                    <div class="col-md-4 inputGroupContainer" id="balance">
                            <input  name="balance" class="form-control" type="number" readonly="" value="" id="balance">
                    </div>
                </div>

                <!-- Nhập số tài khoản chuyển-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Số tài khoản chuyển</label>  
                    <div class="col-md-4 inputGroupContainer">
                            <input  name="bank_number" class="form-control" type="number" id="bank_number">
                    </div>
                </div>

                <!-- Tên người nhận-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Tên người nhận</label>  
                    <div class="col-md-4 inputGroupContainer" id="name_to">
                            <input  name="name_to" class="form-control" type="text" readonly="">
                    </div>
                </div>

                <!-- Nhập số tiền chuyển-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Số tiền (VND)</label>  
                    <div class="col-md-4 inputGroupContainer">
                            <input  name="money" class="form-control" type="number" id="money">
                    </div>
                </div>

                <!-- Nội dung chuyển tiền-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Nội dung chuyển tiền</label>  
                    <div class="col-md-4 inputGroupContainer">
                            <textarea name="note" class="form-control" rows="5" id="note"></textarea>
                    </div>
                </div>
                <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                  <button type="button" class="btn btn-warning" id="submit">Gửi</button>                
                  <button type="reset" class="btn btn-warning">Hủy</button>                 
                </div>
            </div>
                
    		</fieldset>
    	</form>

    </div>
    
@stop