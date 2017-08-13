
$(document).ready(function(){

	// get city name
	$.get('/api/city', {}, function(data, status){
		var html = '<option value="">Chọn Tỉnh/ Thành Phố</option>';
  		for (var key in data) 
  		{	    
		   html += '<option value='+ data[key].code +'>' + data[key].name + '</option>';
     	   $('#city').html(html);
	    }
	});

	// get district name
	$('#city').change(function(){
		var city_id	= $('#city').val();
		$.post('/api/district', { code: city_id }, function(data, status){
			var html = '<option value="">Chọn Quận/ Huyện</option>';
			data.forEach(function(district)
			{			
		        html += '<option value='+ district.code +'>' + district.name + '</option>';
	     	    $('#district').html(html);
	    	});
		})		
	});

	//validate form register
    $("#register_form").validate({
        rules: {
            identity_card: {
                required: true,
                minlength: 9,
                maxlength: 12
            },
            date_of_identity_card: "required",
            name: {
                required: true,
                minlength: 2
            },
            date_of_birth: "required",
            phone: {
                required: true,
                minlength: 10
            },
            address: "required",
            city: "required",
            district: "required",
            ward: "required",
            email: {
                required: true,
                email: true
            },
            email_confirmation: {
                required: true,
                equalTo: "#email",
            },
            job: "required"       
        },
        messages: {
            identity_card: {
                required: "Nhập chứng minh nhân dân",
                minlength: "Số chứng minh không đúng",
                maxlength: "Số chứng minh không đúng"
            },
            date_of_identity_card: "Chọn ngày cấp CMND",
            name: "Nhập đầy đủ họ và tên",
            date_of_birth: "Chọn ngày tháng năm sinh",
            phone: {
                required: "Nhập số điện thoại cá nhân",
                minlength: "Số điện thoại không đúng"
            },
            address: "Nhập địa chỉ liên lạc",
            city: "Chọn Tỉnh, Thành Phố",
            district: "Chọn Quận/ Huyện",
            ward: "Nhập phường/ xã",
            email: {
                required: "Nhập Email",
                email: "Email không đúng định dạng"
            },
            email_confirmation: {
                required: "Nhập lại Email",
                equalTo: "Email không giống trên"
            },
            job: "Nhập Công việc hiên tại"
        }
    });

    // loader

    // $('#loader').addClass("hide-loader");

     
});


