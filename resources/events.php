<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/frpage.php');

$page = new FRWebpage();

$page
  ->set_title('Events')
  ->set_header_image('/images/headers/header_main_right.jpg')
  ->add_button('Contact Us', '/school/info/', '/images/buttons/envelope-icon.png')
  ->add_button('Visit Us On<br />Facebook',
    'http://www.facebook.com/FastResponseSchool', '/images/buttons/facebook-icon.png')
;

$page->set_body(<<<BODY
<h1>This is a header</h1>
<p>This is a paragraph.</p>
BODY
);

$page->print_page();

?>
