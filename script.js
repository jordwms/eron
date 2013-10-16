function setCookie(c_name,value,exdays) {
	var exdate=new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
	document.cookie=c_name + "=" + c_value;
}

function getCookie(c_name) {
	var c_value = document.cookie;
	var c_start = c_value.indexOf(" " + c_name + "=");
	if (c_start == -1) {
		c_start = c_value.indexOf(c_name + "=");
	}
	if (c_start == -1) {
		c_value = null;
	}
	else {
  		c_start = c_value.indexOf("=", c_start) + 1;
	  	var c_end = c_value.indexOf(";", c_start);
	  	if (c_end == -1) {
			c_end = c_value.length;
  		}
		c_value = unescape(c_value.substring(c_start,c_end));
	}
	return c_value;
}

$(document).ready( function() {
	$('.mail_me').submit( function(event) {
		// Clicking submit on a form redirects 
		// to the form "action" location by default. This prevents it
		event.preventDefault();

		var data = $(this).serialize();
		$.post(
			'work.php',
			data,
			function() {
				// This is the "success paramater"
				$('#form_success').show();
			});
	});
}); 
// END script.js