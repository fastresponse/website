<?php

class FRWebpage {

  const TITLE_APPEND = 'Fast Response';

  private $title;
  private $stylesheets = array(;
    'all' => array(
      '/css/template.css',
      '/css/nicemenus.css',
      '/css/buttons.css',
    ),
    'print' => array(
      '/sites/all/themes/fastresponse/css/print.css',
    ),
  );
  private $stylesheets_if = array(
    'lte IE 8' => '/css/buttons-ie.css',
    'IE 7' => '/sites/all/themes/fastresponse/css/ie7.css',
    'lte IE 6' => '/sites/all/themes/fastresponse/css/ie6.css',
  );
  private $style_code;
  private $script_code;
  private $headerimg_url = '/images/headers/header_main_right.jpg';
  private $buttons = array();
  private $body_html;

  public function __construct() {
    // args allowed
  }

  public function __destruct() {
    // no args allowed
  }

  public function set_title($title = '') {
    if (strlen($title))
      $this->title = $title . ' | ' . $this->TITLE_APPEND;
    else
      $this->title = $this->TITLE_APPEND;
    return $this;
  }

  public function add_stylesheet($media, $sheet_url) {
    return $this;
  }

  public function add_style_code($code) {
    return $this;
  }

  public function add_script_code($code) {
    return $this;
  }

  public function set_header_image($image_url) {
    $this->headerimg_url = $image_url;
    return $this;
  }

  // pull buttons out of DB like promos??
  public function add_button($text, $link_url, $image) {
    return $this;
  }

  public function set_body($html) {
    $this->body_html = $html;
    return $this;
  }

  public function print_page() {
    echo <<<PAGE
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

  <head>
    <title>$this->title</title>

    <base href="/" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="INDEX, FOLLOW">
    <meta name="googlebot" content="INDEX, FOLLOW">

    <link type="image/x-icon" rel="shortcut icon" href="/misc/favicon.ico" />

    <link type="text/css" rel="stylesheet" media="all" href="/css/template.css" />
    <link type="text/css" rel="stylesheet" media="all" href="/css/nicemenus.css" />
    <link type="text/css" rel="stylesheet" media="all" href="/css/buttons.css" />
    <link type="text/css" rel="stylesheet" media="print" href="/sites/all/themes/fastresponse/css/print.css" /> 
    <!--[if lte IE 6]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie6.css";</style><![endif]-->
    <!--[if IE 7]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie7.css";</style><![endif]-->
    <!--[if lte IE 8]><style type="text/css" media="all">@import "/css/buttons-ie.css";</style><![endif]-->


    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-18170901-1']);
      _gaq.push(['_trackPageview']);

      (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>

    <script type="text/javascript" src="/js/jquery.js"></script>

  </head>

  <body>

    <div id="page">

      <div id="menu">
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/menu.php'); ?>
      </div>

      <div id="head">
        <img src="/images/headers/header_main_left.png" class="headerimgleft" alt="Fast Response School of Health Care Education" />
        <img src="/images/headers/header_community_first_aid_right.jpg" class="headerimgright" alt="" />
        <div class="clearfix"></div>
      </div>

      <div id="main">

        <div class="section">

	        <div class="rightsidebar2">
	          <div class="quicklinks2">
              <a href="/community/cpr/" class="btn3 lines-1">
	              <div>Community CPR</div>
                <div></div><div></div><div></div><div></div>
	            </a>
              <a href="/community/first_aid/" class="btn3 lines-2">
	              <div>Community<br />First Aid</div>
                <div></div><div></div><div></div><div></div>
	            </a>
	            <a href="/school/info/" class="btn2 lines-1">
	              <img src="/images/buttons/envelope-icon.png" alt="" />
	              <div>Contact Us</div>
                <div></div><div></div><div></div><div></div>
	            </a>
	            <a href="http://www.facebook.com/FastResponseSchool" class="btn2 lines-2">
	              <img src="/images/buttons/facebook-icon.png" alt="" />
	              <div>Visit Us On<br />Facebook</div>
                <div></div><div></div><div></div><div></div>
	            </a>
	          </div>
	        </div>

	        <div class="leftcontent2">

            $this->body_html

	        </div> <!-- /leftcontent -->

	        <div class="clearfix"></div>

        </div> <!-- /section -->

      </div> <!-- /main -->

      <div id="footer">
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/footer.php'); ?>
      </div> <!-- /footer -->

    </div> <!-- /page -->

  </body>
  </html>
PAGE;
  }

} // end of Webpage class

?>
