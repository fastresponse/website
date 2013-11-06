<?php

/**
* ER Ad helper 2
* One function to allow for $_GET overrides
* Example: $header1 = get_dynamic_val('h1','Cooking School');
* 	would be overridden by $_GET['h1']
*
* @param String $var_name The name of the $_GET variable
* @param String $default_value The default value if no $_GET variable is set
*/
function get_dynamic_val($var_name, $default_value) {

	$override_value = $default_value;

	if (!empty($_GET[$var_name])) {
		$override_value = $_GET[$var_name];
		$override_value = htmlspecialchars($override_value);
	}

	return $override_value;
}


/**
* Returns HTML for a phone number that will become a link on mobile devices
* See functions.js "click-to-call" code
*
* Custom options array (optional):
* 'anchor text' : custom anchor text for the link
* 'type' : 'phone' or 'text'
* 'extra classes'
* 'extra attributes'
*
* @param mixed $number phone number
* @param mixed $custom_options custom options
*/
function phone_link($number, $custom_options = array()) {

	$default_options = array();
	$default_options['anchor text'] = $number;
	$default_options['type'] = 'phone';
	$default_options['extra classes'] = '';
	$default_options['extra attributes'] = '';

	$options = array_merge($default_options,$custom_options);

	$prefix = 'tel:';

	if ($options['type'] == 'text') {
		$prefix = 'sms:';
	}

	$link_number = $prefix . str_replace(array('.',' ','(',')'),'',$number);
	$classes = 'phone-wrap ' . $options['extra classes'];

	$html = "<span class='$classes' data-phonelink='$link_number' {$options['extra attributes']}>{$options['anchor text']}</span>";

	return $html;

}


/**
* Set "Campaign URL tags" from url GET parameters if specified
* stores in a session so it will persist across pages
* for example, lead_src
*
* @param string $tag_name
*
*/
function set_url_tag($tag_name) {
	if (!empty($_GET[$tag_name])) {
		$_SESSION[$tag_name] = $_GET[$tag_name];
	}
}

/**
* returns a campaign url tag, if one is set in the session
*
*/
function get_url_tag($tag_name) {
	return $_SESSION[$tag_name];
}

/**
* put your comment there...
*
* @param string $value OPTGROUP label or OPTION value
* @param mixed $label associative array of programs, or string for one program
* @param mixed $current_program the current program for the page being rendered
*/
function get_option_html($value, $label, $current_program) {

	# recurse into arrays, or just print html
	if (is_array($label)) {
		$output .= "<optgroup label='$value'>";
		foreach ($label as $sub_value => $sub_label) {
			$output .= get_option_html($sub_value,$sub_label,$current_program);
		}
		$output .= "</optgroup>";
	} else {
		$current = ($current_program == $value) ? 'selected="selected"' : '';
		$output = "<option $current value='$value'>$label</option>";
	}

	return $output;
}

/**
* Loop through a formatted array and return HTML for OPTION tags
*
* @param mixed $program_options associative array of program options
* @param string $current_program the current program for the page being rendered
*/
function get_program_options($program_options, $current_program) {
	$output = '';
	foreach ($program_options as $key => $value) {
		$output .= get_option_html($key,$value,$current_program);
	}
	return $output;
}

/**
* Return the current URL (useful for tracking)
*
*/
function get_current_url() {
	$url = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	return $url;
}

/**
* stores the landing page URL in the session
* (the URL the visitor first lands on)
*
*/
function set_landing_url() {
	if (empty($_SESSION['landing_url'])) {
		$_SESSION['landing_url'] = get_current_url();
	}

}

/**
* check HTTP_REFERER and return a name as a source
*
*/
function get_referring_source() {
  $refer = $_SERVER['HTTP_REFERER'];
    if (!$refer || $refer == '')
      return '';

  $host = parse_url($refer, PHP_URL_HOST);
  if (!$host || $host == '')
    return '';

  if (array_key_exists($host, $source_hosts))
    return $source_hosts[$host];

  /*
  // alternatively, if $source_hosts contains regex patterns:
  foreach ($source_hosts as $pattern => $src) {
    if (preg_match($pattern, $host)) {
      return $src;
    }
  }
  */

  //return '';
  return 'Other';
}

?>
