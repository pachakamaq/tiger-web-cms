var error = "";
    var success = "";
	$(document).ready(function() {
		if( error !=""){
			$("#message").show().addClass("error_message");
			$("#message").html(error);
		}
		else if( success !=""){
			$("#message").show().addClass("success_message");
			$("#message").html(success);
		}
	});