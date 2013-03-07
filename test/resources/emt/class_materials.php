<?php
$file_titles = array(
  // 'Filename' : 'Title'
  'Blood Pressure.pdf' : 'Blood Pressure',
);
?>
<script type="text/javascript">
  // use encodeURIComponent(text)
  files = {
    "key" : "value",
  }
</script>
<ul class="underline pointer">
  <li><span onClick="showSubSection('materials', 'syllabus');">View Syllabus</span></li>
  <li><a href="/pdfs/EMT_Syllabus.pdf">Download Syllabus (pdf)</a></li>
  <li><span onClick="showSubSection('materials', 'videos');">EMT Skills Videos</span></li>
</ul>

<div id="syllabus" class="hidden">
  <iframe style="width: 600px; height: 500px;" frameborder="0" src="http://docs.google.com/viewer?embedded=true&url=<?= urlencode('http://www.fastresponse.org/pdfs/2013 Master Catalog ALL FINAL 1.31.12.pdf') ?>">
  </iframe>
</div>

<div id="videos" class="hidden">
  Put videos here.
</div>
