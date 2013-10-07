<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/templateload.php');
$template = new TemplateRenderer();

$slideshow = array(
  // 550, 298
  'dimensions' => array(412, 225),
  'images' => array(
    '/slideshow/412x225/slide01.jpg',
    '/slideshow/412x225/slide02.jpg',
    '/slideshow/412x225/slide03.jpg',
    '/slideshow/412x225/slide04.png',
    '/slideshow/412x225/slide05.jpg',
    '/slideshow/412x225/slide06.jpg',
    '/slideshow/412x225/slide07.png',
    '/slideshow/412x225/slide08.jpg',
    '/slideshow/412x225/slide09.png',
  ),
);

$styles = file_get_contents('./index.php.content/styles.html');

$introtext = "Fast Response offers the Bay Area's most comprehensive education and resources for healthcare professionals including entry-level courses, certifications, and continuing education units.";

$banners = array(
  array(
    'align' => 'left',
    'link' => '/school/info/',
    'divstyle' => 'max-width: 46%;',
    'text' => 'Contact an Admissions Representative Now!',
  ),
  array(
    'align' => 'right',
    'link' => '/classes/continuing_education/cpr/',
    'divstyle' => 'max-width: 50%; width: 412px; margin-right: 3%;',
    'bannerstyle' => 'width: 100%;',
    'text' => '<div style="display: inline; font-weight: bold; text-transform: uppercase; font-style: italic; text-shadow: -1px 1px 1px rgba(0,0,0,0.5), 1px -1px 1px rgba(0,0,0,0.5);" class="red">New</div> Low BLS Prices',
    'textstyle' => 'text-shadow: none; font-size: 150%; letter-spacing: 0.15em; word-spacing: 0.35em;',
  ),
  array(
    'align' => 'center',
    'link' => '/gallery/index.php/Events/EMT-Career-Fair---August-23rd-2013/',
    'divstyle' => 'max-width: 50%;',
    'bannerclass' => 'glow-yellow',
    'text' => 'Photos from our EMT Career Fair Aug 23rd',
  ),
);

$content = file_get_contents('./index.php.content/main-table.html');

$template->display('index.twig', array(
  'jquery' => true,
  'slideshow' => $slideshow,
  'styles' => $styles,
  'introtext' => $introtext,
  'banners' => $banners,
  'content' => $content,
));
?>
