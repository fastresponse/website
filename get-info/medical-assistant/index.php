<?php
//page variables - change as needed for this page
$title		= 'Medical Assistant Training';
$description	= null;

$headline = 'Get the Skills to Become a Clinical Medical Assistant';
$subhead = 'Phlebotomy and EKG Training - Guaranteed Externships<br>' .
           'All included for $6,500';

$program_of_interest = 'Clinical Medical Assistant';
$program_abbreviation = 'CMA';

$key_values = array(
  'Eligibility for certifications in Medical Assisting, Phlebotomy, and ECG Technician',
  'Our graduates are marketable because they are skilled in a variety of job functions',
);

$zip_radius = 50;

$hideTestimonials = false;

include_once('../includes/header.php');

?>

<img class="fcenter v-spaced hero" src="<?= BASE_URL; ?>img/cma-top.jpg" alt="Medical Assistant careers">

<h3 style="width: 80%; margin: 1em auto 2em; text-align: center; color: #2454A7;">Evening classes beginning in July! Contact us for details.</h3>

<h3><em>"What does a Clinical Medical Assistant do?"</em></h3>

<p>
As a Clinical Medical Assistant (Medical Assistant / CMA / MA), you will have an exciting career learning state-of-the-art medical procedures and be helping patients of all ages. You can become a vital partner in increasing medical office productivity and communicating with and assisting medical personnel in a variety of procedures. As a Medical Assistant, you may work in Dermatology, Oncology, Gastroenterology, Podiatry, Same Day Surgery, Obstetrics, Gynecology, Emergency Medicine and many other departments.
</p>

<h3><em>"What are the career prospects as a Medical Assistant?"</em></h3>

<p>
Clinical Medical Assisting is one of the fastest-growing healthcare careers in the U.S. The demand for Clinical Medical Assistants will increase by 29% over the next 10 years (Bureau of Labor Statistics, U.S. Department of Labor). Healthcare cannot be outsourced to another country and due to the Affordable Care Act (Obamacare), there will continue to be an increased need for health care professionals.
</p>

<h4>Why choose Fast Response?</h4>

<p>
If you want to become a highly-skilled medical professional, capable of competing in the job market, come experience our Clinical Medical Assistant Program. You will learn patient assessment, vital signs, 12-Lead ECG, surgical tray setup, assisting with minor surgeries, immunizations and injections, preparation and administration of medications, patient rehab, lab tests, patient charting and documentation. 
</p>

<p>
Fast Response students are recognized by Bay Area hospitals as being exceptionally prepared and competent. Our graduates, who have taken the optional California Certification Board for Medical Assistants Exam, have a <strong>100%</strong> pass rate on the first attempt! 
</p>

<p>
The Clinical Medical Assisting program at Fast Response provides dynamic classroom training, hands-on clinical skills training, and a clinical externship. Our instructors are all highly-trained and experienced <strong>California Certified Medical Assistants</strong> (CCMA) and AHA (American Heart Association) certified CPR Instructors. We utilize a student-based Socratic teaching method where there is a shared dialogue between teacher and students, drawing knowledge from the learners, creating an exchange of information in the classroom. 
</p>

<h3>Clinical Externship - On-the-Job Experience</h3>

<p>
As a student in the Clinical Medical Assisting program, you will complete 160 hours of clinical externship and 80 hours for your Phlebotomy at one of our <strong>contracted medical facilities</strong>. You will be working with real patients in a wide variety of clinical settings. Externships often lead directly to employment and can be a great way to network. 
</p>

<h3>Class Schedules</h3>

<p>
Fast Response programs are designed for busy, adult learners. Many students continue to work while attending school. This course has flexible entry dates and convenient part-time schedules with morning and evening classes.
</p>

<ul>
  <li>Clinical Medical Assistant program = <strong>18 weeks</strong> of classroom training and <strong>160 hours</strong> of clinical externship</li>
  <li>Phlebotomy program (included with Medical Assistant program) = <strong>2 weeks</strong> of classroom and skills training, plus <strong>80 hours</strong> of externship</li>
</ul>

<?php if (false): ?>
<img class="fcenter v-spaced" src="<?= BASE_URL; ?>img/cma-photostrip.jpg" alt="Fast Response health care careers">

<h3>Get the Support You Need to Launch a Successful Career</h3>

<p>
Healthcare training isn't about getting a diploma; it's about obtaining a career you love. Fast Response is dedicated to supporting you throughout your career. Experienced Career Services professionals are happy to help with resume preparation, interview techniques and job searches.
</p>

<p>Payment plans are available for those that qualify.</p>

<h3>Is Medical Assistant Training Right for You?</h3>
<h4>Get More Information&#8230;</h4>

<p>
If you're interested in learning more about a career as a medical assistant, and exploring whether this is the right career path for you, fill out the form on the side of this page to receive more information. A helpful Fast Response Admissions Representative will be happy to answer any questions you have and can assist with everything from scheduling to payment plans.
</p>
<p>
For immediate questions, call <strong><?= phone_link(PHONE); ?></strong>.
</p>
<?php endif; ?>

<?php include_once('../includes/footer.php'); ?>
