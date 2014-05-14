<?php
//page variables - change as needed for this page
$title		= 'Paramedic Training';
$description	= null;

$headline = 'Get the Advanced Skills You Need to Become a Paramedic';
$subhead = 'Guaranteed Internships, Diverse Observation Sites';

$program_of_interest = 'Paramedic';
$program_abbreviation = 'Paramedic';

$key_values = array(
  'NREMT-P Test Preparation',
  'Certification completion: PALS, ACLS, ITLS, GEMS, and EMPACT',
  'iPad with EMS software included',
);

$questions_code = <<<ENDQ
    <label style="line-height: 1em; margin-bottom: 8px;">
      <input type="checkbox" id="form-emt" required="required" name="emt" value="I am currently an EMT.">
      <span>I am currently an EMT.</span><br />
      <span style="font-size: small; margin-left: 23px;">(six months experience required)</span>
    </label>
ENDQ;

$hideLinkList = false;
$link_title = 'Paramedic Academy Application';
$link_list = array(
  'Application for Consideration' => '/pdfs/Paramedic Academy Application.pdf',
);

$zip_radius = 50;

$hideTestimonials = true;

include_once('../includes/header.php');

?>

<img class="fcenter v-spaced hero" src="<?= BASE_URL; ?>img/paramedic-top.png" alt="Paramedic careers">

<p style="width: 90%; margin-left: auto; margin-right: auto; color: #dd0033;">
  In order to begin paramedic training, you must first be a licensed and practicing Emergency Medical Technician with at least six months experience.<br style="line-height: 1.5em;" />
  <a style="font-weight: bold;" href="/get-info/emt/">If you're not already an EMT, <span style="text-decoration: underline;">get information about becoming an EMT here.</span></a>
</p>

<p>
  Paramedics provide advanced emergency medical care above and beyond what an EMT can do. They are able to administer medications, start IVs, and provide extensive prehospital care. Paramedics typically work in ambulances, but can also be found in hospitals, fire departments, and other places where advanced emergency medical care may be needed.
</p>

<p>
  The Paramedic Academy at Fast Response School of Health Care Education is dedicated to training quality paramedics. Our academy focuses on critical thinking and comprehensive education to prepare you for real emergency medicine, not just for passing a test!
</p>


<h3>Becoming a Licensed Paramedic</h3>

<p>
  The Paramedic Academy provides extensive classroom training - <strong>35% more didactic hours</strong> than other programs - to ensure the highest quality of education. Students are active participants in the <strong>Socratic learning method</strong> in the classroom and gain valuable insights at <strong>didactic observation sites</strong> throughout the course. Our instructional staff includes <strong>licensed paramedics</strong>, <strong>RNs</strong>, and <strong>MDs</strong>.
</p>

<p>
	Topics covered in this course include anatomy and physiology, pharmacology and medication administration, airway management, respiratory and endocrine emergencies, cardiovascular emergencies, abdominal, gastrointestinal, genitourinary, renal, and gynecological emergencies, neurological, hematologic, and immunologic emergencies, infectious disease, toxicology, psychiatric emergencies, trauma systems, orthopedic trauma, burns, shock, resuscitation, environmental emergencies, and special patient care.
</p>


<h3>Clinical &amp; Field Internship - On-the-Job Experience</h3>

<p>
	As a student in the Paramedic Academy you'll gain valuable experience during your clinical internship in a <strong>hospital emergency department</strong>, as well as <strong>operating room</strong>, <strong>intensive care unit</strong>, <strong>PACU</strong>, and <strong>OB</strong> experience. During your field internship you'll put your knowledge and skills to work on a <strong>911 ambulance</strong>.
</p>
<!--
<p>
	Fast Response provides you with <strong>30% more</strong> clinical internship hours and up to <strong>50% more</strong> field internship hours than other schools, because we want you to succeed.
</p>
-->

<h3>12-Month Course</h3>

<p>
  The Fast Response Paramedic Academy can be completed in <strong>12 months</strong>, including internships. We want <strong>you</strong> to have a <strong>rewarding career</strong> as soon as possible!
</p>

<ul>
  <li>Didactic instruction: 728 hours</li>
  <ul>
    <li>Advanced Specialized Courses: 80 hours</li>
    <li>Didactic observation: 48 hours</li>
  </ul>
  <li>Clinical internship: 208 hours (minimum)</li>
  <li>Field internship: 480 hours (minimum)</li>
</ul>

<?php if (false): ?>
<img class="fcenter v-spaced" src="<?= BASE_URL; ?>img/paramedic-photostrip.png" alt="Fast Response health care careers">

<h3>Get the Support You Need to Launch a Successful Career</h3>

<p>
	Healthcare training isn't about getting a diploma - it's about getting a career you love. Fast Response is dedicated to supporting you throughout your career. Experienced Career Services professionals are happy to help with things like resume preparation, interview techniques and job searches.
</p>

<p>Payment plans are available for those that qualify.</p>

<h3>Is Paramedic Training Right for You?</h3>
<h4>Get More Information&#8230;</h4>

<p>
	If you're interested in learning more about becoming a paramedic, and exploring whether this is the right career path for you, fill out the form on the side of this page to receive more information. A helpful Fast Response Admissions Representative will be happy to answer any questions you have and can assist with everything from scheduling to payment plans.
</p>
<p>
	For immediate questions, call <strong><?= phone_link(PHONE); ?></strong>.
</p>

<?php endif; ?>

<?php include_once('../includes/footer.php'); ?>
