<?php

// 'receive' refers to sending an email to us from the user via web form
// 'reply' is sending an email to the user presumably with additional info

const PHPMAILER_PATH =
  $_SERVER['DOCUMENT_ROOT'] . '/php/phpmailer/class.phpmailer.php'
;
require_once(PHPMAILER_PATH);

class FRMailer {
  const DEBUG_WRITE_PATH = 'debug_output.txt';

  private $error_output = null;
  private $success_output = null;
  private $debug_write_to_file = false;
  private $status_receive = null;
  private $status_reply = null;
  private $settings = null;


  public __construct($settings) {
    $this->settings = $settings || array();
  }

}

class FRMailerSettings {
  private static $replace_vars = array(
    'receive_to_addr', 'receive_from_addr',
    'receive_from_name', 'receive_subject',
    'reply_to_addr', 'reply_from_addr',
    'reply_from_name', 'reply_subject',
  );

  private $receive_to_addr = 'autoreply@fastresponse.org';
  private $receive_from_addr = '%email%';
  private $receive_from_name = '%name%';
  private $receive_subject = '';
  private $receive_body = '';

  private $send_reply = false;

  private $reply_to_addr = '%email%';
  private $reply_from_addr = 'info@fastresponse.org';
  private $reply_from_name = 'Fast Response School';
  private $reply_subject = '';
  private $reply_body = '';

  private $input = null;


  public function __construct($in) {
    $this->input = $in || array();
  }


  public function validate() {
    if (!validate_email($this->input['email']))
      err('Please enter a valid email address.');
    if (!validate_phone($this->input['phone']))
      err('Please enter a valid phone number.');
  }


  private function validate_email($email) {
    return (
      FALSE !== filter_var($email, FILTER_VALIDATE_EMAIL)
    );
  }

  private function strip_phone($phone) {
    // replace extra chars common in phone numbers with spaces
    $phone = strtr($phone, '()-.+x', '      ');
    // strip all spaces
    $phone = str_replace(' ', '', $phone);
    return $phone;
  }

  // input phone MUST be stripped first
  private function format_phone($phone) {
    // chop off a leading 1 if present
    if (strlen($phone) == 11 && substr($phone, 0, 1) == '1') {
      $phone = substr($phone, 1);
    }
    // insert hyphens for AAA-PPP-SSSS format, then return it
    if (strlen($phone) == 10) {
      $phone =
	      substr($phone, 0, 3) . '-' .
        substr($phone, 3, 3) . '-' .
        substr($phone, 6)
      ;
    }
    return $phone;
  }

  private function validate_phone(&$phone) {
    // strip extra characters
    $stripped = strip_phone($phone);

    // check that it's all numbers now
    $ret_value = (
      FALSE !== filter_var((int)$stripped, FILTER_VALIDATE_INT)
    );

    // if so...
    if ($ret_value) {
      // ...attempt to format according to US phone number format
      $tmp_phone = format_phone($stripped);
    }

    // if it stripped and formatted correctly, use it instead of original input
    if (isset($tmp_phone) && $tmp_phone == $stripped) {
      $phone = $tmp_phone;
    }

    return $ret_value;
  }

  private function process_variables() {
    foreach ($this->input as $rep => $rep_value) {
      foreach (self::$replace_vars as $var) {
        // in each var, replace '%name%' with the value of $input['name']
        $this->$var = str_replace("%{$rep}%", $rep_value, $this->$var);
      }
    }
  }

  private function create_receive_body() {
    $this->receive_body = '';
    foreach ($this->input as $rep => $rep_value) {
      // array('graduation_date' => '2014-01-15')
      // becomes "Graduation Date: 2014-01-15\n"
      $this->receive_body .=
        "<b>" . ucwords(str_replace('_', ' ', $rep)) . ":</b> $rep_value\n"
      ;
    }
  }

  private function create_reply_body() {
  }

}

class FRMailerSettingsCourse extends FRMailerSettings {
  const REPLY_DIR = $_SERVER['DOCUMENT_ROOT'] . '/mailer/course_replies/';

  // private $receive_to_addr = '%courseabbr%.coordinators@fastresponse.org
  private $receive_to_addr = 'autoreply@fastresponse.org';
  private $receive_from_addr = '%email%';
  private $receive_from_name = '%name%';
  private $receive_subject = 'New Lead: %course%';

  private $send_reply = true;

  private $reply_to_addr = '%email%';
  private $reply_from_addr = 'info@fastresponse.org';
  private $reply_from_name = 'Fast Response School';
  private $reply_subject = 'Welcome to Fast Response';


  public __construct($in) {
    parent::__construct($in);

    $abbr = get_course_abbr($this->input['course']);
    if (isset($abbr))
      $this->input['courseabbr'] = $abbr;
  }
    

  private function create_reply_body() {
    $file = null;
    $tests = array(
      $this->input['course'],
      $this->input['courseabbr'],
    );

    foreach ($tests as $test) {
      $test = REPLY_DIR . $test;
      if (file_exists($test)) {
        $file = $test;
        break;
      }
    }
    if (!isset($file)) {
      $file = REPLY_DIR . 'generic.html';
    }

    $this->reply_body = file_get_contents($file);
  }

  private function get_course_abbr($course) {
    switch (strtolower($course)) {
    case 'emergency medical technician':
      return 'emt';

    case 'phl':
    case 'phlebotomy':
      return 'cpt';

    case 'ma':
    case 'medical assistant':
    case 'certified medical assistant':
      return 'cma';

    case 'sterile processing':
    case 'sterile processing technician':
      return 'spt';

    case 'paramedic academy':
      return 'paramedic';

    }
    return null;
  }

}

// using separate classes as basically structs that replace some default settings
// is there a more elegant way to do this?
class FRMailerSettingsCourseEMT extends FRMailerSettingsCourse {
  private $receive_to_addr = 'autoreply@fastresponse.org';
  private $file = 'emt.html';
}
class FRMailerSettingsCourseCPT extends FRMailerSettingsCourse {
  private $receive_to_addr = 'autoreply@fastresponse.org';
  private $file = 'cpt.html';
}
class FRMailerSettingsCourseCMA extends FRMailerSettingsCourse {
  private $receive_to_addr = 'autoreply@fastresponse.org';
  private $file = 'cma.html';
}
class FRMailerSettingsCourseSPT extends FRMailerSettingsCourse {
  private $receive_to_addr = 'autoreply@fastresponse.org';
  private $file = 'spt.html';
}
class FRMailerSettingsCourseParamedic extends FRMailerSettingsCourse {
  private $receive_to_addr = 'autoreply@fastresponse.org';
  private $file = 'paramedic.html';
}
class FRMailerSettingsCourseOther extends FRMailerSettingsCourse {
  private $receive_to_addr = 'autoreply@fastresponse.org';
  private $file = 'other.html';
}



// This script receives POST data from a basic form, emails the data to us,
// then creates and sends an autoreply email to the user

error_reporting (0);

if (empty($_POST)) {
  $output_error = 'Error sending message. Please try again later.';
  exit;
}

$ob_settings = new FRMailerSettingsCourse(
  filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING)
);

//--- settings ---//

//--- end settings ---//



//--- validation of input ---//


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

if (count($error_msgs)) {
  $error_output =  '<div class="error">'.implode("<br />\n", $error_msgs).'</div>';
}

//--- end of validation of input ---//



//--- create and send email to us from user ---//

$messages = <<<ENDMSGS
<b>Name:</b> $form_name
<b>Email:</b> $form_email
<b>Phone:</b> $form_phone
<b>Zip:</b> $form_zip
<b>Program:</b> $form_program
<b>Comments:</b>
$form_comments
ENDMSGS;


//$to = $courses[$subject]['email'];
$to = $courses['Generic']['email'];

if ($debug_write_to_file) {
  $output  = "From: $form_name ($form_email)\n";
  $output .= "To: $form_name ($to)\n";
  $output .= "Subject: New Lead: $form_program\n";
  $output .= "Body:\n\n$messages\n";

  file_put_contents($debug_write_filename, $output);

  $to_us_ok = true;
}
else {
  $mail = new PHPMailer(); 

  $mail->SetFrom($form_email, $form_name);
  $mail->AddAddress($to);
  $mail->Subject = "New Lead: $form_program";
  $mail->Body = nl2br($messages);
  $mail->IsMail();
  $mail->IsHTML();

  $to_us_ok = $mail->Send();
}

if ($to_us_ok) {
  $success_output = 'Your request has been sent. Thank you!';
}

//--- end send email to us from user ---//



//--- send html autoreply email to user ---//

// only send if the email to us succeeded and send_to_them_auto is on
if ($to_us_ok && $send_to_them_auto) {

  $messages = file_get_contents(
    //$send_to_them_dir . $courses[$subject]['page']
    $send_to_them_dir . $courses['Generic']['page']
  );

  if ($debug_write_to_file) {
    $output  = "\n\n\n";
    $output .= "From: $send_to_them_name ($send_to_them_email)\n";
    $output .= "To: $form_name ($form_email)\n";
    $output .= "Subject: $send_to_them_subject\n";
    $output .= "Body (text):\n\n " . strip_tags($messages) . "\n\n";
    $output .= "Body (html):\n\n$messages\n";

    file_put_contents($debug_write_filename, $output, FILE_APPEND);

    $to_them_ok = true;
  }
  else {
    $mail = new PHPMailer(); 

    $mail->SetFrom($send_to_them_from, $send_to_them_name);
    $mail->AddAddress($form_email, $form_name);
    $mail->Subject = $send_to_them_subject;
    $mail->MsgHTML($messages);
    $mail->AltBody = strip_tags($messages);
    $mail->IsMail();
  }

  $to_them_ok = $mail->Send();

  if ($to_them_ok) {
    // we don't actually do anything here
  }
}

?>

<?php if ($error_output): ?>

<div class="error"><?= $error_output ?></div>

<?php elseif ($success_output): ?>

<div class="success"><?= $success_output ?></div>

<?php
  include($_SERVER['DOCUMENT_ROOT'] . '/php/conversion_google.php');
  include($_SERVER['DOCUMENT_ROOT'] . '/php/conversion_facebook.php');
?>

<?php endif; ?>
