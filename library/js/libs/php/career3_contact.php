<?php 
//error_reporting(E_ALL ^ E_NOTICE); // hide all basic notices from PHP

define('WP_USE_THEMES', false);
require('../../../../../../../wp-blog-header.php');

$user = get_user_by( 'login', 'infocontact' );

  // form settings
  $send_to      = $user->user_email;
  $subject      = "Contact email from qualityscore";

  
  // make it waterproof.
  array_walk($_POST, 'strip_tags');
  array_walk($_POST, 'trim');


  // initialize our vars.
  $clean['first_name'] = '';
  $clean['last_name'] = '';
  $clean['email'] = '';
  $clean['message'] = '';

  $clean = $_POST;

  // need valid email
  if(trim($clean['email']) === '')  {
    $emailError = 'Forgot to enter in your e-mail address.';
    $hasError = true;
  } else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($clean['email']))) {
    $emailError = 'You entered an invalid email address.';
    $hasError = true;
  } else {
    $email = trim($clean['email']);
  }
    
  if(isset($clean['message'])) $clean['message'] = nl2br($clean['message']);
  if(isset($clean['first_name'])) $clean['first_name'] = strip_tags($clean['first_name']);
  if(isset($clean['last_name'])) $clean['last_name'] = strip_tags($clean['last_name']);

  // got any errors?
  if(isset($hasError)) {
    echo $emailError;
    die();
  }

$body = <<<html
<div style="font-family:arial;font-size:14px">
<h1>Inquiry for Junior Marketing Operations Manager</h1><br/>
<strong>Email address</strong> {$clean['email']}<br />
<strong>First Name</strong> {$clean['first_name']}<br />
<strong>Last Name</strong> {$clean['last_name']}<br />
<strong>Message</strong><br />
{$clean['message']}
</div>
html;
    $headers = 'Content-Type: text/html;From: ' .' <'.$clean['email'].'>' . "\r\n" . 'Reply-To: ' . $clean['email'];

    mail($send_to, $subject, $body, $headers);
    mail("qualityscorejobs@gmail.com", $subject, $body, $headers);

    echo 'sent';
    die();


?>