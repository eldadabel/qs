<?php 
//error_reporting(E_ALL ^ E_NOTICE); // hide all basic notices from PHP


define('WP_USE_THEMES', false);
require('../../../../../../../wp-blog-header.php');

$user = get_user_by( 'login', 'careercontact' );

  // form settings
  $send_to      = $user->user_email;
  $subject      = "Contact email from careers";

  // make it waterproof.
  array_walk($_POST, 'strip_tags');
  array_walk($_POST, 'trim');


  // initialize our vars.
  $clean['first_name'] = '';
  $clean['last_name'] = '';
  $clean['email'] = '';
  $clean['message'] = '';
  $clean['position'] = '';

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
  if(isset($clean['position'])) $clean['position'] = strip_tags($clean['position']);


  // got any errors?
  if(isset($hasError)) {
    echo $emailError;
    die();
  }

 error_log($clean['position']);

$message_body = <<<html
Inquiry for {$clean['position']}\r\n
Email address {$clean['email']}\r\n
First Name {$clean['first_name']}\r\n
Last Name {$clean['last_name']}\r\n
Message\r\n
{$clean['message']}
html;


### Attachment Preparation ###
    $file_attached = false;
    if(isset($_FILES['file'])) //check uploaded file
    {
        //get file details we need
        $file_tmp_name    = $_FILES['file']['tmp_name'];
        $file_name        = $_FILES['file']['name'];
        $file_size        = $_FILES['file']['size'];
        $file_type        = $_FILES['file']['type'];
        $file_error       = $_FILES['file']['error'];

        //exit script and output error if we encounter any
        if($file_error>0)
        {
            $mymsg = array( 
            1=>"The uploaded file exceeds the upload_max_filesize directive in php.ini", 
            2=>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form", 
            3=>"The uploaded file was only partially uploaded", 
            4=>"No file was uploaded", 
            6=>"Missing a temporary folder" ); 
            
            $output = json_encode(array('type'=>'error', 'text' => $mymsg[$file_error]));
            die($output); 
        }
        
        //read from the uploaded file & base64_encode content for the mail
        $handle = fopen($file_tmp_name, "r");
        $content = fread($handle, $file_size);
        fclose($handle);
        $encoded_content = chunk_split(base64_encode($content));
        //now we know we have the file for attachment, set $file_attached to true
        $file_attached = true;

    }

    if($file_attached) //continue if we have the file
    {
        $boundary = md5("sanwebe"); 
        //header
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "From: mailer@qualityscore.co\r\n"; 
        $headers .= "Reply-To: ".$clean['email']."" . "\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
        
        //plain text 
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
        $body .= chunk_split(base64_encode($message_body)); 
        
        //attachment
        $body .= "--$boundary\r\n";
        $body .="Content-Type: $file_type; name=\"$file_name\"\r\n";
        $body .="Content-Disposition: attachment; filename=\"$file_name\"\r\n";
        $body .="Content-Transfer-Encoding: base64\r\n";
        $body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
        $body .= $encoded_content; 
    }else{
        //proceed with PHP email.
        $headers = "From:".$send_to."\r\n".
        'Reply-To: '.$clean['email'].'' . "\n" .
        'X-Mailer: PHP/' . phpversion();
        $body = $message_body;
    }

    //$headers = 'Content-Type: text/html;From: ' .' <'.$clean['email'].'>' . "\r\n" . 'Reply-To: ' . $clean['email'];
    
    mail($send_to, $subject, $body, $headers);
    mail("uri@qualityscore.co", $subject, $body, $headers);
    mail("qualityscorejobs@gmail.com", $subject, $body, $headers);

    echo 'sent';
    die();


?>