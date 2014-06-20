<?php
//page variables - change as needed for this page
$title		= 'Phlebotomy Career Training';
$description	= null;

$headline = 'Get the Skills to Be a Certified Phlebotomy Technician';
$subhead = 'Clinical Externships Start in as Little as 2 Weeks';

$program_of_interest = 'Phlebotomy';
$program_abbreviation = 'CPT';
$program_career_name = 'Phlebotomy Technician';

$hideExternalSites = false;
$hideTestimonials = false;

$zip_radius = 75;

$video_numbers = array(
);

$key_values = array(
  'Day and evening classes',
);  

include_once('../includes/header.php');

?>

<img class="fcenter v-spaced hero" src="<?= BASE_URL; ?>img/cpt-top.jpg" alt="Phlebotomy careers">

<p>
	Phlebotomists work directly with patients to collect and process blood specimens for laboratory testing. Professionals in this field play an important role in the clinical laboratory and contribute to the comfort, safety and care of patients.
</p>
<p>
	If you're a compassionate person interested in helping others and you're looking to start a rewarding healthcare career (<em>without spending years in school</em>), phlebotomy training could be an excellent opportunity.
</p>

<h3>Becoming a Qualified Phlebotomist</h3>

<p>
	The Certified Phlebotomy Technician Program from Fast Response School of Healthcare Education provides the <strong>hands-on training</strong>, practical clinic experience and industry support it takes to pursue a rewarding medical lab position.
</p>
<p>
	Topics covered in this course include anatomy and physiology, laboratory safety, infection control precautions, blood-borne pathogens, specimen collection, and proper needle disposal. <strong>ECG</strong> and <strong>CPR</strong> courses are also included at no charge.
</p>
<p>
	Note: Advanced Certification is available for practicing phlebotomists who need to obtain their CPT-1 under the new CA State standards.
</p>



<h3>Clinical Externship - On-the-Job Experience</h3>

<p>
	Phlebotomy is a hands-on career, and at Fast Response we believe that's how it should be taught. As a student in the Phlebotomy Program you'll complete a professional clinical externship in a <strong>real medical lab environment</strong>. Externships are a great way to get a feel for different aspects of a career and make valuable industry contacts.
</p>
<p>
	Graduates of this program are fully prepared and feel confident in professional lab environments after gaining so much practical, real-world experience.
</p>


<h3>Convenient Day or Evening Schedules</h3>

<p>
	Fast Response programs are designed for busy, adult learners. Many students are raising families and/or continuing working while going to school. Choose from flexible full or part-time options.
</p>

<ul>
	<li>Full-Time Program can be completed in <strong>4 weeks</strong>, externship starts at 2 weeks</li>
	<li>Part-Time Program can be completed in <strong>6 weeks</strong>, externship starts at 4 weeks</li>
</ul>

<?php if (false): ?>
<img class="fcenter v-spaced" src="<?= BASE_URL; ?>img/phlebotomy-photostrip.jpg" alt="Fast Response health care careers">

<h3>Get the Support You Need to Launch a Successful Career</h3>

<p>
	Healthcare training isn't about getting a diploma - it's about getting a career you love. Fast Response is dedicated to supporting you throughout your career. Experienced Career Services professionals are happy to help with things like resume preparation, interview techniques and job searches.
</p>

<p>Payment plans are available for those that qualify.</p>

<h3>Is Phlebotomy Right for You?</h3>
<h4>Get More Information&#8230;</h4>

<p>
	If you're interested in learning more about a career in phlebotomy, and exploring whether this is the right career path for you, fill out the form on the side of this page to receive more information. A helpful Fast Response Admissions Representative will be happy to answer any questions you have and can assist you with everything from scheduling to payment plans.
</p>
<p>
	For immediate questions, call <strong><?= phone_link(PHONE); ?></strong>.
</p>

<?php endif; ?>

<?php include_once('../includes/footer.php'); ?>
