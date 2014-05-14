/** form validation **/
function validate(f) {
	var errors = 0,
		error_msg = 'Please fill out all required fields',
		fields = $(f).find('[required="required"]');

	fields.removeClass('v_error').each(function(){

		var v = $(this).val()
			t = $(this).attr('type');

		if(v == '') {
			errors++;
			$(this).addClass('v_error');
		}
		if(t == 'email' && !looksLikeMail(v)) {
			errors++;
			error_msg = "Please enter a valid email address";
			$(this).addClass('v_error');
		}
		if(t == 'tel' && !valid_us_phone(v)) {
			errors++;
			error_msg = "Please enter a valid phone number";
			$(this).addClass('v_error');
		}

	});

	if(errors > 0) {
		alert(error_msg);
		return false;
	} else {
		return true;
	}

}

function zipValidate(z, out_id, radius) {
	// delete any non-digits
	if (/\D/g.test(z.value)) {
		z.value = z.value.replace(/\D/g, '');
	}

	// this re-hides the message if they backspace from 5
	if (z.value.length < 5) {
		$(out_id).slideUp('fast');
	}

	// at 5, check the entered zip
	if (z.value.length == 5) {
    $.ajax({
			url: '/php/ajax/ajax.ziplookup.php',
			type: 'POST',
			data: { zip: z.value },
			dataType: 'html',
			success: function(data, txtStatus, jqxhr) {
				if (data != null && data > radius) {
					$(out_id).html(
						'This zip code is more than ' +
            '<span style="white-space: nowrap;">'+radius+' miles</span> ' +
            'from our campus.'
					).slideDown();
				}
			},
			error: function(jqxhr, txtStatus, txtError) {
			}
		});
	}

	// delete characters past 5
	// do this after the == 5 check to avoid showing zip-check
	// over again if they keep typing past 5
	if (z.value.length > 5) {
		z.value = z.value.substr(0, 5);
	}

	return true;
}

function looksLikeMail(str) {
    var lastAtPos = str.lastIndexOf('@'),
    	lastDotPos = str.lastIndexOf('.');
    return (lastAtPos < lastDotPos && lastAtPos > 0 && str.indexOf('@@') == -1 && lastDotPos > 2 && (str.length - lastDotPos) > 2);
}
function valid_us_phone(phone_number) {
	/* strip whitespace */
	phone_number = phone_number.replace(/\s+/g, "");
	/* not enough digits? */
	if(phone_number.length < 10) {
		return false;
	}
	/* strip all non-digits for the rest of these checks */
	phone_number = phone_number.replace(/[^0-9]/g, '');

	/* not enough digits again? */
	if(phone_number.length < 10) {
		return false;
	}

	return true;
}

