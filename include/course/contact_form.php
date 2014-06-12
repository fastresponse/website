<?php
  $programs = array(
    'EMT', 'Phlebotomy', 'Medical Assistant',
    'Sterile Processing', 'Paramedic'
  );
?>

<section id="contact-form-section">
<form id="contact-form" action="/php/ajax/ajax.course_contact_emailer.php" method="post" onsubmit="return validate(this);">
  <fieldset>
    <legend>Get More Information</legend>
  <!-- this will be hidden via css if mobile -->
  <!-- can't do via PHP, program has to be there -->
    <div class="form-section-program">
      <label for="form-program">Program</label>
      <select id="form-program" name="program" required="required">
        <option value="">&ndash; Select a program &ndash;</option>
        <?php foreach($programs as $p): ?>
        <option value="<?= $p ?>" <?php if ($p == $course_name)
          echo 'selected="selected"';
        ?>><?= $p ?></option>
        <?php endforeach; ?>
      </select>
      <br />
    </div>
  <!-- end hiding -->
    <label for="form-name">Name</label>
    <input type="text" id="form-name" name="name" required="required" />
    <br />
    <label for="form-email">Email</label>
    <input type="email" id="form-email" name="email" required="required" />
    <br />
    <label for="form-phone">Phone</label>
    <input type="tel" id="form-phone" name="phone" required="required" />
    <br />
  <?php if ($device != 'phone'): ?>
    <div class="form-section-zip">
      <label for="form-zip">Zip Code</label>
      <input type="text" id="form-zip" name="zip" onkeyup="return zipValidate(this, '#zipcheck', <?= $zip_radius ?>);" />
      <div id="zipcheck"></div>
    </div>
    <div class="form-section-comments">
      <label for="form-comments">Questions<br />and<br />Comments</label>
      <textarea cols="28" rows="3" id="form-comments" name="comments" style="vertical-align: top;"></textarea>
      <br />
    </div>
  <?php endif; ?>
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
      <input type="submit" id="form-submit" name="submit" title="Submit" value="Email Us" class="inner-outer-glow-orange" />
    </div><div class="form-section-call">
      <label for="form-call"></label>
      <div class="call" id="form-call">
        <a href="tel://1-800-637-7387">Call Us</a>
      </div>
    </div>
  <?php if ($device != 'phone'): ?>
    <input type="hidden" id="city" name="city" value="" />
  <?php endif; ?>
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
</section>
