<div id="testimonials" class="module article-box">
  <div class="title">
    <div class="title-border">
      <h1>Success Stories</h1>
    </div>
  </div>
  <div class="body slideshow">

<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
if (empty($handle))
  $handle = db_connect();

// not using max_quotes at this time
$max_quotes = 3;

$courses = array_unique(
  array('general', $course_abbr, $course_title)
);

$quote_query = function($handle, $course) {
  $results = basic_query($handle,
    array('name', 'quote', 'image', 'video'), # select
    'testimonials', # from
    array('FIND_IN_SET(:course, courses) > 0'), # where
    null, # order by
    0, # limit
    array(':course' => $course) # replacement parameters
  );
  return $results;
};

do {
  $course = array_pop($courses);
  $quotes_tmp = $quote_query($handle, $course);
} while (empty($quotes_tmp) && !empty($courses));

if (!empty($quotes_tmp))
  shuffle($quotes_tmp);

$i = 0;
foreach ($quotes_tmp as $quote):
  # display it
  $quote_text = html_entity_decode($quote['quote']);
  $quote_name = $quote['name'];
  $quote_image = $quote['image'];
  $video = $quote['video'];
  $attrs = '';

  $initial_visibility = ($i == 0) ? 'block' : 'none';
  $i++;

  // need to load jquery and/or magnificpopup.js,
  // then call $('.testimonial-video').magnificPopup();
  if (!empty($video)) {
    $class = 'testimonial-video mfp-iframe';
    $attrs = 'data-mfp-src="' . $video . '"';
    if (empty($quote_text)) {
      $quote_text = 'Click to play';
    }
  }
  else {
    $class = 'testimonial-text';
  }

?>

  <div class="<?= $class ?>" <?= $attrs ?> style="display: <?= $initial_visibility ?>;">
    <?php if (!empty($quote_image)): ?>
      <img alt="Fast Response graduate" src="<?= $quote_image ?>" />
    <?php endif; ?>
    <p><?= $quote_text ?></p>
    <div class="source"><strong><?= $quote_name ?></strong>, Fast Response Graduate</div>
  </div>

<?php endforeach; ?>

  </div>

  <script type="text/javascript">
    jQuery('.testimonial-video').magnificPopup();
  </script>

</div>
