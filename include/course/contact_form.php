<?php
  $programs = array(
    'EMT',
    'Phlebotomy',
    'Pharmacy Technician',
    'Medical Assistant',
    'Sterile Processing',
    'Paramedic',
  );

  $sources = array(
    'Google',
    'Facebook',
    'Yahoo / Bing',
    'Yelp',
    'Friend / Relative',
    'Coworker / Employer',
    'Flyer / Brochure',
    'Career Fair',
    'Other',
  );

  $source_hosts = array(
    'www.google.com' => 'Google',
    'www.facebook.com' => 'Facebook',
    'm.facebook.com' => 'Facebook',
    'www.bing.com' => 'Yahoo / Bing',
    'search.yahoo.com' => 'Yahoo / Bing',
    'www.yelp.com' => 'Yelp',
    'm.yelp.com' => 'Yelp',
  );

  
  // if $arr is associative array: keys are used as labels
  // if $arr is simple list: labels and values are the same
  function array_to_option_html($arr, $current = '') {
    $output = '';

    // anonymous function that inherits variables from parent scope
    // must inherit its own name by reference so it can recurse
    $make_html = function($key, $val) use (&$make_html, $current) {
      $output = '';
      if (is_int($key)) {
        $key = $val;
      }
      if (is_array($val)) {
        $output .= "<optgroup label='$key'>";
        foreach ($val as $subkey => $subval) {
          $output .= $make_html($subkey, $subval);
        }
        $output .= "</optgroup>";
      }
      else {
        $selected = ($current == $key) ? "selected='selected'" : "";
        $output .= "<option $selected value='$key'>$val</option>";
      }
      return $output;
    };

    foreach ($arr as $key => $val) {
      $output .= $make_html($key, $val);
    }

    return $output;
  }

  function get_referring_source() {
    global $source_hosts;

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

    return 'Other';
  }

?>

<div id="contact-form-div">
<form id="contact-form" action="/php/ajax/ajax.course_contact_emailer.php" method="post" onsubmit="return validate(this);">
  <fieldset>
    <legend>Contact Us</legend>
    <div class="form-section-program">
      <label for="form-program">Program</label>
      <select id="form-program" name="program" required="required">
        <option value="">&ndash; Select a program &ndash;</option>
        <?= array_to_option_html($programs, $course_name); ?>
      </select>
      <br />
    </div>
    <label for="form-name">Name</label>
    <input type="text" id="form-name" name="name" required="required" />
    <br />
    <label for="form-email">Email</label>
    <input type="email" id="form-email" name="email" required="required" />
    <br />
    <label for="form-phone">Phone</label>
    <input type="tel" id="form-phone" name="phone" required="required" />
    <br />
    <div class="form-section-zip">
      <label for="form-zip">Zip Code</label>
      <input type="text" id="form-zip" name="zip" onkeyup="return zipValidate(this, '#zipcheck', <?= $zip_radius ?>);" />
      <div id="zipcheck"></div>
    </div>
    <br />
    <div class="form-section-source">
      <label for="form-source" style="display: block; width: 100%; text-align: left;">
        Where did you first hear about us?
      </label>
      <label></label>
      <select id="form-source" name="source" required="required">
        <option value="">&ndash; Select one &ndash;</option>
        <?= array_to_option_html($sources, get_referring_source()); ?>
      </select>
    </div>
    <br />
    <div class="form-section-comments">
      <label for="form-comments">Questions<br />and<br />Comments</label>
      <textarea cols="28" rows="3" id="form-comments" name="comments" style="vertical-align: top;"></textarea>
      <br />
    </div>
<?php if ($course_name == 'Paramedic'): ?>
    <div class="form-section-emt">
      <input type="checkbox" id="form-emt" name="emt" value="I am currently an EMT." required="required" />
      <label for="form-emt">I am currently an EMT.</label>
      <br />
    </div>
<?php endif; ?>
    <div class="form-section-submit">
      <label id="loading"></label>
      <div id="output"></div>
      <label for="form-submit"></label>
      <input type="submit" id="form-submit" name="submit" title="Submit" value="Get More Information" class="inner-outer-glow-orange" />
    </div>
    <div class="form-section-call">
      <label for="form-call"></label>
      <div class="call" id="form-call">
        <a href="tel://1-800-637-7387">Phone <span class="phone-number">1-800-637-7387</span></a>
      </div>
    </div>
    <input type="hidden" id="city" name="city" value="" />
  </fieldset>
</form>

<script type="text/javascript">
window.jQuery || document.write(
  '<script src="/js/jquery-1.10.2.min.js"><\/script>'
);
</script>

<script type="text/javascript" src="/js/contactform.js"></script>

<!-- for conversion tracking code -->
<script type="text/javascript" src="/js/frlib2.js"></script>

<script type="text/javascript">  
/* <![CDATA[ */    

var formid = '#contact-form';

var currently_submitting = false;

jQuery(document).ready(function() {
  var form = jQuery(formid);
  var output = jQuery('#output');
  var loadingimgdiv = jQuery('#loading');
  var loadingimgid = '#loadingimg';
  var submitid = '#form-submit';

  function displayOutput(htmlout) {
	  jQuery(loadingimgid).fadeOut(300, function() {
	    jQuery(this).remove(); // removes the loading image
		  output.html(htmlout).slideDown(500);
	  });
  }

  output.click(function() {
    output.slideUp(500);
  });

  form.submit(function(event) {
    event.preventDefault();

    if (currently_submitting) return;

    currently_submitting = true;

    output.show();
    output.html('');

    loadingimgdiv.show();
    loadingimgdiv.append(
      '<img src="/images/ajax-loader.gif" alt="Currently Loading" id="' +
      loadingimgid.slice(1) + '" style="margin: 0 auto;" />'
    );

    var formdata = jQuery(this).serialize();

    $.ajax({
	    type: "POST",
	    url: "/php/ajax/ajax.course_contact_emailer.php",
	    data: formdata,
      dataType: 'json',

      // data.success: true/false
      // data.output: html to display
	    success: function(data, textStatus, jqxhr) {

        currently_submitting = false;

        // jQuery docs say to do the following, but it errors because PHP's
        // json_encode() isn't quoting the names of 'name' : 'value' pairs
        //   data = jQuery.parseJSON(data);
        // everything works fine without it

        // always fade/remove the loading image and display output
        displayOutput(data.output);

        // on success, disable further input and track conversions
        if (data.success) {
          jQuery(submitid).slideUp(500, function() {
	          jQuery('input,select,textarea').prop('disabled', true);
            jQuery('label[for="' + submitid.slice(1) + '"]').hide();
            // in frlib2.js
            trackConversions();
          });
        }
	    },

      error: function(jqxhr, textStatus, errorThrown) {

        currently_submitting = false;

        displayOutput(
          "<div class=\"error\">There was a problem sending your message. " +
          "Please try again later.</div>\n"
        );
      }
    });

  });
});

/* ]]> */
</script>  
</div>
