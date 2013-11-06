<?php
	if (empty($full_title)) {die('form error');} # disallow bots navigating straight to this file by checking a file set in header.php
  error_reporting(0);
?>
<form id="sb_form" action="<?= BASE_URL; ?>contact/index.php" method="post" onsubmit="return validate(this);">

	<div class="checkbox-group chk-questions">
		<label>
			<input type="checkbox" name="how_much_is_tuition" value="How much is tuition?">
			<span>How much is tuition?</span>
		</label>
		<label>
			<input type="checkbox" name="can_i_get_financial_aid" value="Can I get financial aid?">
			<span>Can I get financial aid?</span>
		</label>
		<label>
			<input type="checkbox" value="What are my career prospects?" name="what_are_my_career_prospects">
			<span>What are my career prospects?</span>
		</label>
		<label>
			<input type="checkbox" name="when_does_it_start" value="When does it start?">
			<span>When does it start?</span>
		</label>
	</div>

	<input class="chk_values" type="hidden" name="chk_questions" value="">

	<div class="input-wrap">
		<label class="input">
			<span>Questions / Comments</span>
			<textarea cols="5" name="comments" rows="4"></textarea>
		</label>
	</div>

	<div class="input-wrap">
		<label class="input">
			<span>Program</span>
			<select name="program" required="required" id="program_select">
				<option value="">&ndash; Select a program &ndash;</option>
				<?= get_program_options($program_options,$program_of_interest); ?>
			</select>
		</label>
	</div>

	<div class="input-wrap">
		<label class="input">
			<span>Where did you hear about us?</span>
			<select name="source" required="required" id="source_select">
				<option selected="selected" value="">&ndash; Select one &ndash;</option>
				<?= get_program_options($source_options, get_referring_source()); ?>
			</select>
		</label>
	</div>

	<div class="input-wrap">
		<label class="input">
			<span>Your name</span>
			<input type="text" name="full_name" required="required" />
		</label>
	</div>

	<div class="input-wrap">
		<label class="input">
			<span>Email</span>
			<input type="email" name="email" required="required" />
		</label>
	</div>

	<div class="input-wrap">
		<label class="input">
			<span>Phone</span>
			<input type="tel" name="phone" required="required" />
		</label>
	</div>

	<div class="input-wrap">
		<label class="input">
			<span>Zipcode</span>
			<input type="text" name="zip" required="required" />
		</label>
	</div>

	<input type="hidden" name="creative" value="<?= get_url_tag('crtv'); ?>">
	<input type="hidden" name="network" value="<?= get_url_tag('ntwk'); ?>">
	<input type="hidden" name="keyword" value="<?= get_url_tag('kw'); ?>">
	<input type="hidden" name="device" value="<?= get_url_tag('dvc'); ?>">
	<input type="hidden" name="lead_src" value="<?= get_url_tag('lead_src'); ?>">

	<!--<input type="hidden" name="source" value="PPC">-->

	<input type="hidden" name="landing_page" value="<?= get_url_tag('landing_url'); ?>">
	<input type="hidden" name="submit_page" value="<?= get_current_url(); ?>">

	<div class="submit-wrap">
		<input class="btn" type="submit" value="Get Info Now!" name="submit" title="Submit">
	</div>

</form>
