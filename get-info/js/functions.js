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

function zipValidate(z) {
	// TODO: better checks here, order matters, etc

	// delete any non-digits
	if (/\D/g.test(z.value)) {
		z.value = z.value.replace(/\D/g, '');
	}

	// this re-hides the message if they backspace from 5
	if (z.value.length < 5) {
		$('#zipcheck').slideUp('fast');
	}

	// at 5, check the entered zip
	if (z.value.length == 5) {
    $.ajax({
			url: '/php/ajax.ziplookup.php',
			type: 'POST',
			data: { zip: z.value },
			dataType: 'html',
			success: function(data, txtStatus, jqxhr) {
				if (data != null && data > 50) {
					$('#zipcheck').html('This zip code is more than 50 miles from our campus.').slideDown();
				}
			},
			error: function(jqxhr, txtStatus, txtError) {
			}
		});
	}

	// delete characters past 5
	// do z here to avoid showing zip-check over again if they keep typing past 5
	if (z.value.length > 5) {
		z.value = z.value.substr(0, 4);
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

function flash_element(selector) {
	$(selector).fadeOut(200).fadeIn(600);
}


/* when a #target link is clicked, smooth scroll to it using jquery.scrollTo, then flash the target element */
/**
* Note: Chrome uses BODY, all others use HTML. Select both and use complete_called to make sure callback only fires once
*/
$('a[href^="#"]').on('click',function(e){
	var $target = $( $(this).attr('href') ),
	complete_called = false,
	do_flash = $(this).hasClass('do-flash');

	$('html,body').animate(
		{
			'scrollTop': $target.offset().top
		},
		{
			'duration': 550,
			'complete': function(){
				if(do_flash && !complete_called){
					complete_called = true;
					flash_element($target)
				}
			}
		}
	);

	/*  keep the hash part off of the url */
	e.preventDefault();
});

/**
* concatenate form CTA checkboxes into one field, name="chk_questions"
*/
$('#sb_form .chk-questions input').on('change',function(){
	var chk_values = '';
	$('#sb_form .chk-questions input:checked').each(function(e){
		chk_values += $(this).val() + ' ';
	});
	$('#sb_form .chk_values').val(chk_values);
});






/**
* Add click-to-call and click-to-text links for handheld devices
*/
var handheld = (/iPhone|iPod|iPad|Android|BlackBerry/i).test(navigator.userAgent);

if(handheld) {
	$('.phone-wrap[data-phonelink]').wrapInner(function(e) {
		var tel_link = $(this).attr('data-phonelink');
		return '<a href="' + tel_link + '" />';
	});
}

