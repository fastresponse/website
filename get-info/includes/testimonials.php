<div id="testimonial-wrapper">

<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
if (empty($handle))
  $handle = db_connect();

// not using max_quotes at this time
$max_quotes = 3;

$programs = array_unique( array('general', $program_of_interest) );

$quote_query = function($handle, $program) {
  $results = basic_query($handle,
    array('name', 'quote', 'image'), # select
    'testimonials', # from
    array('FIND_IN_SET(:course, courses) > 0'), # where
    null, # order by
    0, # limit
    array(':course' => $program) # replacement parameters
  );
  return $results;
};

do {
  $program = array_pop($programs);
  $quotes_tmp = $quote_query($handle, $program);
} while (empty($quotes_tmp) && !empty($programs));

if (!empty($quotes_tmp))
  shuffle($quotes_tmp);

$i = 0;
foreach ($quotes_tmp as $quote):
  # display it
  $quote_text = html_entity_decode($quote['quote']);
  $quote_name = $quote['name'];
  $quote_image = $quote['image'];
  $quote_image = (empty($quote_image)) ? ''
    : "<img alt='Fast Response graduate photo' class='fleft' src='$quote_image' />"
  ;

  $initial_visibility = ($i == 0) ? 'block' : 'none';
  $i++;

?>

<blockquote style="display: $initial_visibility;">
  <?= $quote_image ?>
  <p><?= $quote_text ?></p>
  <div class="source"><strong><?= $quote_name ?></strong>, Fast Response Graduate</div>
</blockquote>

<?php endforeach; ?>

</div>

<?php if (!empty($quotes_tmp)): ?>
<script type="text/javascript">
window.jQuery || document.write(
  '<script src="/js/jquery-1.10.2.min.js" type="text/javascript"><\/script>'
);
</script>

<script src="/js/jquery.rotate-visible.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
  var $container = $("#testimonial-wrapper");
  if ($container.children().length) {
    $container.children().hide();
    $container.rotate(10000);
  }
});
</script>
<?php endif; ?>

