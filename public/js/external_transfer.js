$(document).ready(function(){
	
	$('#account_id').change(function(){
		var account_id = $('#account_id').val();
		$.post('/api/get_balance', {id: account_id}, function(data, status){
			var html = '<label id="balance">' + data + ' VND</label>';
			$('#balance').html(html);
		})
	});

	$('#account_id').change();

	$('#submit').click(function(){
		var 
			account_id = $('#account_id').val();
			bank_name  = $('#bank_name').val();
			bank_number = $('#bank_number').val();
			money 	   = $('#money').val();
			note 	   = $('#note').val();
			balance	= $('#balance').text();
			name_input = $('#name_input').val();

		$.post('/api/get_transaction_info', {account_id: account_id, bank_name : bank_name, bank_number: bank_number, money: money, note: note}, function(data, status){
	        if (  data != 'null') {
	        	var html = '\
						<form class="well form-horizontal">\
							<fieldset>\
								<legend>Xác nhận chuyển tiền đến một tài khoản ngoài Ngân Hàng</legend>\
							</fieldset>\
							\
							<div class="form-group">\
			                    <label class="col-md-4">Số tài khoản </label>  \
			                    <div class="col-md-4">\
			                            <label id="balance">' + account_id + '</label>\
			                    </div>\
			                </div>\
			                \
			                <div class="form-group">\
			                    <label class="col-md-4">Số dư khả dụng </label>  \
			                    <div class="col-md-4">\
			                            <label id="balance">' + balance + '</label>\
			                    </div>\
			                </div>\
			                <hr>\
			                \
			                <div class="form-group">\
			                    <label class="col-md-4">Ngân hàng chuyển </label>  \
			                    <div class="col-md-4">\
			                            <label id="balance">' + bank_name + '</label>\
			                    </div>\
			                </div>\
			                \
			                <div class="form-group">\
			                    <label class="col-md-4">Số tài khoản nhận </label>  \
			                    <div class="col-md-4">\
			                            <label id="balance">' + bank_number + '</label>\
			                    </div>\
			                </div>\
			                \
			                <div class="form-group">\
			                    <label class="col-md-4">Tên người nhận </label>  \
			                    <div class="col-md-4">\
			                            <label id="balance">' + name_input + '</label>\
			                    </div>\
			                </div>\
			                <hr>\
			                <div class="form-group">\
			                    <label class="col-md-4">Số tiền</label>  \
			                    <div class="col-md-4">\
			                            <label id="balance">' + money + ' VND</label>\
			                    </div>\
			                </div>\
			                \
			                <div class="form-group">\
			                    <label class="col-md-4">Nội dung chuyển tiền</label>  \
			                    <div class="col-md-4">\
			                            <label id="balance">' + note + '</label>\
			                    </div>\
			                </div>\
			                \
			                <div class="form-group">\
			                    <label class="col-md-4">Phí chuyển tiền</label>  \
			                    <div class="col-md-4">\
			                            <label id="balance">11000 VND</label>\
			                    </div>\
			                </div>\
			                \
			                <div id="active_code">\
				                <div class="form-group">\
				                    <label class="col-md-4">Nhập mã xác nhận </label>\
				                    <div class="col-md-4">\
				                            <input name="code" type="text" id="code">\
				                            <span id="message" style="color: red;"></span>\
				                    </div>\
				                </div>\
				                \
				                <div class="form-group">\
				                    <label class="col-md-4"></label>\
				                    <div class="col-md-4">\
				                            <input type="button" id="submit_code" value="gửi" class="btn btn-warning">\
				                    </div>\
				                </div>\
			                </div>\
			            </form>\
        			';
	        } else {
	        	var html = '<div>\
	        				<span>giao dịch thất bại</span>\
	        				</div>';
	        }
			
      	    $('#test').html(html);

      	    //
      	    $('#submit_code').click(function(){
				var code = $('#code').val();
				$.post('/api/transaction', { code: code} , function(data, status){
					if ( data == 'success') {
						var html = '<p>Chuyển tiền thành công. Vui lòng kiểm tra email !!!</p>';
						$('#active_code').html(html);
					} else {
						var html = 'Mã xác nhận không đúng';
						$('#message').html(html);
					}					
						
				});

			});

		});		
		
	});




});