$("#submit_spa_master_details_submit").click(function(){
    if (validation_submit_spa_master_details()) {
    	$("#spa_profile_details_tab").hide();
    	$("#spa_image_tab").show();
    }
});
$("#spa_image_tab_submit").click(function(){
    if (validate_spa_image_tab_submit()) {
    	$("#spa_image_tab").hide();
    	$("#spa_profile_location_tab").show();
    }
});

$("#spa_profile_location_submit").click(function(){
	if (validate_spa_profile_location_tab()) {
		$("#spa_profile_location_tab").hide();
		$("#spa_profile_services_category_tab").show();
	}
});



function validate_spa_profile_location_tab()
{
	var country_id = $("#select_country").val();
	var city_id = $("#city_select").val();
	var area_id = $("#area_select").val();
	var address = $("#address").val();
	var pincode = $("#pincode").val();
	var flag = true ;

	if (country_id && $.isNumeric(country_id)) {
		$("#select_country_error").text("");flag = true ;
	} else {
		$("#select_country_error").text("Plese Select Country");
		return false ;
	}

	if (city_id && $.isNumeric(city_id)) {
		$("#city_select_error").text("");flag = true ;
	} else {
		$("#city_select_error").text("Plese Select City");
		return false ;
	}

	if (area_id && $.isNumeric(area_id)) {
		$("#area_select_error").text("");flag = true ;
	} else {
		$("#area_select_error").text("Plese Select Area");
		return false ;
	}

	if (address) {
		$("#address_error").text("");flag = true ;
	} else {
		$("#address_error").text("Plese Enter Address");
		return false ;
	}

	if (pincode && $.isNumeric(pincode)) {
		$("#pincode_error").text("");flag = true ;
	} else {
		$("#pincode_error").text("Plese Enter Valid pincode in propar format");
		return false ;
	}


	return flag ;
}


function validate_spa_image_tab_submit()
{
	var image = $("#image_to_upload").val();
	var flag = true ;
	if (image) {
		$("#image_to_upload_error").text("");flag = true ; 
	} else {
		$("#image_to_upload_error").text("Plese Select Image");
		return false ; 
	}
	return flag ;
}

function validation_submit_spa_master_details()
{
	var title = $("#title").val();
    var contact_number = $("#contact_number").val();
    var email_id = $("#email_id").val();
	var flag = true ;

	if (title) { 
		$("#title_error").text("");flag = true ; 
	} else {
		$("#title_error").text("Title is not in propar formate");
		return false ; 
	}

	if (contact_number && contact_number.length >= 10) { 
		$("#contact_number_error").text("");flag = true ; 
	} else {
		$("#contact_number_error").text("contact Number is not in propar formate");
		return false ; 
	}

	if (email_id && validateEmail(email_id)) {
		$("#email_id_error").text("");flag = true ;
	} else {
		$("#email_id_error").text("Email Id is not in propar formate");
		return false ;
	}

	return flag ;
}


function validateEmail(sEmail) {
	var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true ;
    } else {
        return false ;
    }
}

$("#select_country").change(function(){
    var country_id = $("#select_country").val();
    var ajax_url = base_url + "spa_profile/get_city";
    $.ajax({
        type: "POST",
        url: ajax_url,
        data: {country_id:country_id},
        success: function (response) {
        	if (response.status == "success") {
                $("#city_select").html('');
                var html_str = '<option value="">---Select City---</option>';
                for (var i = 0 ; i < response.data.length ; i++ )
                {
                    html_str += '<option value="'+ response.data[i].id +'">'+ response.data[i].city_name +'</option>';
                }
                $("#city_select").html(html_str);
            } else {
                alert(response.message);
            }	
        },
        error : function (response) {
        	debugger ;
        }
    });
});

$("#city_select").change(function(){
	var city_id = $("#city_select").val();
	var ajax_url = base_url + "spa_profile/get_area";
	$.ajax({
        type: "POST",
        url: ajax_url,
        data: {city_id:city_id},
        success: function (response) {
        	if (response.status == "success") {
                $("#area_select").html('');
                var html_str = '<option value="">---Select Area---</option>';
                for (var i = 0 ; i < response.data.length ; i++ )
                {
                    html_str += '<option value="'+ response.data[i].id +'">'+ response.data[i].area_name +'</option>';
                }
                $("#area_select").html(html_str);
            } else {
                alert(response.message);
            }	
        },
        error : function (response) {
        	debugger ;
        }
    });

});

