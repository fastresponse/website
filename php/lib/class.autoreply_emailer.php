<?php

/*

$emailer_ob = new AutoreplyEmailer();
if (
  !$emailer_ob->validate_variables() ||
  !$emailer_ob->send_email_to_us() ||
  !$emailer_ob->send_email_to_user()
) {
  $success = false;
  $output = '<div class="error">' . $emailer_ob->get_output() . '</div>';
}
else {
  $success = true;
  $output = '<div class="success">' . $emailer_ob->get_output() . '</div>';
}

if ($!ajax) {
  if ($success) {
    header('Location: ' . $success_page);
  }
  else {
    echo $output;
  }
  exit;
}
else {
  $data = array('success' => $success, 'output' => $output);
  header('Content-Type: application/json');
  echo json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
}
*/

error_reporting (0);

require($_SERVER['DOCUMENT_ROOT'] . '/php/phpmailer/class.phpmailer.php');

class AutoreplyEmailer {

  const AUTOREPLY_DIR = $_SERVER['DOCUMENT_ROOT'] . '/school/info/email_replies/';

  private $access_type = null;
  private $variables = null;
  private $required = null;
  private $variable_errors = null;

  private $use_generic = null;
  private $course_settings = null;

  private $send_to_us_from = null;
  private $status_send_to_us = null;

  private $send_to_them_auto = null;
  private $send_to_them_from = null;
  private $send_to_them_name = null;
  private $send_to_them_subject = null;
  private $send_to_them_dir = null;
  private $status_send_to_them = null;

  private $status_vars_ok = null;

  private $ = null;
  private $ = null;

  private $page_empty = null;
  private $page_success = null;

  private $output_error = null;
  private $output_success = null;
  

  public function __construct($vars = null) {
    $this->set_default_values();
    $this->process_variables($vars);
  }

  public function set_default_values() {

    $this->access_type = 'ajax';

    $this->variables = array(
      'program' => null, 'name' => null, 'email' => null,
      'phone' => null, 'zip' => null, 'city' => null,
      'emt' => null, 'questions' => null, 'comments' => null,
      'source' => null, 'whenreachme' => null, 'timeframe' => null,
    );
    $this->required = array(
      'program', 'name', 'email', 'phone',
    );

    $this->send_to_us_from = 'autoreply@fastresponse.org';
    $this->send_to_them_auto = true;
    $this->send_to_them_from = 'info@fastresponse.org';
    $this->send_to_them_name = 'Fast Response School';
    $this->send_to_them_subject = 'Welcome to Fast Response';
    $this->send_to_them_dir = AUTOREPLY_DIR;

    $this->use_generic = true;
    $this->course_settings = array(
      'Generic' => array(
        'email' => 'autoreply@fastresponse.org',
        'page' => 'generic.html',
      ),
      'EMT' => array(
        // which of OUR email addresses should receive the user's request
        'email' => 'autoreply@fastresponse.org',
        // the webpage (in $send_to_them_dir) to email to the user
        'page' => 'emt.html',
      ),
      'Sterile Processing' => array(
        'email' => 'autoreply@fastresponse.org',
        'page' => 'spt.html',
      ),
      'Medical Assistant' => array(
        'email' => 'autoreply@fastresponse.org',
        'page' => 'cma.html',
      ),
      'Phlebotomy' => array(
        'email' => 'autoreply@fastresponse.org',
        'page' => 'phl.html',
      ),
      'Paramedic' => array(
        'email' => 'autoreply@fastresponse.org',
        'page' => 'para.html',
      ),
      'Other' => array(
        'email' => 'autoreply@fastresponse.org',
        'page' => 'other.html',
      ),
    );

    $this->variable_errors = array();
  }

  public function process_variables($vars = null) {
    if ($vars === null) {
      $vars = $_POST;
    }
    if (empty($vars)) {
      $this->output_error = 'Error sending message. Please try again later.';
      return ($this->status_vars_ok = false);
    }
    $vars = filter_var_array($vars, FILTER_SANITIZE_STRING);
    foreach ($vars as $k => $v) {
      if (array_key_exists($k, $this->variables)) {
        $this->variables[$k] = $v;
      }
    }
    return true;
  }

  public function validate_variables() {
    if (
      $this->variables === null ||
      !is_array($this->variables ||
      !count($this->variables)
    ) {
      return ($this->status_vars_ok = false);
    }

    $this->variable_errors = array();

    if (!$this->variables['program'] ||
    !array_key_exists($this->course_settings[$this->variables['program']]) {
      $this->variable_errors[] = "Please select your course of interest.";
    }

    if (!$this->variables['name']) {
      $this->variable_errors[] = "Please enter your name.";
    }

    if (!$this->variables['email'] || !$this->validate_email($this->variables['email'])) {
      $this->variable_errors[] = "Please enter a valid e-mail address.";
    }

    $this->variables['phone'] = $this->format_phone($this->variables['phone'];
    if (!$this->variables['phone'] || false === $this->variables['phone']) {
      $this->variable_errors[] = "Please enter a valid phone number with area code.";
    }

    if ($this->variables['program'] == 'Paramedic' && !$this->variables['emt']) {
      $this->variable_errors[] = "Please confirm that you are currently an EMT.";
    }

    if (count($this->variable_errors)) {
      $this->output_error = implode("<br />\n", $this->variable_errors);
      return ($this->status_vars_ok = false);
    }

    return ($this->status_vars_ok = true);
  }

  private function validate_email($email) {
    return (
      false !== filter_var($email, FILTER_VALIDATE_EMAIL)
    );
  }

  private function format_phone($phone) {
    // replace extra chars common in phone numbers with spaces
    $test = strtr($phone, '()-.+x', '      ');
    // strip all spaces
    $test = str_replace(' ', '', $test);

    // validate: only numbers left
    if (false !== filter_var((int)$test, FILTER_VALIDATE_INT)) {
      // chop off a leading 1 if present
      if (strlen($test) == 11 && substr($test, 0, 1) == '1') {
        $test = substr($test, 1);
      }

      // insert hyphens for AAA-PPP-SSSS format, then return it
      if (strlen($test) == 10) {
        $test =
	        substr($test, 0, 3) . '-' .
          substr($test, 3, 3) . '-' .
          substr($test, 6)
        ;
        return $test;
      }

      else {
        // we're not sure what format they entered the phone number in,
        // so just return the original text they entered.
        // it's guaranteed the only non-digits are ()-.+x and space
        return $phone;
      }
    }
    return false;
  }

  public send_email_to_us() {
    $messages = "<b>Program:</b> {$this->variables['program']}\n";
    $messages.= "<b>Name:</b> {$this->variables['name']}\n";
    $messages.= "<b>Email:</b> {$this->variables['email']}\n";
    $messages.= "<b>Phone:</b> {$this->variables['phone']}\n";

    if ($this->variables['city'])
      $messages .= "<b>City:</b> {$this->variables['city']}\n";
    if ($this->variables['zip'])
      $messages .= "<b>Zip:</b> {$this->variables['zip']}\n";

    if ($this->variables['whenreachme']) {
      $messages .= "<b>When to reach me:</b> {$this->variables['whenreachme']}";
      if ($this->variables['timeframe']) {
        $messages .= ", {$this->variables['timeframe']}";
      }
      $messages .= "\n";
    }
    else if ($this->variables['timeframe']) {
      $messages .= "<b>When to reach me:</b> {$this->variables['timeframe']}\n";
    }

    if ($this->variables['emt'])
      $messages .= "<b><u>{$this->variables['emt']}</u></b>\n";

    if ($this->variables['questions'])
      $messages .= "<b>Questions:</b> {$this->variables['questions']}\n";
    if ($this->variables['comments'])
      $messages .= "<b>Comments:</b>\n{$this->variables['comments']}\n";
    if ($this->variables['source'])
      $messages .= "<b>Source:</b> {$this->variables['source']}\n";

    if ($use_generic) {
      $program = 'Generic';
    }
    else {
      $program = $this->variables['program'];
    }
    $to = $this->course_settings[ $program ]['email'];

    $mail = new PHPMailer(); 

    $mail->SetFrom($this->variables['email'], $this->variables['name']);
    $mail->AddAddress($to);
    $mail->Subject = "New Lead: {$this->variables['program']}";
    $mail->Body = nl2br($messages);
    $mail->IsMail();
    $mail->IsHTML();

    $this->status_send_to_us = $mail->Send();

    if ($this->status_send_to_us) {
      $this->output_success = 'Your request has been sent. Thank you!';
    }
    else {
      $this->output_error = 'Message could not be sent. Please try again later.';
    }
    return $this->status_send_to_us;
  }    
  
  public function send_email_to_user() {
    $path = $this->send_to_them_dir;
    if ($use_generic) {
      $program = 'Generic';
    }
    else {
      $program = $this->variables['program'];
    }
    $path .= $this->course_settings[ $program ]['page'];

    $messages = file_get_contents($path);

    $mail = new PHPMailer(); 

    $mail->SetFrom($this->send_to_them_from, $this->send_to_them_name);
    $mail->AddAddress($this->variables['email'] $this->variables['name']);
    $mail->Subject = $this->send_to_them_subject;
    $mail->MsgHTML($messages);
    $mail->AltBody = strip_tags($messages);
    $mail->IsMail();

    $this->status_send_to_them = $mail->Send();

    if ($this->status_send_to_them) {
      // we don't actually do anything here
    }
    return $this->status_send_to_them;
  }
}



if (empty($_POST)) {
  if (isset($empty_form_page) {
	  header('Location: ' . $empty_form_page);
  }
  else {
    $error_output = 'Error sending message. Please try again later.';
  }
  exit;
}

// sanitize the input and put each $_POST['var'] into $form_var
extract(
  filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING),
  EXTR_SKIP | EXTR_PREFIX_ALL,
  'form'
);

$var_list = array(
  'form_program', 'form_name', 'form_email',
  'form_phone', 'form_zip', 'form_city',
  'form_emt', 'form_questions', 'form_comments',
  'form_source', 'form_whenreachme', 'form_timeframe',
);

foreach ($var_list as $var) {
  if (!isset($$var)) $$var = null;
}

// status variables
$to_us_ok = 0;
$to_them_ok = 0;

//--- settings ---//

$send_to_us_from = 'autoreply@fastresponse.org';

if (!isset($send_to_them_auto))
  $send_to_them_auto = true;

$send_to_them_from = 'info@fastresponse.org';
$send_to_them_name = 'Fast Response School';
$send_to_them_subject = 'Welcome to Fast Response';

$send_to_them_dir = $_SERVER['DOCUMENT_ROOT'] . '/school/info/email_replies/';

$courses = array(
  // this one is a generic page to use for all emails temporarily
  'Generic' => array(
    'email' => 'autoreply@fastresponse.org',
    'page' => 'generic.html',
  ),
  'EMT' => array(
    // which of OUR email addresses should receive the user's request
    'email' => 'autoreply@fastresponse.org',
    // the webpage (in $send_to_them_dir) to email to the user
    'page' => 'emt.html',
  ),
  'Sterile Processing' => array(
    'email' => 'autoreply@fastresponse.org',
    'page' => 'spt.html',
  ),
  'Clinical Medical Assistant' => array(
    'email' => 'autoreply@fastresponse.org',
    'page' => 'cma.html',
  ),
  'Phlebotomy' => array(
    'email' => 'autoreply@fastresponse.org',
    'page' => 'phl.html',
  ),
  'Paramedic' => array(
    'email' => 'autoreply@fastresponse.org',
    'page' => 'para.html',
  ),
  'Other Courses' => array(
    'email' => 'autoreply@fastresponse.org',
    'page' => 'other.html',
  ),
);

//--- end settings ---//



//--- validation of input ---//

function ValidateEmail($email) {
  return (
    FALSE !== filter_var($email, FILTER_VALIDATE_EMAIL)
  );
}

function FormatPhone($phone) {
  // replace extra chars common in phone numbers with spaces
  $test = strtr($phone, '()-.+x', '      ');
  // strip all spaces
  $test = str_replace(' ', '', $test);

  // validate: only numbers left
  if (FALSE !== filter_var((int)$test, FILTER_VALIDATE_INT)) {

    // chop off a leading 1 if present
    if (strlen($test) == 11 && substr($test, 0, 1) == '1') {
      $test = substr($test, 1);
    }

    // insert hyphens for AAA-PPP-SSSS format, then return it
    if (strlen($test) == 10) {
      $test =
	      substr($test, 0, 3) . '-' .
        substr($test, 3, 3) . '-' .
        substr($test, 6)
      ;
      return $test;
    }

    else {
      // we're not sure what format they entered the phone number in,
      // so just return the original text they entered.
      // it's guaranteed the only non-digits are ()-.+x and space
      return $phone;
    }

  }

  return FALSE;
}

$error_msgs = array();

if (!$form_name) {
  $error_msgs[] = "Please enter your name.";
}

if (!$form_email || !ValidateEmail($form_email)) {
  $error_msgs[] = "Please enter a valid e-mail address.";
}

if (!$form_phone || FALSE === ($form_phone = FormatPhone($form_phone)) ) {
  $error_msgs[] = "Please enter a valid phone number with area code.";
}

if (!$form_program || !$courses[$form_program]) {
  $error_msgs[] = "Please select your course of interest.";
}

if ($form_program == 'Paramedic' && !$form_emt) {
  $error_msgs[] = "Please confirm that you are currently an EMT.";
}

//--- end of validation of input ---//


if (count($error_msgs)) {
  $error_output = implode("<br />\n", $error_msgs);
}

else {

  //--- create and send email to us from user ---//

  $messages = <<<ENDMSGS
<b>Program:</b> $form_program
<b>Name:</b> $form_name
<b>Email:</b> $form_email
<b>Phone:</b> $form_phone

ENDMSGS;
// the blank line above is required for proper spacing

  if ($form_city) $messages .= "<b>City:</b> $form_city\n";
  if ($form_zip) $messages .= "<b>Zip:</b> $form_zip\n";

  if ($form_whenreachme) {
    $messages .= "<b>When to reach me:</b> $form_whenreachme";
    if ($form_timeframe) {
      $messages .= ", $form_timeframe";
    }
    $messages .= "\n";
  }
  else if ($form_timeframe) {
    $messages .= "<b>When to reach me:</b> $form_timeframe\n";
  }

  if ($form_emt) $messages .= "<b><u>$form_emt</u></b>\n";

  if ($form_questions) $messages .= "<b>Questions:</b> $form_questions\n";
  if ($form_comments) $messages .= "<b>Comments:</b>\n$form_comments\n";
  if ($form_source) $messages .= "<b>Source:</b> $form_source\n";


  //$to = $courses[$subject]['email'];
  $to = $courses['Generic']['email'];

  $mail = new PHPMailer(); 

  $mail->SetFrom($form_email, $form_name);
  $mail->AddAddress($to);
  $mail->Subject = "New Lead: $form_program";
  $mail->Body = nl2br($messages);
  $mail->IsMail();
  $mail->IsHTML();

  $to_us_ok = $mail->Send();

  if ($to_us_ok) {
    $success_output = 'Your request has been sent. Thank you!';
  }
  else {
    $error_output = 'Message could not be sent. Please try again later.';
  }

  //--- end send email to us from user ---//



  //--- send html autoreply email to user ---//

  // only send if the email to us succeeded and send_to_them_auto is on
  if ($to_us_ok && $send_to_them_auto) {

    $messages = file_get_contents(
      //$send_to_them_dir . $courses[$subject]['page']
      $send_to_them_dir . $courses['Generic']['page']
    );

    $mail = new PHPMailer(); 

    $mail->SetFrom($send_to_them_from, $send_to_them_name);
    $mail->AddAddress($form_email, $form_name);
    $mail->Subject = $send_to_them_subject;
    $mail->MsgHTML($messages);
    $mail->AltBody = strip_tags($messages);
    $mail->IsMail();

    $to_them_ok = $mail->Send();

    if ($to_them_ok) {
      // we don't actually do anything here
    }
  }

} //--- end of sending emails ---//


//--- handle output back to JS ---//

if ($error_output) {
  $output = '<div class="error">' . $error_output . '</div>';
  $success = false;
}
else {
  $output = '<div class="success">' . $success_output . '</div>';
  $success = true;
}

if ($!ajax) {
  if ($success) {
    header('Location: ' . $success_page);
  }
  else {
    echo $output;
  }
  exit;
}
else {
  $data = array('success' => $success, 'output' => $output);
  header('Content-Type: application/json');
  echo json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
}
?>
