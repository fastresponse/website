<?php //include(__DIR__ . '/menu.html'); ?>

<!-- css for this is in /css/nicemenus.css -->

<ul class="nice-menu nice-menu-down" id="nice-menu-1">

  <!-- this level is the main menu visible at all times -->

  <li class="menuparent">
  <a href="/">Home</a>
  <ul>
    <!-- sub-menu -->
    <li>
    <a href="/school/about.php">About Us</a>
    </li>
    
    <li>
    <a href="/school/about.php#mission">Mission statement</a>
    </li>
    
    <!--
    <li>
    <a href="/school/faqs.php">FAQs</a>
    </li>
    -->
    
    <li>
    <a href="/school/sitemap.php">Sitemap</a>
    </li>
    
    <li class="menuparent">
    <a href="/school/policies/">Policies</a>
    <ul>
      <li>
      <a href="/school/policies/ceu.php">Continuing Education</a>
      </li>

      <li>
      <a href="/school/policies/privacy.php">Privacy Policy</a>
      </li>

      <li>
      <a href="/school/policies/terms.php">Terms And Conditions</a>
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
      <?php
      $courses = array(
        'EMT', 'Phlebotomy', 'Pharmacy Tech',
        'Medical Assistant', 'Paramedic',
        'Sterile Processing Tech',
      );
      foreach ($courses as $name):
        $path = str_replace(' ', '_', strtolower($name));
      ?>
      <li>
      <a href="/classes/career_courses/<?= $path ?>"><?= $name ?></a>
      </li>
      <?php endforeach; ?>
    </ul>
    </li>
 
    <li class="menuparent">
    <a href="/classes/#continuing">Continuing Education Courses</a>
    <ul>
      <?php
      $courses = array(
        'CPR', 'ACLS', 'PALS', 'ECG Basic',
        'ECG 12-Lead' => '12_lead_ecg',
        'ECG Technician' => 'ecg_tech',
        'ACLS Preparation' => 'acls_prep',
        'ITLS',
        'EMT Refresher' => 'emt_r',
      );
      foreach ($courses as $key => $value):
        if (is_numeric($key)) {
          $name = $value;
          $path = str_replace(' ', '_', strtolower($name));
        }
        else {
          $name = $key;
          $path = $value;
        }
      ?>
      <li>
      <a href="/classes/continuing_education/<?= $path ?>"><?= $name ?></a>
      </li>
      <?php endforeach; ?>

      <?php if (false): ?>
      <li>
      <a href="http://www.ssreg.com/fastresponse/classes/classes.asp?catID=4216">Paramedic Anatomy &amp; Physiology</a>
      </li>
      <?php endif; ?>
    </ul>
    </li>
  </ul>
  </li>

  <li class="menuparent">
  <a href="/resources/">Resources</a>
  <ul>
    <?php
    $courses = array(
      'EMT', 'CPT', 'CMA', 'SPT',
    );
    foreach ($courses as $name):
      $path = str_replace(' ', '_', strtolower($name));
    ?>
    <li class="menuparent">
    <a href="/resources/<?= $path ?>/"><?= $name ?></a>
    <ul>
      <li>
      <a href="/resources/<?= $path ?>/?section=forms">Forms</a>
      </li>

      <li>
      <a href="/resources/<?= $path ?>/?section=carsvcs">Career Services</a>
      </li>

      <li>
      <a href="/resources/<?= $path ?>/?section=resumes">Resumes</a>
      </li>

      <li>
      <a href="/resources/<?= $path ?>/?section=interviews">Interview Skills</a>
      </li>

      <li>
      <a href="/resources/<?= $path ?>/?section=jobsearch">Job Search</a>
      </li>

      <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/resources/' . $path . '/externship_certification.php')): ?>
	    <li>
	    <a href="/resources/<?= $path ?>/?section=extcert">Externship &amp; Certification</a>
	    </li>
      <?php endif; ?>

      <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/resources/' . $path . '/videos.php')): ?>
	    <li>
	    <a href="/resources/<?= $path ?>/?section=videos">Videos</a>
	    </li>
      <?php endif; ?>
    </ul>
    </li>
    <?php endforeach; ?>
  </ul>
  </li>

  <li class="menuparent">
  <a href="/classes/#community">Community</a>
  <ul>
    <li>
    <a href="/community/cpr/">CPR</a>
    </li>

    <li>
    <a href="/community/first_aid/">First Aid</a>
    </li>
  </ul>
  </li>

  <li class="menuparent">
  <a href="/school/info/">Contact Us</a>
  <ul>
    <li>
    <a href="/school/location/?section=maps">Location</a>
    </li>

    <li>
    <a href="/school/location/?section=directions">Directions</a>
    </li>

    <li>
    <a href="/school/location/?section=transit">Transit</a>
    </li>

    <li>
    <a href="/school/location/?section=parking">Parking</a>
    </li>

    <li>
    <a href="//www.facebook.com/FastResponseSchool">Visit us on Facebook</a>
    </li>

    <li>
    <a href="//twitter.com/_FastResponse">Follow us on Twitter</a>
    </li>
  </ul>
  </li>
</ul>


