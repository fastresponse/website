<section id="emt" class="article-box module">
  <div class="title">
    <div class="title-border"><h1>More EMT at <span style="white-space: nowrap;">Fast Response</span></h1></div>
  </div>
  <div class="body">
<?php
$emt_programs = array(
  'EMT' => array(
    'url' => '/classes/career_courses/emt/',
    'title' => 'EMT Program',
    'text' => 'Fast Response offers an accelerated EMT program, perfect for anyone looking for an entry-level medical responder course.',
  ),
  'EMT-R' => array(
    'url' => '/classes/continuing_education/emt_r/',
    'title' => 'EMT Refresher',
    'text' => 'A review course intended for EMTs who need continuing education units (CEUs) to renew their certifications. Provides 24 CEUs plus skills testing.',
  ),
  'EMT-Skills' => array(
    'url' => '/classes/continuing_education/emt_skills/',
    'title' => 'EMT Skills Verification',
    'text' => 'A scenario-based skills test intended for EMTs who need to renew their certifications, and have already completed enough continuing education units.',
  ),
);
$emt_programs = array_diff_key($emt_programs, array($course_abbr => ''));

$i = count($emt_programs);
if ($i > 1) $col = 'col';
else $col = '';

foreach ($emt_programs as $prog => $data):
  $i--;
?>
    <div class="<?= $col ?>">
      <h2 class="red"><a href="<?= $data['url'] ?>"><?= $data['title'] ?></a></h2>
      <p><?= $data['text'] ?></p>
<?php if ($i > 0): ?>
    </div><hr /><div class="<?= $col ?>">
<?php else: ?>
    </div>
<?php endif;

endforeach;
?>
    <hr />
    <div><a href="http://www.emsa.ca.gov/emt_frequently_asked_questions">CA State Renewal Guidelines</a></div>
    <hr />
    <div><a href="https://www.nremt.org/nremt/about/reg_basic_history.asp#EMT_Recertification">National Renewal Guidelines</a></div>
  </div>
</section>
