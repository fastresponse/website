<div id="admissions_procedures" class="module article-box" >
  <div class="title">
    <div class="title-border">
      <h1>Admissions Procedure</h1>
    </div>
  </div>
  <div class="body">
    <h2 class="course-start-title">Postsecondary Admissions Steps</h2>
    <ul>
      <li>Provide evidence of meeting the program's minimum standards -</li>
      <ul>
        <li>Proof of legal residency</li>
        <li>Minimum age of 18 on the first day of class</li>
        <!--<li>High School Diploma or GED. Must furnish document or transcripts</li>-->
        <li>One of the following:</li>
        <ul>
          <li>High school diploma</li>
          <li>General Education Development (GED) diploma</li>
          <?php
            $college_reqs = array('minimum 2.0 GPA');
            if (is_array($course_college_reqs)) {
              $college_reqs = array_merge($college_reqs, $course_college_reqs);
            }
            if (is_array($college_reqs)) {
              $college_reqs = '(' . implode(', ', $college_reqs) . ')';
            }
            else {
              $college_reqs = '';
            }
          ?>
          <li>College transcripts<?= $college_reqs ?></li>
        </ul>
      </ul>
      <li>Attestation of personal background information</li>
      <li>Successful completion of an entrance examination (Wonderlic)</li>
      <li>Completion of an enrollment agreement</li>
      <li>Completion of a financial agreement</li>
      <li>Payment either in full or of first required installment</li>
    </ul>
  </div>
</div><!-- /article-box -->
