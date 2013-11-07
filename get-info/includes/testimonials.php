<?php

function get_formatted_quotes($program = 'general', $show_quotes = 1) {
  $quotes = array(
    'general' => array(
      array(
        'quote' => '<p>This class is great! I would definitely recommend this course to anyone interested in the health field.</p>',
	      'name' => 'K. Gloria',
	      'img' => '',
      ),
    ),
    'EMT' => array(
    ),
    'Phlebotomy' => array(
    ),
  );


  if (empty($program) || !array_key_exists($program, $quotes))
    $program = 'general';

  $quotes_tmp = $quotes[$program];
  if (empty($quotes_tmp))
    $quotes_tmp = $quotes['general'];

	shuffle($quotes_tmp);

  $output = '';
  foreach ($quotes_tmp as $quote) {
	  # display it
	  $quote_text = $quote['quote'];
	  $quote_name = $quote['name'];
	  $quote_img = $quote['img'];
	  $quote_img = (!empty($quote_img)) ? "<img alt='Fast Response graduate photo' class='fleft' src='./img/$quote_img' />" : '';

    $output .= <<<QUOTE_OUTPUT
<blockquote>
$quote_img
$quote_text
<div class="source"><strong>$quote_name</strong>, Fast Response Graduate</div>
</blockquote>
QUOTE_OUTPUT;

	  $show_quotes--;
    if ($show_quotes <= 0) break;
  }

  return $output;
}

echo get_formatted_quotes($program_of_interest);

?>

<script type="text/javascript">
$(document).ready(function() {

});
</script>
