<?php
  $programs = array(
    'EMT', 'Phlebotomy', 'Medical Assistant',
    'Sterile Processing', 'Paramedic'
  );
?>

<script type="text/javascript" src="/js/contactform.js"></script>

<form id="contact-form" action="" method="post" onsubmit="return validate(this);">
  <fieldset>
    <legend>Contact Us</legend>
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
    <label for="form-name">Name</label>
    <input type="text" id="form-name" name="full_name" required="required" />
    <br />
    <label for="form-email">Email</label>
    <input type="email" id="form-email" name="email" required="required" />
    <br />
    <label for="form-phone">Phone</label>
    <input type="tel" id="form-phone" name="phone" required="required" />
    <br />
    <label for="form-zip">Zipcode</label>
    <input type="text" id="form-zip" name="zip" required="required" onkeyup="return zipValidate(this, '#zipcheck', <?= $zip_radius ?>);" />
    <div id="zipcheck"></div>
    <label for="form-comments">Questions<br />and<br />Comments</label>
    <textarea cols="28" rows="3" id="form-comments" name="comments" style="vertical-align: top;"></textarea>
    <br />
    <label></label>
    <input type="submit" id="form-submit" name="submit" title="Submit" value="Get More Information" class="glow-lightblue" />
    <a href="tel://1-800-637-7387" class="call">Or Call 1-800-637-7387</a>
  </fieldset>
</form>
