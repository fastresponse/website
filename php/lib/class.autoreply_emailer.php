<?php

/*

$emailer_ob = new AutoreplyEmailer();
if (
  $emailer_ob->validate_variables() &&
  $emailer_ob->send_email_to_us()
) {
  $emailer_ob->send_email_to_them();
  $success = true;
  $output = '<div class="success">' . $emailer_ob->get_output() . '</div>';
}
else {
  $success = false;
  $output = '<div class="error">' . $emailer_ob->get_output() . '</div>';
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

require($_SERVER['DOCUMENT_ROOT'] . '/php/phpmailer/class.phpmailer.php');

class AutoreplyEmailer {

  const AUTOREPLY_DIR = '/school/info/email_replies/';

  private $variables = null;
  private $stripslashes = null;
  private $variable_errors = null;

  private $use_generic = null;
  private $course_settings = null;

  private $send_to_us_from = null;
  private $status_send_to_us = null;

  private $send_to_them_from = null;
  private $send_to_them_name = null;
  private $send_to_them_subject = null;
  private $send_to_them_dir = null;
  private $status_send_to_them = null;

  private $status_vars_ok = null;

  private $output_error = null;
  private $output_success = null;
  

  public function __construct($vars = null) {
    $this->set_default_values();
    $this->process_variables($vars);
  }

  public function set_default_values() {

    $this->variables = array(
      'program' => null, 'name' => null, 'email' => null,
      'phone' => null, 'zip' => null, 'city' => null,
      'emt' => null, 'questions' => null, 'comments' => null,
      'source' => null, 'whenreachme' => null, 'timeframe' => null,
    );
    $this->stripslashes = array(
      'name', 'email', 'comments',
    );

    $this->send_to_us_from = 'autoreply@fastresponse.org';
    $this->send_to_them_from = 'info@fastresponse.org';
    $this->send_to_them_name = 'Fast Response School';
    $this->send_to_them_subject = 'Welcome to Fast Response';
    $this->send_to_them_dir = $_SERVER['DOCUMENT_ROOT'] . self::AUTOREPLY_DIR;

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
      'Pharmacy Technician' => array(
        'email' => 'autoreply@fastresponse.org',
        'page' => 'generic.html',
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

  public function get_status() {
    // if any are explicitly false, return false
    return !(
      false === $this->status_vars_ok ||
      false === $this->status_send_to_us ||
      false === $this->status_send_to_them
    );
  }

  public function get_output() {
    if ($this->output_error) {
      return $this->output_error;
    }
    elseif ($this->output_success) {
      return $this->output_success;
    }
    return null;
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
        if (array_key_exists($k, $this->stripslashes)) {
          $v = stripslashes($v);
        }
        $this->variables[$k] = $v;
      }
    }
    
    if (
      isset($this->variables['questions']) &&
      is_array($this->variables['questions'])
    ) {
      $this->variables['questions'] =
        implode(' ', $this->variables['questions'])
      ;
    }

    return true;
  }

  public function validate_variables() {
    if (
      $this->variables === null ||
      !is_array($this->variables) ||
      !count($this->variables)
    ) {
      return ($this->status_vars_ok = false);
    }

    $this->variable_errors = array();

    // check required vars and add msg to variable_errors[] if not correct

    if (
      !$this->variables['program'] ||
      !array_key_exists($this->variables['program'], $this->course_settings)
    ) {
      $this->variable_errors[] = "Please select your course of interest.";
    }

    if (!$this->variables['source']) {
      $this->variable_errors[] = "Please select where you heard about us.";
    }

    if (!$this->variables['name']) {
      $this->variable_errors[] = "Please enter your name.";
    }

    if (
      !$this->variables['email'] ||
      !$this->validate_email($this->variables['email'])
    ) {
      $this->variable_errors[] = "Please enter a valid e-mail address.";
    }

    $this->variables['phone'] = $this->format_phone($this->variables['phone']);
    if (!$this->variables['phone'] || false === $this->variables['phone']) {
      $this->variable_errors[] = "Please enter a valid phone number with area code.";
    }

    if (
      strtolower($this->variables['program']) == 'paramedic' &&
      !$this->variables['emt']
    ) {
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

  public function send_email_to_us() {
    if (!$this->status_vars_ok) return;

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

    if ($this->use_generic) {
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
  
  public function send_email_to_them() {
    if (!$this->status_vars_ok) return;

    $path = $this->send_to_them_dir;
    if ($this->use_generic) {
      $program = 'Generic';
    }
    else {
      $program = $this->variables['program'];
    }
    $path .= $this->course_settings[ $program ]['page'];

    $messages = file_get_contents($path);

    $mail = new PHPMailer(); 

    $mail->SetFrom($this->send_to_them_from, $this->send_to_them_name);
    $mail->AddAddress($this->variables['email'], $this->variables['name']);
    $mail->Subject = $this->send_to_them_subject;
    $mail->MsgHTML($messages);
    $mail->AltBody = strip_tags($messages);
    $mail->IsMail();

    $this->status_send_to_them = $mail->Send();

    if ($this->status_send_to_them) {
      // possibly do success / error messages? never have before...
    }
    return $this->status_send_to_them;
  }
}

?>
