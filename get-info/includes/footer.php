
<?php if (isset($program_of_interest)): ?>

<img class="fcenter v-spaced" src="<?= BASE_URL; ?>img/<?= strtolower($program_abbreviation) ?>-photostrip.jpg" alt="Fast Response health care careers">

<h3>Get the Support You Need to Launch a Successful Career</h3>

<p>
Healthcare training isn't about getting a diploma; it's about obtaining a career you love. Fast Response is dedicated to supporting you throughout your career. Experienced Career Services professionals are happy to help with resume preparation, interview techniques and job searches.
</p>

<p>Payment plans are available for those who qualify.</p>

<h3>Is <?= $program_of_interest ?> Training Right for You?</h3>
<h4>Get More Information&#8230;</h4>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/php/lib/class.IndefiniteArticle.php'); ?>
<p>
If you'd like to explore a career as <?= IndefiniteArticle::A($program_career_name) ?>, just complete the form on this page. A friendly Admissions Representative will get back to you to answer all your questions and assist you with everything from scheduling to payment plans.
</p>
<p>
For immediate questions, call <strong style="white-space: nowrap;"><?= phone_link(PHONE); ?></strong>.
</p>

<?php include('video.php'); ?>

<?php	if (!$hideForm): ?>
	<div class="get-info-now"><a href="#info-form" class="do-flash btn"><span>Get Info Now!</span></a></div>
<?php endif; ?>

<?php endif; // isset(program_of_interest) ?>

</div><?php /* /#content */ ?>

<div id="sidebar">

	<?php if (!$hideForm): ?>
	<div id="contact-form">
		<div class="info-form-wrap">
			<div class="form-area" id="info-form">
				<div class="cta">
					<h3>I Want Answers!</h3>
					<p>Choose from the following and fill out the form below...</p>
				</div>
				<div class="container">

					<?php	include('form.php'); ?>

					<div class="erform_privacy">
						<p class="no-margin"><a title="Privacy Statement" href="<?= BASE_URL; ?>privacy-policy.php" target="_blank">Privacy Policy</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php else: ?>
	<div class="widget">
		<h3>Privacy Statement</h3>
		<div class="widget-body thankyou-privacy">

			<p>At Fast Response, <strong>we respect <a title="Privacy Statement" href="<?= BASE_URL; ?>privacy-policy.php">your privacy</a></strong>. We do not distribute any of your information to third parties.</p>
		</div>
	</div>
	<?php endif; ?>


  <?php if (!$hideLinkList): ?>
  <div class="widget links">
    <h3><?= $link_title ?></h3>
    <div class="widget-body">
      <ul>
        <?php foreach ($link_list as $text => $link): ?>
        <li><a href="<?= $link ?>" target="_blank"><?= $text ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <?php endif; ?>

	<div class="widget accreditations">
		<h3>Affiliations</h3>
		<div class="widget-body">
			<div class="text-left">
				<p>Approved by</p>
				<ul>
					<li>California Bureau for Private Postsecondary Education (BPPE)
					</li>
					<li>California Department of Public Health, Laboratory Field Services (CDPL/LFS)
					</li>
					<li>National Center for Competency Testing (NCCT)
					</li>
          <li>California Certifying Board for Medical Assistants (CCBMA)
          </li>
				</ul>
			</div>
		</div>
	</div>

  <?php if (isset($program_of_interest)): ?>

  <?php if (!$hideKeyValues): ?>
	<div class="widget checks-features">
    <h3>Key Values</h3>
		<div class="widget-body">
			<ul class="fancy">
        <?php foreach ($key_values as $item): ?>
        <li><?= $item ?></li>
        <?php endforeach; ?>
				<li>Flexible payment options</li>
				<li>Career services assistance</li>
        <li>Located one block from BART</li>
				<li>Guaranteed externships</li>
				<li>Affiliated with California Dept. of Rehabilitation</li>
			</ul>
		</div>
	</div>
  <?php endif; ?>

  <?php if (!$hideExternalSites): ?>
  <div class="widget external-sites">
    <h3>External Sites</h3>
    <div class="widget-body">
			<?php include('external_sites.php'); ?>
    </div>
  </div>
  <?php endif; ?>

  <?php if (!$hideTestimonials): ?>
	<div class="widget testimonials">
		<h3>Success Stories</h3>
		<div class="widget-body">
			<?php include('testimonials.php'); ?>
		</div>
	</div>
  <?php endif; ?>

  <?php endif; // isset(program_of_interest) ?>


</div><?php /* /#sidebar */ ?>

</div><?php /* /.main */ ?>


<div id="address-footer">
	<img class="fleft" src="<?= BASE_URL; ?>img/logo.png" alt="Fast Response">
	<address class="fleft"><strong>Fast Response School of Health Care Education</strong><br>
	2075 Allston Way<br>
	Berkeley, CA 94704
	</address>
</div>

<div id="footer">

	<div class="copyright">
		&copy; <?= date('Y'); ?> <a class="no-ul" href="http://www.fastresponse.org/" target="_blank">Fast Response</a>, All Rights Reserved
	</div>

<?php if (false): ?>
  <div class="footer-nav">
		<ul class="nav">
			<li><a href="<?= BASE_URL; ?>">About Us</a></li>
		</ul>
	</div>
<?php endif; ?>

	<a id="scroll-to-top" href="#top"><img src="<?= BASE_URL; ?>img/scroll-top.png" alt="Back to top" title="Back to top"></a>

</div>

</div><?php /* /.wrap */ ?>


<script type="text/javascript">
window.jQuery || document.write(
  '<script src="/js/jquery-1.10.2.min.js"><\/script>'
);
</script>

<script type="text/javascript" src="<?= BASE_URL; ?>js/functions.js"></script>

<?php
  if (isset($extra_footer_code))
	  echo "\n$extra_footer_code\n";

	//Determine if google adword conversion code needs to be included on this page.
	if ($conversionCode) {
		include("conversionCode.php");
	} else {
		# non-conversion remarketing and tracking code for landing pages
		include('remarketingCode.php');
  }
?>

</body>
</html>
