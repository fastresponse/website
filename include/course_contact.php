<?php
  $programs = array(
    'EMT', 'Phlebotomy', 'Medical Assistant',
    'Sterile Processing', 'Paramedic'
  );
?>

<form id="contact-form" action="/include/course_contact_emailer.php" method="post" onsubmit="return validate(this);">
  <fieldset>
    <legend>Contact Us</legend>
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
      <label for="form-zip">Zipcode</label>
      <input type="text" id="form-zip" name="zip" onkeyup="return zipValidate(this, '#zipcheck', <?= $zip_radius ?>);" />
      <div id="zipcheck"></div>
    </div>
    <div class="form-section-comments">
      <label for="form-comments">Questions<br />and<br />Comments</label>
      <textarea cols="28" rows="3" id="form-comments" name="comments" style="vertical-align: top;"></textarea>
      <br />
    </div>
    <div class="form-section-submit">
      <label id="loading"></label>
      <div id="output"></div>
      <label for="form-submit"></label>
      <input type="submit" id="form-submit" name="submit" title="Submit" value="Get More Information" class="innerglow-orange" />
    </div>
    <div class="form-section-call">
      <label for="form-call"></label>
      <div class="call" id="form-call">
        <a href="tel://1-800-637-7387">Phone <span class="phone-number">1-800-637-7387</span></a>
      </div>
    </div>
  </fieldset>
</form>

<script type="text/javascript">
window.jQuery || document.write(
  '<script src="/js/jquery-1.10.2.min.js"><\/script>'
);
</script>

<script type="text/javascript" src="/js/contactform.js"></script>

<script type="text/javascript">  
/* <![CDATA[ */    

$(document).ready(function() {
  var form = $('#contact-form');
  var output = $('#output');
  var loadingimgdiv = $('#loading');
  var loadingimgid = '#loadingimg';
  var submitid = '#form-submit';

  function displayOutput(data) {
	  $(loadingimgid).fadeOut(300, function() {
	    $(this).remove();
	    $('input').prop('disabled', true);
	    $('select').prop('disabled', true);
	    $('textarea').prop('disabled', true);
		  output.html(data).slideDown(500);
	  }); // end loading image fadeOut
  }

  function evalJS(obj) {
    obj.find('script').each(function(i) {
      eval( $(this).text() );
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

    var formdata = $(this).serialize();

    $.ajax({
	    type: "POST",
	    url: "/include/course_contact_emailer.php",
	    data: formdata,
      dataType: 'html',

	    success: function(data, textStatus, jqxhr) {
        $(submitid).slideUp(500, function() {
          $('label[for="' + submitid.slice(1) + '"]').hide();
          displayOutput(data);
          evalJS(output);
        });
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

