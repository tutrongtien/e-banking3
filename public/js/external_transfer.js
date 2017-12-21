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
		$('.loader').show();
		var 
			account_id = $('#account_id').val();
			bank_name  = $('#bank_name').val();
			bank_number = $('#bank_number').val();
			money 	   = $('#money').val().replace(/,/g, "");
			money_input = $('#money').val();
			note 	   = $('#note').val();
			balance	= $('#balance').text();
			name_input = $('#name_input').val();

		$.post('/api/get_transaction_info', {account_id: account_id, bank_name : bank_name, bank_number: bank_number, money: money, note: note}, function(data, status){
	        $('#footer_id').remove();
	        if (  data != 'null') {
	        	var html = '\
			                <tr>\
		                        <td>Phí chuyển tiền</td>\
		                        <td>11,000 VND</td>\
                     		 </tr>\
			                <tr id="active_code">\
		                        <td>Nhập mã xác nhận</td>\
		                        <td><input name="code" type="text" id="code">\
		                        	<span id="message" style="color: red;"></span>\
		                        </td>\
                     		 </tr>\
                     		 <tr id="footer_id_2">\
		                        <td></td>\
		                        <td><input type="button" id="submit_code" value="Gửi" class="btn btn-warning">\
		                        </td>\
                     		 </tr>\
        			';
        		$('#acc_id').html('<label id="account_id">' + account_id + '</label>');
    			$('#acc_balance').html('<label id="balance">' + balance + '</label>');
    			$('#acc_bank_number').html('<label id="bank_number">' + bank_number + '</label>');
    			$('#acc_name').html('<label id="name">' + name + ' VND</label>');
    			$('#acc_money').html('<label id="money">' + money_input + ' VND</label>');
    			$('#acc_note').html('<label id="note">' + note + '</label>');
    			$('#acc_bank_name').html('<label id="bank_name">' + bank_name + '</label>');
    			$('#acc_name_to').html('<label id="name_input">' + name_input + '</label>')
    			
  			    $('#transfer').append(html);	
	        } else {
	        	var html = '<div>\
       				<span>giao dịch thất bại !!!!!</span>\
       				<br>\
       				<a href="\"> <<<< quay lại</a>\
       				</div>';
	       		$('#transfer').html(html);	
	        }
			
	        //
	        $('.loader').hide();

      	    
      	    $('#submit_code').click(function(){
      	    	//
      	    	$('.loader').show();
      	    	//
				var code = $('#code').val();
				$.post('/api/transaction', { code: code} , function(data, status){
					if ( data == 'success') {
						var html = '<p>Chuyển tiền thành công. Vui lòng kiểm tra email !!!</p>';
						$('#footer_id_2').remove();
						$('#active_code').html(html);
					} else {
						var html = 'Mã xác nhận không đúng';
						$('#message').html(html);
					}					
					//
					$('.loader').hide();		
				});

			});

		});		
		
	});

	$('.loader').hide();


});