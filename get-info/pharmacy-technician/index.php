<?php
//page variables - change as needed for this page
$title		= 'Pharmacy Technician Training';
$description	= null;

$headline = 'Get the Skills to Become a Pharmacy Technician';
$subhead = 'Guaranteed Externships, Convenient Schedule';

$program_of_interest = 'Pharmacy Technician';
$program_abbreviation = 'PHT';

$key_values = array(
  "Assistance with CA Registered Pharmacy Technician application process",
  "Eligibility for testing to become a National Certified Pharmacy Technician",
  "Training in a variety of marketable job skills"
);

$zip_radius = 50;

$video_numbers = array(
);

$hideTestimonials = true;

include_once('../includes/header.php');

?>

<img class="fcenter v-spaced hero" src="<?= BASE_URL; ?>img/pht-top.jpg" alt="EMT careers">

<h3>What is a Pharmacy Technician?</h3>

<p>
The role of today's Pharmacy Technician is both exciting and rewarding. Serving as the liaison between a patient and a pharmacist, many Pharmacy Technicians work in the retail, hospital and special areas of pharmacy services like Oncology, Pediatrics and Long Term Care.
</p>

<h3>Why become a Pharmacy Technician?</h3>

<p>
According to the United States Bureau of Labor Statistics, "Employment of pharmacy technicians is projected to grow 20 percent from 2012 to 2022, faster than the average for all occupations."
</p>

<h3>Why choose Fast Response?</h3>

<p>
If you want to become a highly-skilled healthcare professional, capable of competing in the job market, come experience our Pharmacy Technician Program. You will learn how to work with pharmacists and patients while also learning anatomy and physiology, medication order processing, compounding (mixing) medications, pharmacy math, pharmacy law, medication safety, patient safety, drug interactions, common disease states and, pharmaceutical interventions.
</p>

<p>
Our skills lab provides hands-on practice for both hospital and retail pharmacy settings. You will be in a dynamic and engaging classroom setting learning the information and skills necessary to prepare you for your clinical externship and your career. Our Instructors are highly-trained and experienced <strong>California Registered Pharmacy Technicians</strong> as well as <strong>Nationally Certified Pharmacy Technicians (CPhT)</strong>. We utilize a student-based Socratic teaching method where there is a shared dialogue between Instructor and learners, drawing knowledge from the learners and, creating an exchange of information in the classroom.
</p>

<h3>Clinical Externship - On-the-Job Experience</h3>

<p>
Working with real patients, in a wide variety of environments and, under the direct supervision of a licensed Pharmacist, you will gain hands-on experience during your 160 hours in a clinical externship. Externships often lead directly to employment and can be a great way to network.
</p>

<h3>Becoming a Registered Pharmacy Technician</h3>

<p>
The California State Board of Pharmacy requires that each Pharmacy Technician applicant complete a "course that provides a minimum of 240 hours of instruction as specified in Title 16 California Code of Regulation section 1793.6(c)" (<a href="http://www.pharmacy.ca.gov">www.pharmacy.ca.gov</a>) in order to become registered as a Pharmacy Technician. 
</p>

<p>
Our program offers a robust curriculum of 246 hours of classroom training relevant to current laws and professional standards. As a successful graduate of our Pharmacy Technician Program, you will be eligible to sit for the National Pharmacy Technician Certification Exam (PTCE).
</p>

<h3>Class Schedules</h3>

<p>
Our programs are designed for busy, adult learners. Many students continue to work while attending school. This course has flexible entry dates and convenient part-time schedules with morning and evening classes.
</p>

<ul>
	<li>Pharmacy Technician Program = <strong>13 weeks</strong> of classroom training and <strong>160 hours</strong> of clinical externship</li>
</ul>

<?php if (false): ?>
<img class="fcenter v-spaced" src="<?= BASE_URL; ?>img/emt-photostrip-2.jpg" alt="Fast Response health care careers">

<h3>Get the Support You Need to Launch a Successful Career</h3>

<p>
Healthcare training isn't about getting a diploma - it's about getting a career you love. Fast Response is dedicated to supporting you throughout your career. Experienced Career Services professionals are happy to help with things like resume preparation, interview techniques and job searches.
</p>

<p>Payment plans are available for those that qualify.</p>

<h3>Is Pharmacy Technician Training Right for You?</h3>
<h4>Get More Information&#8230;</h4>

<p>
If you'd like to explore a career as a Pharmacy Technician, just complete the form on this page. A friendly Admissions Representative will get back to you to answer all your questions and assist you with everything from scheduling to payment plans.
</p>

<p>
	For immediate questions, call <strong><?= phone_link(PHONE); ?></strong>.
</p>

<?php endif; ?>

<?php include_once('../includes/footer.php'); ?>
