<?php

$root = $_SERVER['DOCUMENT_ROOT'] . '/';
$inc_dir = $root . 'include/';

include($inc_dir . 'std_head.php');
include($inc_dir . 'std_body.php');
include($inc_dir . 'std_left.php');
include($inc_dir . 'std_right.php');

if (!empty($content)) include($root . $content);

include($inc_dir . 'std_footer.php');
