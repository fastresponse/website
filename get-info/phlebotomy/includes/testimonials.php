<?php

	$quotes = array();

	$quotes['general'][] = array('quote' => '<p>This class is great! I would definitely recommend this course to anyone interested in the health field.</p>',
								'name' => 'K. Gloria',
								'img' => '');






	# pick a random one
if (!empty($program_code)) {

	$quotes = $quotes[$program_code];
	shuffle($quotes);
	$quote = $quotes[0];

} else {
	# if no program code is set, pick one at random
	shuffle($quotes);
//	print_r($quotes);
	$quotes = $quotes[0];
	shuffle($quotes);
}

	$i = 0;
	foreach ($quotes as $quote) {

		# display it
		$quote_text = $quote['quote'];
		$quote_name = $quote['name'];
		$quote_img = $quote['img'];
		$quote_img = (!empty($quote_img)) ? "<img alt='Fast Response graduate photo' class='fleft' src='./img/$quote_img' />" : '';

?>
<blockquote>
	<?= $quote_img; ?>
	<?= $quote_text; ?>
	<div class="source"><strong><?= $quote_name; ?></strong>, Fast Response Graduate</div>
</blockquote>
<?php

		$i++; if($i>=1) break; // show this number of quotes
	}



?>
