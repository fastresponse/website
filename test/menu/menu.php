<?php //include(__DIR__ . '/menu.html'); ?>

<!-- css for this is in /css/nicemenus.css -->

<ul class="nice-menu nice-menu-down" id="nice-menu-1">

  <!-- this level is the main menu visible at all times -->

  <li class="menuparent">
  <a href="/">Home</a>
  <ul>
    <!-- sub-menu -->
    <li>
    <a href="/test/school/about.html#about">About Us</a>
    </li>
    
    <li>
    <a href="/test/school/about.html#mission">Mission statement</a>
    </li>
    
    <!--
    <li>
    <a href="/test/school/faqs.html">FAQs</a>
    </li>
    -->
    
    <li>
    <a href="/test/school/sitemap.html">Sitemap</a>
    </li>
    
    <li class="menuparent">
    <a href="/school/policies/">Policies</a>
    <ul>
      <li>
      <a href="/school/policies/ceu.html">Continuing Education</a>
      </li>

      <li>
      <a href="/school/policies/privacy.html">Privacy Policy</a>
      </li>

      <li>
      <a href="/school/policies/terms.html">Terms And Conditions</a>
      </li>
    </ul>
    </li>

    <li>
    <a href="http://www.bppe.ca.gov/about_us/contact.shtml" title="Bureau of Private and Postsecondary Education">Contact the BPPE</a>
    </li>
  </ul> <!-- end submenu -->
  </li>

  <li class="menuparent">
  <a href="/classes/">Courses</a>
  <ul>
    <li class="menuparent">
    <a href="/classes/#career">Career courses</a>
    <ul>
      <li>
      <a href="/classes/career_courses/emt">EMT</a>
      </li>

      <li>
      <a href="/classes/career_courses/phlebotomy">Phlebotomy</a>
      </li>

      <li>
      <a href="/classes/career_courses/medical_assistant">Medical Assistant</a>
      </li>

      <li>
      <a href="/classes/career_courses/paramedic">Paramedic</a>
      </li> 

      <li>
      <a href="/classes/career_courses/sterile_processing_tech">Sterile Processing Tech</a>
      </li>
    </ul>
    </li>
 
    <li class="menuparent">
    <a href="/classes/#continuing">Continuing Education Courses</a>
    <ul>
      <li>
      <a href="/classes/continuing_education/cpr">CPR</a>
      </li>

      <li>
      <a href="/classes/continuing_education/acls">ACLS</a>
      </li>

      <li>
      <a href="/classes/continuing_education/pals">PALS</a>
      </li>

      <li>
      <a href="/classes/continuing_education/ecg_basic">ECG Basic</a>
      </li>

      <li>
      <a href="/classes/continuing_education/12_lead_ecg">ECG 12-Lead</a>
      </li>

      <li>
      <a href="/classes/continuing_education/ecg_tech">ECG Technician</a>
      </li>

      <li>
      <a href="/classes/continuing_education/acls_prep">ACLS Preparation</a>
      </li>

      <li>
      <a href="/classes/continuing_education/itls">ITLS</a>
      </li>

      <li>
      <a href="/classes/continuing_education/emt_r/">EMT Refresher</a>
      </li>

      <li>
      <a href="/classes/continuing_education/NREMT/">NREMT</a>
      </li>
    </ul>
    </li>
  </ul>
  </li>

  <li class="menuparent">
  <a href="/resources/">Resources</a>
  <ul>
    <li class="menuparent">
    <a href="/resources/emt/">EMT</a>
    <ul>
      <li>
      <a href="/resources/emt/?section=carsvcs">Career Services</a>
      </li>

      <li>
      <a href="/resources/emt/?section=resumes">Resumes</a>
      </li>

      <li>
      <a href="/resources/emt/?section=interviews">Interview Skills</a>
      </li>

      <li>
      <a href="/resources/emt/?section=jobsearch">Job Search</a>
      </li>

      <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/test/resources/emt/externship_certification.php')): ?>
	<li>
	<a href="/resources/emt/?section=extcert">Externship &amp; Certification</a>
	</li>
      <?php endif; ?>

      <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/test/resources/emt/videos.php')): ?>
	<li>
	<a href="/resources/emt/?section=videos">Videos</a>
	</li>
      <?php endif; ?>
    </ul>
    </li>

    <li class="menuparent">
    <a href="/resources/cpt/">CPT</a>
    <ul>
      <li class="menuparent">
      <a href="/resources/cpt/?section=carsvcs">Career Services</a>
      </li>

      <li>
      <a href="/resources/cpt/?section=resumes">Resumes</a>
      </li>

      <li>
      <a href="/resources/cpt/?section=interviews">Interview Skills</a>
      </li>

      <li>
      <a href="/resources/cpt/?section=jobsearch">Job Search</a>
      </li>

      <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/test/resources/cpt/externship_certification.php')): ?>
	<li>
	<a href="/resources/cpt/?section=extcert">Externship &amp; Certification</a>
	</li>
      <?php endif; ?>

      <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/test/resources/cpt/videos.php')): ?>
	<li>
	<a href="/resources/cpt/?section=videos">Videos</a>
	</li>
      <?php endif; ?>
    </ul>
    </li>

    <li class="menuparent">
    <a href="/resources/cma/">CMA</a>
    <ul>
      <li class="menuparent">
      <a href="/resources/cma/?section=carsvcs">Career Services</a>
      </li>

      <li>
      <a href="/resources/cma/?section=resumes">Resumes</a>
      </li>

      <li>
      <a href="/resources/cma/?section=interviews">Interview Skills</a>
      </li>

      <li>
      <a href="/resources/cma/?section=jobsearch">Job Search</a>
      </li>

      <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/test/resources/cma/externship_certification.php')): ?>
	<li>
	<a href="/resources/cma/?section=extcert">Externship &amp; Certification</a>
	</li>
      <?php endif; ?>

      <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/test/resources/cma/videos.php')): ?>
	<li>
	<a href="/resources/cma/?section=videos">Videos</a>
	</li>
      <?php endif; ?>
    </ul>
    </li>

    <!--
    <li class="menuparent">
    <a href="/resources/paramedic/">Paramedic</a>
    <ul>
      <li class="menuparent">
      <a href="/resources/paramedic/?section=carsvcs">Career Services</a>
      </li>

      <li>
      <a href="/resources/paramedic/?section=resumes">Resumes</a>
      </li>

      <li>
      <a href="/resources/paramedic/?section=interviews">Interview Skills</a>
      </li>

      <li>
      <a href="/resources/paramedic/?section=jobsearch">Job Search</a>
      </li>

      <?php //if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/test/resources/paramedic/externship_certification.php')): ?>
	<li>
	<a href="/resources/paramedic/?section=extcert">Externship &amp; Certification</a>
	</li>
      <?php //endif; ?>

      <?php //if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/test/resources/paramedic/videos.php')): ?>
	<li>
	<a href="/resources/paramedic/?section=videos">Videos</a>
	</li>
      <?php //endif; ?>
    </ul>
    </li>
    -->

    <li class="menuparent">
    <a href="/resources/spt/">SPT</a>
    <ul>
      <li class="menuparent">
      <a href="/resources/spt/?section=carsvcs">Career Services</a>
      </li>

      <li>
      <a href="/resources/spt/?section=resumes">Resumes</a>
      </li>

      <li>
      <a href="/resources/spt/?section=interviews">Interview Skills</a>
      </li>

      <li>
      <a href="/resources/spt/?section=jobsearch">Job Search</a>
      </li>

      <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/test/resources/spt/externship_certification.php')): ?>
	<li>
	<a href="/resources/spt/?section=extcert">Externship &amp; Certification</a>
	</li>
      <?php endif; ?>

      <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/test/resources/spt/videos.php')): ?>
	<li>
	<a href="/resources/spt/?section=videos">Videos</a>
	</li>
      <?php endif; ?>
    </ul>
    </li>
  </ul>
  </li>

  <li class="menuparent">
  <a href="/community/">Community</a>
  <ul>
    <li>
    <a href="/community/">Community Education</a>
    <ul>
      <li>
      <a href="/community/cpr/">CPR</a>
      </li>

      <li>
      <a href="/community/first_aid/">First Aid</a>
      </li>
    </ul>
    </li>

    <li>
    <a href="/community/">Events And Information</a>
    </li>
  </ul>
  </li>

  <li class="menuparent">
  <a href="/school/info/">Contact Us</a>
  <ul>
    <li>
    <a href="/school/location">Location</a>
    <!--
    <ul>
      <li>
      <a href="/school/location?init=map">Map</a>
      </li>

      <li>
      <a href="/school/location?init=directions">Directions</a>
      </li>

      <li>
      <a href="/school/location?init=transit">Transit</a>
      </li>

      <li>
      <a href="/school/location?init=parking">Parking</a>
      </li>
    </ul>
    -->
    </li>
  </ul>
  </li>
</ul>


