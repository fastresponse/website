<div id="testimonials" class="student-testimonials">
<h1>Success Stories</h1>
<div class="testimonial-wrapper slideshow">

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
    array('name', 'quote', 'image'), # select
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

  $initial_visibility = ($i == 0) ? 'block' : 'none';
  $i++;

?>

  <blockquote style="display: <?= $initial_visibility ?>;">
  <?php if (!empty($quote_image)): ?>
    <img alt="Fast Response graduate photo" src="<?= $quote_image ?>" />
  <?php endif; ?>
    <p><?= $quote_text ?></p>
    <div class="source"><strong><?= $quote_name ?></strong>, Fast Response Graduate</div>
  </blockquote>

<?php endforeach; ?>

</div>

<?php if (false): ?>
<?php if (!empty($quotes_tmp)): ?>
<script type="text/javascript">
window.jQuery || document.write(
  '<script src="/js/jquery-1.10.2.min.js" type="text/javascript"><\/script>'
);
</script>

<script src="/js/jquery.rotate-visible.js" type="text/javascript"></script>

<script type="text/javascript">
jQuery(document).ready(function() {
  jQuery(".slideshow").slideshow(6000, 900);
});
</script>
<?php endif; ?>
<?php endif; ?>
</div>
