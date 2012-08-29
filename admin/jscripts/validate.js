
function validate_site_name()
{
	var value = $('input[name = site_name]').val();
	if(value == null || value == "")
	{
		error ="Error: Enter Valid Site Name.";
		showErrorSuccess();
		return false;
	}
	else
	{
		$("#message").hide();
		return true;
	}
}

function validate_url()
{
	var value = $('input[name = url]').val();
	var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
	  if (pattern.test(value))
	  {
		  $("#message").hide();  
		  return true;
		}
		else
		{
			error = "Not valid URL. Start URL with 'http://'";
			showErrorSuccess();
			return false;
		}
}

function validate_email()
{
		var x = $('input[name = email]').val();
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
		  {
		  error = "Not a valid e-mail address";
		  showErrorSuccess();	  
		  return false;
		  }
		else
		{
			$("#message").hide();
			return true;
		}
}

function validate_folder()
{
		var value = $('input[name = folder]').val();
		if(value.substr(-1) === "/" )
		{
			$("#message").hide();
			return true;
		}
		else
		{
			error = "Not valid folder address. It should end with '/'";
		  showErrorSuccess();
		  return false;
		}		
}

function validate_uname()
{
		var value = $('input[name = uname]').val();
		if(value == null || value == "")
		{
			error ="Error: Enter Valid User Name.";
			showErrorSuccess();
			return false;
		}
		else
		{
			$("#message").hide();
			return true;
		}
}
function validate_pass()
{
		var value = $('input[name = pass]').val();
		if(value == null || value == "")
		{
			error ="Error: Enter Valid Password.";
			showErrorSuccess();
			return false;
		}
		else
		{
			$("#message").hide();
			return true;
		}
}

function validateAll()
{
	if(!(validate_site_name())){}
	else if(!(validate_url())){}
	else if(!(validate_email())){}
	else if(!(validate_folder())){}
	else if(!(validate_uname())){}
	else if(!(validate_pass())){}
	else{
		$("form").submit();
	}
}